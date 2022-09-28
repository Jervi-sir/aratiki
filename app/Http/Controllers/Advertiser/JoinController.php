<?php

namespace App\Http\Controllers\Advertiser;

use App\Models\Role;
use App\Models\User;
use App\Models\Advertiser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class JoinController extends Controller
{
    /*--------------------------------------------------------
    |  []   add a fresh client       
    ----------------------------------------------------------*/
    public function joinAdvertiserPage() {
        //TODO: if already requests
        return view('auth.join');
    }

    //? joined as a new one
    public function joinAdvertiser(Request $request) {
        $user = Auth()->user();
        if(!$user) {
            $user = new User();
            $user->role_id = Role::where('name', 'advertiser')->first()->id;
            $user->uuid = Str::uuid();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            event(new Registered($user));
            Auth::login($user);
        }

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
