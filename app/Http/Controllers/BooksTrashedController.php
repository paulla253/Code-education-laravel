<?php

namespace CodePub\Http\Controllers;

use CodePub\Repositories\BookRepository;
use Illuminate\Http\Request;

class BooksTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BookRepository $repository
     * @param CategoryRepository $categoryRequest
     */

    private $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        #metodo onlyTrashed implementando.
        $books = $this->repository->onlyTrashed()->paginate(10);

        return view('trashed.books.index', compact('books', 'search'));
    }

    public function show($id)
    {
        $this->repository->onlyTrashed();
        $book=$this->repository->find($id);

        return view('trashed.books.show',compact('book'));
    }

    public function update(Request $request, $id){

        $this->repository->onlyTrashed();
        $this->repository->restore($id);

        $url=$request->get('redirect_to',route('trashed.books.index'));
        $request->session()->flash('message','Livro restaurado com sucesso.');

        return redirect()->to($url);
    }
}
