<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class dataTablesController extends Controller
{
    public function providerView(){

        return view('presentation.provider');

    }

    public function getDataTables(){

        

    }
}
