<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show profile page
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    
    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'school' => 'nullable|string|max:255',
            'major' => 'nullable|string|max:255',
        ]);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        $user->info()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'school' => $request->school,
                'major' => $request->major,
            ]
        );
        
        return back()->with('success', 'Profile updated successfully!');
    }
}