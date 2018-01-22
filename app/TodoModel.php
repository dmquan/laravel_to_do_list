<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'todolist';
    protected $fillable = ['id', 'title', 'description', 'updated_at', 'created_at'];
    public function saveTodo($data)
    {
        $this->title = $data['title'];
        $this->description = $data['description'];
        $this->save();
    }

    public function updateTodo($data)
    {
        echo $data['id'];
        $todo = $this->find($data['id']);
        $todo->title = $data['title'];
        $todo->description = $data['description'];
        $todo->save();
    }
}
