<?php

namespace TEVTEX\PhraseAnalyser;

use Illuminate\Support\ServiceProvider;

Class PhraseAnalyserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/views', 'phrase-analyser');
    }

    public function register()
    {

    }

}
