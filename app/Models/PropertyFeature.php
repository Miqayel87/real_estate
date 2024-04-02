<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $table = 'feature_property';
    protected $fillable = [
        'property_id',
        'feature_id',
        'value'
    ];
}
