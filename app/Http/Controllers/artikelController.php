<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikelModels;

class artikelController extends Controller
{
    //
    public function index()
    {
        $datas = artikelModels::getAll();
        // dd($datas);
        return view('layouts.index', compact('datas'));
    }

    public function show($pertanyaan_id)
    {
        $datas = artikelModels::find_by_id($pertanyaan_id);
        // dd($datas);
        // dd(compact('datas'));
        return view('answers.show', compact('datas'));
    }

    // untuk mengarah ke view input data
    public function create() 
    {
        return view('newAnswers');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        $data = artikelModels::save($data);
        if($data)
        {
            return redirect('/jawaban');
        }
    }

    public function edit($id)
    {
        $datas = artikelModels::find_by_id($id);
        // dd($datas[0]);
        return view('answers.edit', compact('datas'));
    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        $data = artikelModels::update($id, $request->all());
        return redirect('/jawaban');
    }

    public function destroy($id)
    {
        $delete = artikelModels::destroy($id);
        return redirect('/jawaban');
    }
}

