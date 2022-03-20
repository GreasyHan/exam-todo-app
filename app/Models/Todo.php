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
        $date = new Carbon($data['done_at']);

        $result = Todo::create([
            'note' => $data['note'],
            'done' => $data['done'],
            'done_at' => $date,
        ]);

        return $result;
    }

    public function todoUpdate($data, $id) {
        $date = new Carbon($data['done_at']);

        $todo = Todo::where('id', $id);
        $todo->note = $data['note'];
        $todo->done = $data['done'];
        $todo->done_at = $date;
        $todo->save();
        $todo->refresh();

        return $todo;
    }

    public function todoDelete($data, $id) {
        $date = new Carbon($data['done_at']);
        
        $todo = Todo::where('id', $id);
        $todo->delete();

        return $todo;
    }
}
