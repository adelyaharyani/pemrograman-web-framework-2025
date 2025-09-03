<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks_table';

    protected $fillable = ['title', 'description', 'is_done'];

    protected $casts = [
        'is_done' => 'boolean',
    ];
}
