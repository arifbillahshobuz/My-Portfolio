<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function service() {
        try{
            $services = Service::where('status', 'active')->select('id','name','description','short_description','process','image','status','sort_order')->orderBy('sort_order', 'asc')->get();
           return ApiResponse::success(message: 'Hero Data Get Successfully', data: $services);
        } catch (Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
}
