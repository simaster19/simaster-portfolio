<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function ebook(){
      return response()->view("ebook");
    }
}
