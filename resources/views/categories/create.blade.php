@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <h3>Nova categoria</h3>

            <!--Tratamento de erro da primeira maneira-->
             {{--@if($errors->any())--}}
                     {{--<ul class="alert alert-danger list-inline">--}}
                        {{--@foreach($errors->all() as $error)--}}
                            {{--<li>{{$error}}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--@endif--}}

            {!! Form::open(['route'=>'categories.store','class' =>'form']) !!}

                <!--Para criar essa estrutura(FormGroup) foi criado funções Providers>AppServiceProvider -->
                {!!Html::openFormGroup('name',$errors) !!}

                    {!! Form::label('name','Nome',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                    <!--Configurado um template em errors e modificado
                    o arquivo Providers>AppServiceProvider função boot -->
                    {!! Form::error('name',$errors) !!}

                {!!Html::closeFormGroup() !!}

                {!!Html::openFormGroup() !!}
                    {!! Form::submit('Criar categoria',['class' =>'btn btn-primary']) !!}
                {!!Html::closeFormGroup() !!}

            {!! Form::close() !!}

        </div>


    </div>

    @endsection