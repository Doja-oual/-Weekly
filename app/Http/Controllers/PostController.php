<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function  index(){
        return view('Poste.post');


    }
    public function create(){
        return view('Poste.create');
    }
}
