<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empolyee extends Model
{
    protected $fillable = [
        'name', 'email', 'age', 'phone',
    ];
}
