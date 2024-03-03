<?php

namespace Modules\Gallery\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GalleryController extends Controller
{
    public function galleries()
    {
        return view('gallery::galleries');
    }
}