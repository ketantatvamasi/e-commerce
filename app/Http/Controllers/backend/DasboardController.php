<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index(){
        return 'Hey this is your dashboard';
    }
    public function show(){
        return 'hello';
    }
}
