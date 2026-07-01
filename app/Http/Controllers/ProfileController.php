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
            'year_of_study' => 'nullable|string',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);
        
        $user->update($request->all());
        
        return back()->with('success', 'Profile updated successfully!');
    }
}