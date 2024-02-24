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
        // Todo::create($validatedData);
        $todo = new Todo();
        $todo ->name = $request->post('title');
        $todo -> save();
        // return redirect('/');
        return redirect(route('home'));
    }

    public function edit($todo){
        $todo = Todo::find($todo);
        // dd($todo);
        return view('update',compact('todo'));
    }

        public function update(Request $request , Todo $todo){
            $validatedData = $request ->validate([
                'title' => 'required|max:100',
            ]);
            // dd($validatedData);
            // $todo-> update(['name' => $validatedData['title']]);  option 1
            // $todo-> update($validatedData);                       option 2

            $todo->name = $validatedData['title'];                 
            $todo ->save();
            return redirect(route('home'));         
        }

        public function delete(Todo $todo){
            $todo -> delete();
            return back();
        }
}
