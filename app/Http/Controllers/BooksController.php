<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Repositories\BookRepository;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(BookRepository $repository)
    {
        $this->repository= $repository;
    }

    public function index()
    {
        $books =  $this->repository->paginate(10);
        return view('.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $this->repository->create($request->all());

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
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request,$id)
    {
        $this->repository->update($request->all(),$id);

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
