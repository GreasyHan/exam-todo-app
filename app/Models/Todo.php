<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Todo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'note',
        'done',
        'done_at',
    ];

    public function todoCreate($data) {
        $todo = new Todo;
        $todo->note = $data['todo']['note'];
        $todo->save();

        return $todo;
    }

    public function todoUpdate($data, $id) {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->done = $data['todo']['done'];
            $todo->done_at = $data['todo']['done'] ? Carbon::now() : null;
            return $todo->save();
        }

        return 'no such item was found!';
    }

    public function todoDelete($id) {
        $todo = Todo::find($id);
        $result = 'no such item was found!';

        if ($todo) {
            $todo->delete();
            $result = 'successfully deleted!';
        }

        return $result;
    }
}
