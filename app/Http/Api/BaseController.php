<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use App\Services\Guest\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;

    }

}