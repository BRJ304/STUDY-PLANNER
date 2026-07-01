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
        $materials = \App\Models\Material::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
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
        
        if ($request->hasFile('material_file')) {
            $file = $request->file('material_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('materials/' . Auth::id(), $filename, 'public');
            
            // Store in database
            \App\Models\Material::create([
                'user_id' => Auth::id(),
                'title' => $request->material_title,
                'description' => $request->material_description,
                'file_path' => $path,
                'subject' => $request->material_subject,
                'type' => $request->material_type,
                'tags' => $request->material_tags,
                'is_important' => $request->has('is_important') ? (bool)$request->is_important : false,
            ]);
        }
        
        return back()->with('success', 'Material uploaded successfully!');
    }
    
    /**
     * Delete material
     */
    public function destroy($id)
    {
        $material = \App\Models\Material::where('user_id', Auth::id())->findOrFail($id);
        
        // Delete file from disk
        if (Storage::disk('public')->exists($material->file_path)) {
            Storage::disk('public')->delete($material->file_path);
        }
        
        $material->delete();
        
        return back()->with('success', 'Material deleted successfully!');
    }
    
    /**
     * Download material
     */
    public function download($id)
    {
        $material = \App\Models\Material::where('user_id', Auth::id())->findOrFail($id);
        
        if (Storage::disk('public')->exists($material->file_path)) {
            return Storage::disk('public')->download(
                $material->file_path, 
                $material->title . '.' . pathinfo($material->file_path, PATHINFO_EXTENSION)
            );
        }
        
        return back()->with('error', 'File not found on storage.');
    }
}