<?php

namespace App\Services;

use App\Models\Bookmark;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class BookmarkService
{
    public function __construct()
    {
        $this->propertyService = new PropertyService;
    }

    /**
     * Create a new bookmark.
     *
     * @param Request $request The request containing bookmark data.
     * @return void
     */
    public function create(Request $request): void
    {
        $newBookmark = new Bookmark();

        $newBookmark->fill([
            'user_id' => Auth::user()->id,
            'property_id' => $request->property_id
        ]);

        $newBookmark->save();
    }

    /**
     * Delete a bookmark by its ID.
     *
     * @param int $id The ID of the bookmark to delete.
     * @return void
     */
    public function delete(int $id): void
    {
        Bookmark::where('user_id', Auth::user()->id)->where('property_id', $id)->delete();
    }

    /**
     * Get properties bookmarked by the current user.
     *
     * @return Collection The collection of bookmarked properties.
     */
    public function getUserBookmarkProperties(): Collection
    {
        return Auth::user()
            ->bookmarks()
            ->whereHas('property', function ($query) {
                $query->with('images')->where('status', $this->propertyService::STATUS['active']);
            })
            ->get();
    }
}
