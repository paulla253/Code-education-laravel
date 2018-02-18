@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Listagem de categorias</h3>
            {{--Maneiras diferentes para criar o Botão : --}}
            {!! Button::primary('Nova Categoria')->asLinkTo(route('categories.create')) !!}
            {{--<a href="{{route('categories.create')}}" class="btn btn-primary">Nova Categoria</a>--}}
        </div>

        <div class="row">
            {{--Em model configurar qual campo deverá ser mostrado--}}
            {!!
                Table::withContents($categories->items())->striped()
                ->callback('Ações',function($field,$category){

                    $linkEdit = route ('categories.edit',['category'=>$category->id]);
                    $linkDestroy=route ('categories.destroy',['category'=>$category->id]);
                    $deleteForm="delete-form-{$category->id}";
                    $form = Form::open(['route'=>
                                        ['categories.destroy','category'=>$category->id],
                                        'method' =>'DELETE','id'=>$deleteForm,'style'=>'display:none']).
                          Form::close();
                    $anchorDestroy = Button::link('Deletar' )
                                    ->asLinkTo($linkDestroy)->addAttributes([
                                    'onlick'=>"event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                                    ]);
                    return "<ul class=\"list-inline\">".
                        "<li>".Button::link("Editar" )->asLinkTo($linkEdit)."</li>".
                        "<li>|</li>".
                        "<li>".$anchorDestroy."</li>".
                    "</ul>".
                    $form;
                    })
            !!}

            {{$categories->links()}}

        </div>
    </div>
@endsection