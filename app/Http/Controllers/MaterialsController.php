<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialsController extends Controller
{
    /**
     * Show materials page
     */
    public function index()
    {
        $user = Auth::user();
        $materials = $this->getMaterials();
        
        return view('dashboard.materials', compact('user', 'materials'));
    }
    
    /**
     * Upload material
     */
    public function store(Request $request)
    {
        $request->validate([
            'material_file' => 'required|file|max:10240', // 10MB max
            'material_title' => 'required|string|max:255',
            'material_description' => 'nullable|string|max:500',
            'material_subject' => 'required|string',
            'material_type' => 'required|string',
            'material_tags' => 'nullable|string',
            'is_important' => 'nullable|boolean',
        ]);
        
        // Store file (replace with actual logic)
        if ($request->hasFile('material_file')) {
            $file = $request->file('material_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('materials/' . Auth::id(), $filename, 'public');
            
            // Store in database
            // Material::create([...]);
        }
        
        return back()->with('success', 'Material uploaded successfully!');
    }
    
    /**
     * Delete material
     */
    public function destroy($id)
    {
        // Delete material (replace with actual logic)
        return back()->with('success', 'Material deleted successfully!');
    }
    
    /**
     * Download material
     */
    public function download($id)
    {
        // Download material (replace with actual logic)
        // $material = Material::find($id);
        // return Storage::download($material->file_path);
        
        return back()->with('success', 'Download started!');
    }
    
    private function getMaterials()
    {
        // Get materials (replace with actual logic)
        return [
            [
                'id' => 1,
                'title' => 'Math Notes',
                'description' => 'Chapter 5 - Calculus',
                'type' => 'notes',
                'icon' => '📄',
                'uploaded' => 'Jan 10',
                'subject' => 'Mathematics'
            ],
            [
                'id' => 2,
                'title' => 'Physics Lab Report',
                'description' => 'Mechanics - Experiment 3',
                'type' => 'assignment',
                'icon' => '📊',
                'uploaded' => 'Jan 8',
                'subject' => 'Physics'
            ],
            [
                'id' => 3,
                'title' => 'Chemistry Notes',
                'description' => 'Organic Chemistry - Chapter 3',
                'type' => 'notes',
                'icon' => '📝',
                'uploaded' => 'Jan 6',
                'subject' => 'Chemistry'
            ],
        ];
    }
}