<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\UploadService;
class UploadController extends Controller
{
    protected $upload;

    public function __construct(App\Http\Services\UploadService $upload)
    {
        $this->upload = $upload;
    }
    public function store(Request $request)
    {
        dd($request->file());
    }
}
