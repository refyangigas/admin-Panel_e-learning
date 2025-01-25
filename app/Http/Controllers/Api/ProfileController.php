<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $profile = $user->profile;

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $user->id,
                'email' => $user->email,
                'full_name' => $user->full_name,
                'score' => $user->score,
                'profile' => $profile ? [
                    'birth_place' => $profile->birth_place,
                    'birth_date' => $profile->birth_date,
                    'gender' => $profile->gender,
                ] : null
            ]
        ]);
    }
}
