<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{

    private $priorities = ['L', 'M', 'H'];

    public function index(Request $request) {
        $p = $request->query->get('p');

        if($p == null) {
            $todos = Todo::all();
        } else {
            $todos = Todo::where('priority', $p)->get();
        }

        return view('todos.index', [
            'todos' => $todos
        ]);
    }

    public function create() {
        return view('todos.create', [
            'priorities' => $this->priorities
        ]);
    }


    public function store(Request $request) {
        $data = $request->validate([
            'label' => ['required', 'string', 'max:255', 'min:5'],
            'priority' => ['required', 'string', 'max:1', 'min:1', Rule::in($this->priorities)]
        ]);


        Todo::create($data);

        return redirect()->route('todos.index');
    }

    public function update(Todo $todo)
    {
        $todo->update([
            'is_completed' => true
        ]);

        return redirect()->route('todos.index');
    }

}
