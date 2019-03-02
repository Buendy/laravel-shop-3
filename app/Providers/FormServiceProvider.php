<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Form::component('bsText','components.form.text',['name','value'=>null,'attributes'=> []]);
        Form::component('bsName','components.form.name',['name','value'=>null,'attributes'=> []]);
        Form::component('bsEmail','components.form.email',['name','value'=>null,'attributes'=> []]);
        Form::component('bsPhone','components.form.phone',['name','value'=>null,'attributes'=> []]);
        Form::component('bsAddress','components.form.address',['name','value'=>null,'attributes'=> []]);
        Form::component('bsSubmit','components.form.submit',['value', 'attributes'=>[]]);
        Form::component('bsPassword', 'components.form.password', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsPasswordConfirmation', 'components.form.passwordConfirmation', ['name', 'value' => null, 'attributes' => []]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
