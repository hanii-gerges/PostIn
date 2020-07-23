<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index()
    {
        $title='Index';
        return view('pages.index')->with('title',$title);
    }
    function about()
    {
        $title='About';
        return view('pages.about')->with('title',$title);
    }
    function services()
    {
        $data=array(
            'title'=>'Services',
            'services'=>['web development','web design','mobile development']
        );
        return view('pages.services')->with($data);
    }
}
