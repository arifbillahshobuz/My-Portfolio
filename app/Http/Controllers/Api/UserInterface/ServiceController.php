<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service() {
        $services = Service::where('status', 'active')->select('id','name','description','short_description','process','image','status','sort_order')->orderBy('sort_order', 'desc')->get();
        dd($services);
    }
}
