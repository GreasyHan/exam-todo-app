<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Carbon\Carbon;

class TodoController extends Controller
{
    public function list()
    {
        return Todo::orderBy('id', 'DESC')->get();
    }

    public function create(Request $request)
    {
        $data = $request->all();
        return Todo::todoCreate($data);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->all();
        return Todo::todoUpdate($data, $id);
    }
    
    public function delete(int $id)
    {
        return Todo::todoDelete($id);
    }
}
