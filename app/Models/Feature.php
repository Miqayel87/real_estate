<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feature
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'has_value'
    ];

    const BUILDING_AGES = [
        "0 - 1 Years",
        "0 - 5 Years",
        "0 - 10 Years",
        "0 - 20 Years",
        "0 - 50 Years",
        "50+ Years",
    ];

    const BEDROOMS = [
        1,
        2,
        3,
        4,
        5
    ];

    const BATHROOMS = [
        1,
        2,
        3,
        4,
        5
    ];

    const ROOMS = [
        1,
        2,
        3,
        4,
        5,
        'More than 5'
    ];


    /**
     * The properties that belong to this feature.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot('value');
    }
}
