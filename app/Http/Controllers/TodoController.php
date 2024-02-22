<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function home(){
        $todos = Todo::all();
        // dd($todos);
        return view('home',['todos' => $todos]); 
    }
    public function store(Request $request){
        // dd($request-> post('title'));
        // dd($request);
        $validatedData = $request ->validate([
            'title' => 'required|max:100',
        ]);
        // dd($validatedData);
        $todo = new Todo();
        $todo ->name = $request->post('title');
        $todo -> save();
        // return redirect('/');
        return redirect(route('home'));
    }
}
