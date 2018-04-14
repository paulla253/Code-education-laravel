<?php

namespace CodePub\Http\Controllers;

use CodePub\Http\Requests\BookCreateRequest;
use CodePub\Http\Requests\BookUpdateRequest;
use CodePub\Repositories\BaseRepository;
use CodePub\Repositories\BaseRepositoryTrait;
use CodePub\Repositories\BookRepository;
use CodePub\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRequest;

    /**
     * Display a listing of the resource.
     *
     * @param BookRepository $repository
     * @param CategoryRepository $categoryRequest
     */

    public function __construct(BookRepository $repository,CategoryRepository $categoryRequest)
    {
        $this->repository= $repository;
        $this->categoryRequest = $categoryRequest;
    }

    public function index(Request $request)
    {
        $search=$request->get('search');

        $books =  $this->repository->paginate(10);
        return view('.books.index',compact('books','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        #lists funcao modificada no BaseRepositoryTrait.
        $categories=$this->categoryRequest->lists('name','id');
        return view('books.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $data= $request->all();
        $data['author_id']=\Auth::user()->id;

        $this->repository->create($data);

        $url=$request->get('redirect_to',route('books.index'));
        $request->session()->flash('message','Livro cadastrado com sucesso.');

        return redirect()->to($url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book=$this->repository->find($id);
        $categories=$this->categoryRequest->lists('name','id');
        return view('books.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookUpdateRequest $request, $id)
    {
        #não pegar o author_id passado na requisição.
        $data= $request->except(['author_id']);

        $this->repository->update($data,$id);

        $url=$request->get('redirect_to',route('books.index'));
        $request->session()->flash('message','Livro editado com sucesso.');

        return redirect()->to($url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        \Session::flash('message','Livro excluido com sucesso.');

        return redirect()->to(\URL::previous());
    }
}
