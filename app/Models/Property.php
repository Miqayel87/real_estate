<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        '_token', // Add _token to the fillable attributes
        // Add other fillable attributes here
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
        // Add other fillable attributes as needed
    ];

    public function type()
    {
        return $this->belongsTo(PropertyType::class);
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
        return $this->belongsToMany(Feature::class);
    }
}
