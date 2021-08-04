<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodosController extends Controller
{
    public function index()
    {
        return Todo::all();
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $todo = Todo::create($data);

        return response($todo, 201);
    }

    public function update(Todo $todo)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'completed' => 'required|boolean',
        ]);

        $todo->update($data);

        return response($todo, 200);
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response('Deleted todo item', 200);
    }
}
