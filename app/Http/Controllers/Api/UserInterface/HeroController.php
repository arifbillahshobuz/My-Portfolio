<?php

namespace App\Http\Controllers\Api\UserInterface;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Hero;
use App\Models\User;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function hero(Request $request)
    {
        try {

            $hero = Hero::select(['title', 'sub_title', 'description', 'image',])->orderBy('id', 'desc')->first();
            $user = User::select(['id', 'email',])->with(['profile:id,user_id,cv,facebook,instagram,linkedin,github,twitter',])->orderBy('id', 'desc')->first();
            $experiance = Experience::select('id','end_job')->get();
            $data = [
                'title'       => $hero?->title,
                'sub_title'   => $hero?->sub_title,
                'description' => $hero?->description,
                'image'       => $hero?->image,
                'cv'          => $user?->profile?->cv,
                'facebook'    => $user?->profile?->facebook,
                'instagram'   => $user?->profile?->instagram,
                'linkedin'    => $user?->profile?->linkedin,
                'github'      => $user?->profile?->github,
                'twitter'     => $user?->profile?->twitter,
            ];
            return ApiResponse::success(message: 'Hero Data Get Successfully', data: $data);
        } catch (Exception $e) {
            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
    public function downloadCV()
    {
        try {
            $hero = UserProfile::first();

            // 1. Check CV from heroes table
            if ($hero && !empty($hero->cv)) {

                $cvPath = public_path('userInterface/assets/cv/' . $hero->cv);

                if (file_exists($cvPath)) {
                    return response()->download(
                        $cvPath,
                        'Md-Arif-Billah-Shobuz-CV.pdf'
                    );
                }
            }
            // 2. If Hero CV not found, use default CV
            $defaultCv = public_path('userInterface/assets/cv/arif_billah_shobuz.pdf');
            // dd($defaultCv);

            if (file_exists($defaultCv)) {
                return response()->download(
                    $defaultCv,
                    'Md-Arif-Billah-Shobuz-CV.pdf'
                );
            }
          return redirect()->back();
        } catch (Exception $e) {

            return ApiResponse::error(
                error_data: $e->getMessage()
            );
        }
    }
}
