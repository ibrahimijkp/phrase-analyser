<?php

namespace TEVTEX\PhraseAnalyser\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhraseAnalyserController extends Controller
{
    public function index()
    {
        return view("phrase-analyser::phrase-main");
    }

    public function analyse(Request $request){
        $validated = $request->validate([
            'phrase' => 'required|max:255',
        ]);

        $originalPhrase = $request->phrase;
        $chars = str_split($originalPhrase);
        $finalPhraseAnalysis = [];
        $analysisCompletedChars = [];

        foreach($chars as $key => $char):

            if (in_array($char, $analysisCompletedChars))
            {
                continue;
            }

            $analysisCompletedChars[] = $char;

            $lastPos = 0;
            $positions = array();

            while (($lastPos = strpos($originalPhrase, $char, $lastPos))!== false) {
                $positions[] = $lastPos;
                $lastPos = $lastPos + strlen($char);
            }

            $char_count = substr_count($originalPhrase, $char);

            $char_analysis['char'] = $char;
            $char_analysis['count'] = $char_count;
            $char_analysis['before'] = [];
            $char_analysis['after'] = [];

            foreach($positions as $value):
                if(array_key_exists($value-1,$chars)){
                    $char_analysis['after'][] = $chars[$value-1];
                }else{
                    $char_analysis['after'][] = 'none';
                }

                if(array_key_exists($value+1,$chars)){
                    $char_analysis['before'][] = $chars[$value+1];
                }else{
                    $char_analysis['before'][] = 'none';
                }
            endforeach;
            $char_analysis['max_distance'] = "";
            if(count($positions) > 1){
                $char_analysis['max_distance'] = ($positions[count($positions)-1] - $positions[0]) -1;
            }

            $finalPhraseAnalysis[] = $char_analysis;
        endforeach;
        // dd($finalPhraseAnalysis);
        return view("phrase-analyser::phrase-analyse", ['phraseAnalysis' => $finalPhraseAnalysis, 'phrase' => $originalPhrase]);
    }
}
