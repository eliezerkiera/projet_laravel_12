<?php

namespace App\Http\Controllers;

use App\Traits\PageViewData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PageViewData;

    public function index()
    {
        return view('home')->with('pageData', $this->getPageData());
    }
    //
}
