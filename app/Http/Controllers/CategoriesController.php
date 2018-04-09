<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //em vez de chamar o metodo :: all chamar o paginate para colocar páginação.
        // tem que configrar na view :  {{$categories->links()}}

        $categories = Category::query()->paginate(10);

        return view('.categories.index',compact('categories'));
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
        Category::create($request->all());

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
    public function edit(Category $category)
    {
        //caso for passado o id :
            // se não encontrar a categoria.
    //        if( !($category = Category::find($id)))
    //        {
    //            throw  new ModelNotFoundException("Categoria naõ encontrada.");
    //        }

        return view('categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
    //         se não encontrar a categoria.
    //        if( !($category = Category::find($id)))
    //        {
    //            throw  new ModelNotFoundException("Categoria naõ encontrada.");
    //        }
            $category->fill($request ->all());
            $category->save();

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
    public function destroy(Category $category)
    {
        $category->delete();

        \Session::flash('message','Categoria excluida com sucesso.');

        return redirect()->to(\URL::previous());
    }
}
