<?php

namespace App\Http\Controllers\jenis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    function index(){
        return view("content/jenis/index");
    }
}
