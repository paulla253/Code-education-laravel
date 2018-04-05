{!! Form::hidden('redirect_to',URL::previous()) !!}


<!--Para criar essa estrutura(FormGroup) foi criado funções Providers>AppServiceProvider -->
{!!Html::openFormGroup('name',$errors) !!}

{!! Form::label('name','Nome',['class'=>'control-label']) !!}
{!! Form::text('name',null,['class'=>'form-control']) !!}
<!--Configurado um template em errors e modificado
                    o arquivo Providers>AppServiceProvider função boot -->
{!! Form::error('name',$errors) !!}

{!!Html::closeFormGroup() !!}