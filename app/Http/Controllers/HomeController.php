<?php

namespace App\Http\Controllers;

use App\Traits\PageViewData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use PageViewData;

    public function index()
    {
        return view('home.index')->with('pageData', $this->getPageData());
    }


    public function home()
    {
         return view('home.home')->with('pageData', $this->getPageData());
       
    }

    public function about()
    {
        return view('home.about')->with('pageData', $this->getPageData());

    }

    public function termOfUse()
    {
        return view('home.term-of-use')->with('pageData', $this->getPageData());

    }


    public function contact()
    {
        return view('home.contact')->with('pageData', $this->getPageData());

    }


    public function changeLanguage()
    {

    }


    public function changeCountry()
    {

    }



}
