<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = auth()->user();
        if ($user->hasRole('conductor')) {
            return view('pages.profile', ['user' => $user]);
        } 
        // elseif ($user->hasRole('clinic')) {
        //     return view('clinic::pages.profile', ['user' => $user]);
        // } elseif ($user->hasRole('nurse')) {
        //     return view('nurse::pages.profile', ['user' => $user]);
        // } 
        else {
            return view('pages.profile', ['user' => $user]);
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $email = $user->email;
        $newEmail = $request->input('email');
        if($email != $newEmail ){
            if(User::where('email', $newEmail)->exists()){
                return redirect()->route('profile.edit')->with('error', 'This email already exists.');
            }
        }
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        
        // $nurse = NurseRegister::where('email', $email)->first();
        // $clinic = ClinicRegister::where('email', $email)->first();
        // if ($nurse) {
        //     $nurse->update([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email'),
        //     ]);
        // } elseif ($clinic) {
        //     $clinic->update([
        //         'name' => $request->input('name'),
        //         'email' => $request->input('email'),
        //     ]);
        // }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $user = auth()->user();

        // Verify the entered password against the user's actual password
        if (Hash::check($request->password, $user->password)) {
            $user->delete();
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Incorrect password.']);
        }
    }
}
