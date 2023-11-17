<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrowdFunding extends Model
{
    protected $table = 'crowd_funding';

    protected $fillable = [
        'title',
        'description',
        'image',
        'goal_amount',
        'current_amount',
        'start_date',
        'end_date',
        'type',
        'status'
    ];
}
