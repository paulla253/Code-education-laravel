@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h3>Listagem de categorias</h3>
            {{--Maneiras diferentes para criar o Botão : --}}
            {!! Button::primary('Novo autor')->asLinkTo(route('authors.create')) !!}
            {{--<a href="{{route('categories.create')}}" class="btn btn-primary">Nova Categoria</a>--}}
        </div>

        <div class="row">
            {{--Em model configurar qual campo deverá ser mostrado--}}
            {!!
                Table::withContents($authors->items())->striped()
                ->callback('Ações',function($field,$author){

                    $linkEdit = route ('authors.edit',['author'=>$author->id]);
                    $linkDestroy=route ('authors.destroy',['author'=>$author->id]);
                    $deleteForm="delete-form-{$author->id}";
                    $form = Form::open(['route'=>
                                        ['authors.destroy','author'=>$author->id],
                                        'method' =>'DELETE','id'=>$deleteForm,'style'=>'display:none']).
                          Form::close();
                    $anchorDestroy = Button::link('Deletar' )
                                    ->asLinkTo($linkDestroy)->addAttributes([
                                    'onclick'=>"event.preventDefault();document.getElementById(\"{$deleteForm}\").submit();"
                                    ]);
                    return "<ul class=\"list-inline\">".
                        "<li>".Button::link("Editar" )->asLinkTo($linkEdit)."</li>".
                        "<li>|</li>".
                        "<li>".$anchorDestroy."</li>".
                    "</ul>".
                    $form;
                    })
            !!}

            {{$authors->links()}}

        </div>
    </div>
@endsection