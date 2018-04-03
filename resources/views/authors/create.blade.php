@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <h3>Novo autor</h3>

            {!! Form::open(['route'=>'authors.store','class' =>'form']) !!}

            @include('authors._form')

                {!!Html::openFormGroup() !!}

                    {!! Button::primary('Criar autor')->submit() !!}

                {!!Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>

    @endsection