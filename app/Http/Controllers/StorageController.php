<?php

namespace App\Http\Controllers;

use App\Models\Storage;

class StorageController extends Controller
{
    public function allStorages()
    {
        return view('storages', ['data' => Storage::all()]);
    }
}
