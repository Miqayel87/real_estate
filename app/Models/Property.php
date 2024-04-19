<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $_token
 * @property string $title
 * @property string $status
 * @property string $type
 * @property float $price
 * @property float $area
 * @property int $rooms
 * @property string $image
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property string $description
 * @property int $ages
 * @property int $bedrooms
 * @property int $bathrooms
 * @property string $listing_type
 * @property int $type_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Property extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'user_id'
    ];

    const STATUS_ACTIVE  = 1;
    const STATUS_INACTIVE  = 0;

    const STATUSES = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive'
    ];

    const FOR_SALE = 1;
    const FOR_RENT = 2;

    const LISTING_TYPES = [
        self::FOR_SALE => 'For sale',
        self::FOR_RENT => 'For rent'
    ];

    /**
     * Get the type of this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the user who owns this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the images associated with this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    /**
     * Get the features associated with this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function features()
    {
        return $this->belongsToMany(Feature::class)->withPivot('value');
    }

    /**
     * Get the bookmarks associated with this property.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
}
