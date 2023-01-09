<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class GuideController extends Controller
{
  public function index()
  {
    return view('guide.index');
  }
}