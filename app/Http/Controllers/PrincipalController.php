<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PrincipalController extends Controller
{
    public function index(){
    $fecha=Carbon::now();
    return view('principal',["fecha"=>$fecha]);
  }
}
