<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use App\Services\Guest\GuestService;

class BaseController extends Controller
{
    public $service;
    public function __construct(GuestService $service)
    {
        $this->service = $service;
    }
}