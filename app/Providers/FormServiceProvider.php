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
        Form::component('bsSubmit','components.form.submit',['value', 'attributes'=>[]]);
        Form::component('bsPassword', 'components.form.password', ['name', 'value' => null, 'attributes' => []]);
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
