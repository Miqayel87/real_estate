<?php

namespace App\Services;

use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class PropertyService
{
    const LISTING_TYPES = [
        'For sale',
        'For rent'
    ];

    public function __construct()
    {
        $this->featureService = new FeatureService;
        $this->imageUploadService = new ImageUploadService;
    }


    /**
     * Create a new property.
     *
     * @param PropertyRequest $request The request data containing property details.
     * @return Property The created property.
     */
    public function create(PropertyRequest $request): Property
    {
        $newProperty = new Property;

        $newProperty->fill([
            'title' => $request->title,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'price' => $request->price,
            'listing_type' => $request->listing_type,
            'status' => true,
            'type_id' => $request->type,
            'user_id' => Auth::user()->id,
        ]);

        $newProperty->save();

        foreach ($request->features as $key => $value) {
            $this->featureService->createOrUpdate($key, $newProperty->id, $value);
        }

        if ($request->imageIds) {
            foreach ($request->imageIds as $imageId) {
                $propertyImage = new PropertyImage;
                $propertyImage->image_id = $imageId;
                $propertyImage->property_id = $newProperty->id;
                $propertyImage->save();
            }
        }

        return $newProperty;
    }

    /**
     * Update an existing property.
     *
     * @param PropertyRequest $request The request data containing updated property details.
     * @param int $id The ID of the property to update.
     * @return Property The updated property.
     */
    public function update(PropertyRequest $request, int $id): Property
    {
        $propertyToUpdate = $this->getById($id);

        $propertyToUpdate->fill([
            'title' => $request->title,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'price' => $request->price,
            'listing_type' => $request->listing_type,
            'status' => true,
            'type_id' => $request->type,
            'user_id' => Auth::user()->id,
        ]);

        $propertyToUpdate->save();

        $this->featureService->deletePropertyFeatures($id, array_keys($request->features));

        foreach ($request->features as $key => $value) {
            $this->featureService->createOrUpdate($key, $propertyToUpdate->id, $value);
        }

        if ($request->imageIds) {
            foreach ($request->imageIds as $imageId) {
                $propertyImage = new PropertyImage;
                $propertyImage->image_id = $imageId;
                $propertyImage->property_id = $propertyToUpdate->id;
                $propertyImage->save();
            }
        }

        return $propertyToUpdate;
    }

    /**
     * Delete a property.
     *
     * @param int $id The ID of the property to delete.
     * @return bool Whether the property was successfully deleted.
     */
    public function delete(int $id): bool
    {
        $propertyToDelete = $this->getById($id);
        return $propertyToDelete->delete();
    }

    /**
     * Hide a property.
     *
     * @param int $id The ID of the property to hide.
     * @return Property The hidden property.
     */
    public function hide(int $id): Property
    {
        $propertyToHide = $this->getById($id);
        $propertyToHide->status = 0;
        $propertyToHide->save();
        return $propertyToHide;
    }

    /**
     * Activate a hidden property.
     *
     * @param int $id The ID of the property to activate.
     * @return Property The activated property.
     */
    public function activate(int $id): Property
    {
        $propertyToActivate = $this->getById($id);
        $propertyToActivate->status = 1;
        $propertyToActivate->save();
        return $propertyToActivate;
    }

    /**
     * Search properties based on given criteria.
     *
     * @param Request $request The request data containing search criteria.
     * @return LengthAwarePaginator The paginated search results.
     */
    public function search(Request $request): LengthAwarePaginator
    {
        $result = Property::query()->where('status', 1)->with('features');

        if ($request->keyword) {
            $result->where('title', 'like', '%' . $request->keyword . '%');
        }

        if ($request->type) {
            $result->where('type_id', $request->type);
        }

        if (isset($request->listing_type)) {
            $result->where('listing_type', $request->listing_type);
        }

        if ($request->state) {
            $result->where('state', $request->state);
        }

        if ($request->city) {
            $result->where('city', $request->city);
        }

        if ($request->minPrice) {
            $result->where('price', '>=', $request->minPrice);
        }

        if ($request->maxPrice) {
            $result->where('price', '<=', $request->maxPrice);
        }

        if ($request->minArea) {
            $result->whereHas('features', function ($query) use ($request) {
                $query->where('name', 'Area')->where('value', '>=', ((int)$request->minArea));
            });
        }

        if ($request->maxArea) {
            $result->whereHas('features', function ($query) use ($request) {
                $query->where('name', 'Area')->where('value', '<=', ((int)$request->maxArea));
            });
        }

        if ($request->bedrooms) {
            $result->whereHas('features', function ($query) use ($request) {
                $query->where('name', 'Bedrooms')->where('value', ((int)$request->minArea));
            });
        }

        if ($request->bathrooms) {
            $result->whereHas('features', function ($query) use ($request) {
                $query->where('name', 'Bathrooms')->where('value', ((int)$request->minArea));
            });
        }

        if ($request->features) {
            $result->whereHas('features', function ($query) use ($request) {
                $query->whereIn('features.id', array_map('intval', $request->features));
            });
        }

        if ($request->sorting) {
            switch ($request->sorting) {
                case 'asc':
                    $result->orderBy('created_at', 'asc');
                    break;
                case 'desc':
                    $result->orderBy('created_at', 'desc');
                    break;
                case 'asc-price':
                    $result->orderBy('price', 'asc');
                    break;
                case 'desc-price':
                    $result->orderBy('price', 'desc');
                    break;
            }
        }

        return $result->paginate(10);
    }

    /**
     * Get all properties.
     *
     * @return Collection The collection of properties.
     */
    public function getAll(): Collection
    {
        return Property::orderBy('created_at', 'desc')->with('features')->with('images')->where('status', 1)->get();
    }

    /**
     * Get all properties with pagination.
     *
     * @return LengthAwarePaginator The paginated collection of properties.
     */
    public function getAllWithPagination(): LengthAwarePaginator
    {
        return Property::orderBy('created_at', 'desc')->with('features')->with('images')->where('status', 1)->paginate(10);
    }

    /**
     * Get a property by its ID.
     *
     * @param int $id The ID of the property.
     * @return Property|null The property, or null if not found.
     */
    public function getById(int $id): ?Property
    {
        return Property::with('features')->with('images')->with('type')->findOrFail($id)->first();
    }

    /**
     * Get N number of properties.
     *
     * @param int $n The number of properties to retrieve.
     * @return Collection The collection of properties.
     */
    public function getN(int $n): Collection
    {
        return Property::with('features')->with('images')->where('status', 1)->orderBy('created_at', 'desc')->limit($n)->get();
    }

    /**
     * Get popular places.
     *
     * @return Collection The collection of popular places.
     */
    public function getPopularPlaces(): Collection
    {
        return Property::select('city', DB::raw('COUNT(*) as count'))
            ->groupBy('city')
            ->get();
    }

    /**
     * Get similar properties.
     *
     * @return Collection The collection of similar properties.
     */
    public function getSimilarProperties(): Collection
    {
        return Property::with('images')
            ->with('features')
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }
}
