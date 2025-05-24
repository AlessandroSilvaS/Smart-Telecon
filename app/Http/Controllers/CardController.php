<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CardController extends Controller
{
    public function index(){
        if (!Storage::exists('data/cards.json')) {
            abort(404, 'Arquivo JSON não encontrado.');
        }

        $json = Storage::get('data/cards.json');
        $cards = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            abort(500, 'Erro ao decodificar o JSON.');
        }

        return view('presentation.index', compact('cards'));
    }
}
