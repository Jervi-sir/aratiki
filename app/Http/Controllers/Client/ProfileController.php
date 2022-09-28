<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require dirname(__DIR__) . '\zHelpers\upload.php';

class ProfileController extends Controller
{
    public function edit() {
        $user = Auth()->user();
        $data['user'] = [
            'name' => $user->name,
            'email' => $user->email,
            'bio' => $user->bio ? $user->bio : 'no Bio',
            'phone_number' => $user->phone_number,
            'image' => $user->images ? url('/') . '/media/' . $user->images : null,
        ];

        return view('Client.editProfile.index',
        [
            'user' => $data['user']
        ]);
    }

    public function update(Request $request) {
        $user = Auth()->user();
        $user->name = $request->user_name;
        $user->details = $request->description;

        $adv = $user->advertiser;
        $adv->name = $request->user_name;
        $adv->details = $request->description;
        $adv->phone_number = $request->phone_number;

        $imagePath = saveImage($request->image, $user->uuid, '', 'advertiser_');
        $user->images = $imagePath;
        $adv->images = $imagePath;

        $user->save();
        $adv->save();
        
        return redirect()->route('user.edit');
    }
}
