<?php

namespace App\Http\Controllers\Client;

use App\Models\Role;

use App\Models\Advertiser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UpgradeController extends Controller
{
    /*--------------------------------------------------------
    |   []  become an advertiser
    ----------------------------------------------------------*/
    public function upgradePage()  {
        $user = Auth::user();
        $data['user'] = [
            'email' => $user->email,
            'name' => $user->name,
            'description' => $user->bio ? $user->bio : 'no Bio',
            'phone_number' => $user->phone_number,
        ];
        return view('Client.upgrade.index',
            [
                'user' => $data['user'],
            ]);
    }

    public function upgrade(Request $request) {
        $user = Auth()->user();
        $user->role_id = Role::where('name', 'advertiser')->first()->id;
        $user->save();

        $adv = new Advertiser();
        $adv->user_id = $user->id;
        $adv->uuid = Str::uuid();
        $adv->name = $request->name;
        $adv->phone_number = $request->phone_number;
        $adv->details = $request->description;
        $adv->save();

        session()->flash('hasNotification' , true);
        return redirect()->route('home');
    }
}
