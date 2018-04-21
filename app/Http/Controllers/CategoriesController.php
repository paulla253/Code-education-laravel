<?php

namespace CodePub\Http\Controllers;

use CodePub\Http\Requests\CategoryRequest;
use CodePub\Models\Category;
use CodePub\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    #construtor para pegar o repository
    public function __construct(CategoryRepository $repository)
    {
        $this->repository= $repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #pegar registros excluidos
        $categories=Category::withTrashed()->paginate(10);

        #pegar apenas registros excluidos
       #$categories=Category::onlyTrashed()->paginate(10);


        $search=$request->get('search');


        //em vez de chamar o metodo :: all chamar o paginate para colocar páginação.
        // tem que configrar na view :  {{$categories->links()}}

        #utilizando o repository para paginação
        $categories = $this->repository->paginate(10);

        return view('.categories.index',compact('categories','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //mostra o metodo de criação.
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //precisa configurar na model para fazer o insert no banco.
    //Modificado a Request para CategoryRequest que foi criada .
    public function store(CategoryRequest $request)
    {
        #utilizando o repository para criar
        $this->repository->create($request->all());

        #continuar na url que estava antes(precisa de um campo no formulario).
        $url=$request->get('redirect_to',route('categories.index'));
        $request->session()->flash('message','Categoria cadastrada com sucesso.');

        return redirect()->to($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */

    //Apenas mostrar a edição da categoria.
    //pode passar o objeto como parametro,para não precisar olhar a existe do id no banco
//    public function edit(Category $category)

    #utilizando o repository apenas passando o id.
    public function edit($id)
    {
        //caso for passado o id :
            // se não encontrar a categoria.
    //        if( !($category = Category::find($id)))
    //        {
    //            throw  new ModelNotFoundException("Categoria naõ encontrada.");
    //        }

        #utilizando o repository para editar
        $category=$this->repository->find($id);
        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
    //         se não encontrar a categoria.
    //        if( !($category = Category::find($id)))
    //        {
    //            throw  new ModelNotFoundException("Categoria naõ encontrada.");
    //        }


#          Quando passar o objeto $category como parametro.
//            $category->fill($request ->all());
//            $category->save();

        #precisa modificar o Request para ser o $id tbm.
        $this->repository->update($request->all(),$id);

        #continuar na url que estava antes(precisa de um campo no formulario).
        $url=$request->get('redirect_to',route('categories.index'));

         $request->session()->flash('message','Categoria editada com sucesso.');

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

        \Session::flash('message','Categoria excluida com sucesso.');

        return redirect()->to(\URL::previous());
    }
}
