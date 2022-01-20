<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        dd('jdkdfjkldjkljdkl');
    }

    public function create(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        //сохраняем данные в базу
        return redirect()->route('admin::news::new');
    }

    public function new()
    {
        return view('admin.news.create');
    }


    public function update()
    {

    }

    public function delete()
    {

    }
}
