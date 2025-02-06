<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookTable extends Model
{
    protected $fillable = [
        'name', 
        'email', 
        'phone', 
        'date',
        'time',
        'people'
    ];
}
