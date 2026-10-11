<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function project()
    {
        try {
            $projects = Project::where('status', 'active')->select('id', 'name', 'image', 'client_id', 'service_id', 'start_date', 'end_date', 'status', 'sort_order')->orderBy('sort_order', 'asc')
                ->with(['client:id,name', 'service:id,name', 'detail:id,project_id,images,description,short_description,live_link'])->get();
            return ApiResponse::success(message: 'Project Data Get Successfully', data: $projects);
        } catch (Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
}
