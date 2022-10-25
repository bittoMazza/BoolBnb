<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'apartment_id',
        'name',
        'surname',
        'email',
        'content',
    ];

    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }
}
