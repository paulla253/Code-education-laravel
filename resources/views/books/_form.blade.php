
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

{!!Html::openFormGroup('author_id',$errors) !!}
    {!! Form::label('author_id','Codigo Autor',['class'=>'control-label']) !!}
    {!! Form::text('author_id',null,['class'=>'form-control']) !!}
    {!! Form::error('author_id',$errors) !!}

{!!Html::closeFormGroup() !!}


