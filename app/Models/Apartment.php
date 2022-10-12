<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'rooms',
        'beds',
        'bathrooms',
        'square_meters',
        'address',
        'image',
        'is_visible',
        'long',
        'lat',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }

    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship')->withPivot('start_sponsor', 'end_sponsor')->withTimestamps();
    }

    public function amenities(){
        return $this->belongsToMany('App\Models\Amenity')->withTimestamps();
    }

    public function views(){
        return $this->hasMany('App\Models\View');
    }
}
