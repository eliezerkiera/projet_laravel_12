<?php

namespace App\Http\Controllers;

use App\Traits\PageViewData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PageViewData;

    public function index()
    {
      $options = [
    [
        'value' => 'Assistance',
        'children' => [
            'info' => "Demande d'information",
            'support' => "Support technique",
            'bug' => "Signaler un bug"
        ]
    ],
    [
        'value' => 'Autre',
        'children' => [
            'autre' => "Autre sujet",
            'suggestion' => "Suggestion",
            'feedback' => "Retour d'expérience"
        ]
    ]
];

$options2=['1'=>'label 1', '2'=>'label 2'];
        return view('home')->with(['pageData'=>$this->getPageData(), 'options'=>$options2]);
    }


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'textarea'=>'required|min:2',
            'select'=>'required',
            'checkbox'=>'required',
            'text'=>'required',
            'password'=>'required'
        ]);


         return "Formulaire valide : " . json_encode($validatedData);
    }
}
