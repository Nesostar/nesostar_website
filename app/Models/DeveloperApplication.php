<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeveloperApplication extends Model
{
    protected $fillable = [
        'first_name',
        'second_name',
        'surname',
        'email',
        'phone',
        'instagram',
        'portfolio',
        'motivation',
    ];
}
