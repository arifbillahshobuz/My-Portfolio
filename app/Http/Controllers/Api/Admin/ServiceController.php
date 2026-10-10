<?php

namespace App\Http\Controllers\Api\Admin;

use App\Helpers\ApiResponse;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Exception;
use Illuminate\Http\JsonResponse;


use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        try {
            $query = Service::query();
            // 1. Search functionality (email, phone, title)
            if ($request->filled('search')) {
                $search = $request->input('search');
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%");
                });
            }

            // 2. Filter by specific service 
            if ($request->filled('service_id')) {
                $query->where('id', $request->input('service_id'));
            }

            // 3. Filter by title 
            if ($request->filled('title')) {
                $query->where('title', $request->input('title'));
            }

            // 5. Date range filter
            if ($request->filled('from_date')) {
                $query->whereDate('created_at', '>=', $request->input('from_date'));
            }

            if ($request->filled('to_date')) {
                $query->whereDate('created_at', '<=', $request->input('to_date'));
            }

            // 6. Sorting (asc/desc)
            $sortBy = $request->input('sort_by', 'id'); // default id diye sort
            $sortOrder = $request->input('sort_order', 'desc'); // default descending
            $query->orderBy($sortBy, $sortOrder);

            // 7. Pagination (per page control)
            $perPage = $request->input('per_page', 10);
            $services = $query->paginate($perPage);

            // Check if no data found
            if ($services->isEmpty()) {
                return ApiResponse::success(message: 'Service not found', data: []);
            }

            return ApiResponse::success(message: 'services retrieved successfully', data: $services);
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: $exception->getMessage());
        }
    }
    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'short_description' => 'nullable|string',
                'process' => 'nullable|string',
                'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'required|in:active,inactive',
                'sort_order' => 'nullable|integer|min:0',
            ]);

            $imageName = null;

            if ($request->hasFile('image')) {
                $imageName = FileHelper::uploadFile(
                    $request->file('image'),
                    'admin/assets/img/service'
                );
            }

            $service = Service::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'short_description' => $request->input('short_description'),
                'process' => $request->input('process'),
                'image' => $imageName,
                'status' => $request->input('status'),
                'sort_order' => $request->input('sort_order', 0),
            ]);

            return ApiResponse::success(
                message: 'Service Create Success!',
                data: $service,
                status_code: 201
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }


    public function update(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'service_id' => 'required|integer|exists:services,id',
                'name' => 'sometimes|required|string|max:255',
                'description' => 'sometimes|nullable|string',
                'short_description' => 'sometimes|nullable|string',
                'process' => 'sometimes|nullable|string',
                'image' => 'sometimes|nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
                'status' => 'sometimes|required|in:active,inactive',
                'sort_order' => 'sometimes|nullable|integer|min:0',
            ]);
            $service = Service::find($request->input('service_id'));
            if (!$service) {
                return ApiResponse::error(
                    message: 'Service not found!',
                    status_code: 404
                );
            }
            $imageName = $service->image;
            if ($request->hasFile('image')) {
                $newImageName = FileHelper::uploadFile(
                    $request->file('image'),
                    'admin/assets/img/service'
                );

                if ($newImageName) {
                    if ($service->image) {
                        FileHelper::deleteFile(
                            'admin/assets/img/service/' . $service->image
                        );
                    }
                    $imageName = $newImageName;
                }
            }
            $service->update([
                'name' => $request->input('name', $service->name),
                'description' => $request->input('description', $service->description),
                'short_description' => $request->input('short_description', $service->short_description),
                'process' => $request->input('process', $service->process),
                'image' => $imageName,
                'status' => $request->input('status', $service->status),
                'sort_order' => $request->input('sort_order', $service->sort_order),
            ]);
            return ApiResponse::success(
                message: 'Service Update Success!',
                data: $service->fresh(),
                status_code: 200
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
    //service delete
    public function delete(Request $request)
    {
        try {
            $service = Service::findOrFail($request->input('service_id'));
            $service->delete();
            if ($service->image) {
                FileHelper::deleteFile('admin/assets/img/service/' . $service->image);
            }
            return ApiResponse::success(message: 'Service Delete Successfully');
        } catch (Exception $exception) {
            return ApiResponse::error(error_data: 'Service not found', status_code: 404);
        }
    }
}
