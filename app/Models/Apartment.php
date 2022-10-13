<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
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

    public function images(){
        return $this->hasMany('App\Models\Image');
    }

    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship')->withPivot('start_sponsor', 'end_sponsor')->withTimestamps();
    }

    public function amenities(){
        return $this->belongsToMany('App\Models\Amenity')->withTimestamps();
    }

    public function views(){
        return $this->hasMany('App\Models\View')->withTimestamps();
    }
}
