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
}
