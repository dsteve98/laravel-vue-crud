<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * class 'Task' => disimpan di database pada tabel/collection 'tasks'
 */
class Task extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    # default model Task => tabel tasks
    # overwrite behaviour set $table
    // protected $table = 'todo_task';

    # default field for id is 'id'
    # laravel eloquent also add created_at and updated_at field automatically. set below to false to disable this
    public $timestamps = true;
}
