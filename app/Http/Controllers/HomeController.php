<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function aboutUs()
    {
        return view('about-us');
    }

    public function cuailyJS(){
        $content = view('layouts.main-js')->render();
        $content = str_replace(["\n","\r","\t"], '', $content);
        $content = preg_replace('!/\*.*?\*/!s', '', $content);
        $content = preg_replace('/<!--(.|\s)*?-->/', '', $content);
        $content = str_replace('<script>', '', $content);
        $content = str_replace('</script>', '', $content);
        return response($content, 200, [
            'Content-Type' => 'application/javascript'
        ]);
    }
    public function aboutProject()
    {
        return view('about-project');
    }
}
