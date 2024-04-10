<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        '_token',
        'title',
        'status',
        'type',
        'price',
        'area',
        'rooms',
        'image',
        'address',
        'city',
        'state',
        'zip_code',
        'description',
        'ages',
        'bedrooms',
        'bathrooms',
        'listing_type',
        'type_id',
        "user_id"
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot('value');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
