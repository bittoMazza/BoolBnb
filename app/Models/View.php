<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'ip_address',
        'view_date',
    ];

    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }
}
