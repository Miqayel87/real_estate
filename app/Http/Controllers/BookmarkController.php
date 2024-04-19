<?php

namespace App\Http\Controllers;

use App\Services\BookmarkService;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->bookmarkService = new BookmarkService;
    }

    public function index()
    {
        $bookmarks = $this->bookmarkService->getUserBookmarkProperties();
        return view('bookmarks', ["bookmarks" => $bookmarks]);
    }

    public function create(Request $request)
    {
        $this->bookmarkService->create($request);
    }

    public function delete($id)
    {
        $this->bookmarkService->delete($id);
    }
}
