{!! Form::hidden('redirect_to',URL::previous()) !!}

@php$userID = Auth::user()->id; @endphp
{!! Form::hidden('user_id',$userID) !!}

{!!Html::openFormGroup('title',$errors) !!}
    {!! Form::label('title','Titulo',['class'=>'control-label']) !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
    {!! Form::error('title',$errors) !!}
{!!Html::closeFormGroup() !!}

{!!Html::openFormGroup('subtitle',$errors) !!}
    {!! Form::label('subtitle','Subtitulo',['class'=>'control-label'])  !!}
    {!! Form::text('subtitle',null,['class'=>'form-control']) !!}
    {!! Form::error('subtitle',$errors) !!}
{!!Html::closeFormGroup() !!}

{!!Html::openFormGroup('price',$errors) !!}
    {!! Form::label('price','Preço',['class'=>'control-label']) !!}
    {!! Form::text('price',null,['class'=>'form-control']) !!}
    {!! Form::error('price',$errors) !!}
{!!Html::closeFormGroup() !!}


