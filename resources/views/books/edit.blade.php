@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <h3>Editar Livro </h3>

            {!! Form::model ($book,['route' =>['books.update','category' =>$book->id],
             'class'=>'form','method'=>'PUT']) !!}
                {{----}}

                <div class="form-group">

                    {!! Form::label('name','Titulo') !!}

                    {!! Form::text('title',null,['class'=>'form-control']) !!}

                    {!! Form::label('name','Subtitulo') !!}

                    {!! Form::text('subtitle',null,['class'=>'form-control']) !!}

                    {!! Form::label('name','Preço') !!}

                    {!! Form::text('price',null,['class'=>'form-control']) !!}

                </div>

                <div class="form-group">

                    {!! Form::submit('Salvar livro',['class' =>'btn btn-primary']) !!}

                </div>

            {!! Form::close() !!}

        </div>

    </div>














 @endsection
