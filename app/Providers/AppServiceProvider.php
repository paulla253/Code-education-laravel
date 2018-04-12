<?php

namespace CodePub\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Chamando o layout de erro
        \Form::macro('error',function($field,$errors)
        {
            if(!str_contains($field,'*') && $errors->has($field) || count($errors->get($field)) > 0)
            {
                return view ('errors.error_field',compact('field'));
            }
            return null;
        });

        //Criado tratamento de erros para FormGroup
        \Html::macro('openFormGroup',function($field = null,$errors =null)
        {
            $hasError= ($field != null and $errors != null and $errors->has($field)) ?' has-error': ' ';
            return "<div class=\"form-group{$hasError}\">";
        });

        \Html::macro('closeFormGroup',function() {
            return '</div>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
