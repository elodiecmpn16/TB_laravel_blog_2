<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.films', ['films' => $films]);
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('films.film', ['film' => $film]);
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        Film::create($request->all());
        return redirect()->action('FilmController@index');
    }

    public function edit($id)
    {
        $find = Film::findOrFail($id);
        return view('films.edit', ['film' => $find]);
    }

    public function updateFilm(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        $film->update($request->all());
        return redirect('/films/' . $id);
    }

    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect('/films');
    }

}

