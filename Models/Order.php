<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $guarded = [];
    public function cf()
    {
        return $this->belongsTo(CrowdFunding::class, 'crowd_funding_id', 'id');
    }
}
