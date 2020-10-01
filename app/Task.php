<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $table = 'tasks';

    //Allow field to mass assignment
    protected $fillable = [
        'name',
    ];
}
