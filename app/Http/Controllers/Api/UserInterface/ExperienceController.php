<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use Exception;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function experience()
    {
        try {
            $experiences = Experience::select('id', 'company', 'designation', 'owner', 'start_job', 'end_job', 'location', 'image', 'message')->orderBy('start_job', 'desc')->get();
            return ApiResponse::success(message: 'Experiences Data Get Successfully', data: $experiences);
        } catch (Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
}
