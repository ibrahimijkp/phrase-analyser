<?php

use Illuminate\Http\Request;

Route::group(['namespace' => 'TEVTEX\PhraseAnalyser\Http\Controllers', 'middleware' => ['web']], function(){

    Route::get('phrase-analyser', 'PhraseAnalyserController@index')->name('phrase-analyser');

    Route::post('phrase-analyse', 'PhraseAnalyserController@analyse')->name('phrase-analyse');
});
