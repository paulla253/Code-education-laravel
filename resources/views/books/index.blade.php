@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row">

            <h3>Listagem de livros</h3>

                <a href="{{route('books.create')}}" class="btn btn-primary">Nova Categoria</a>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach ($books as $book)
                    <tr>
                        <td> {{$book->id}}</td>
                        <td> {{$book->title}}</td>
                        <td> {{$book->subtitle}}</td>
                        <td> {{$book->price}}</td>
                        <td>
                            {{--<ul>--}}
                                {{--<li>--}}
                                        {{--<a href="{{route ('categories.edit',['category'=>$category->id])}}">Editar</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<?php $deleteForm="delete-form-{$loop->index}" ?>--}}

                                    {{--<a href="{{route ('categories.destroy',['category'=>$category->id])}}"--}}
                                       {{--onclick="event.preventDefault();document.getElementById('{{$deleteForm}}').submit()">--}}
                                        {{--Excluir</a>--}}

                                        {{--{!! Form::open(['route'=>['categories.destroy','category'=>$category->id],--}}
                                        {{--'method' =>'DELETE','id'=>$deleteForm,'style'=>'display:none']) !!}--}}

                                        {{--{!! Form::close() !!}--}}
                                {{--</li>--}}

                            {{--</ul>--}}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            {{$books->links()}}

        </div>
    </div>
@endsection