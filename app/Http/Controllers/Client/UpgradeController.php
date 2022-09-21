<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Models\Role;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpgradeController extends Controller
{
    /*--------------------------------------------------------
    |   []  become an advertiser
    ----------------------------------------------------------*/
    public function upgradePage()
    {
        return view('tailwind.user.upgrade');
    }

    public function upgrade(Request $request)
    {
        $user = Auth::user();
        $user->role_id = Role::where('name', 'advertiser')->first()->id;
        $user->save();

        $adv = new Advertiser();
        $adv->user_id = $user->id;
        $adv->company_name = $request->company_name;
        $adv->phone_number = $request->phone_number;
        $adv->details = $request->details;
        //TODO: $adv->images = $request->images;
        $adv->save();

        dd($adv, $user);

    }
}
