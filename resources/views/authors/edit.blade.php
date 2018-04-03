@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <h3>Editar Autor </h3>

            {!! Form::model ($author,['route' =>['authors.update','author' =>$author->id],
             'class'=>'form','method'=>'PUT']) !!}
                {{----}}

                 @include('authors._form')

                {!!Html::openFormGroup() !!}
                    {!! Button::primary('Salvar Autor')->submit() !!}
                {!!Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>

    </div>














 @endsection
