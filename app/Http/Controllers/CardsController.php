<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CardsController extends Controller
{
    public function index(){

        $json = Storage::get('data/cards.json');
        $cards = json_decode($json, true);

        return view('presentation.index', compact('cards'));

    }
}
