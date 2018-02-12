@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <h3>Novo Livro</h3>

            {{--@include('errors._erros_form')--}}

            {!! Form::open(['route'=>'books.store','class' =>'form']) !!}

            <div class="form-group">

                {!! Form::label('name','Titulo') !!}

                {!! Form::text('title',null,['class'=>'form-control']) !!}

                {!! Form::label('name','Subtitulo') !!}

                {!! Form::text('subtitle',null,['class'=>'form-control']) !!}

                {!! Form::label('name','Preço') !!}

                {!! Form::text('price',null,['class'=>'form-control']) !!}

            </div>


            <div class="form-group">

                {!! Form::submit('Criar Livro',['class' =>'btn btn-primary']) !!}

            </div>

            {!! Form::close() !!}

        </div>


    </div>

    @endsection