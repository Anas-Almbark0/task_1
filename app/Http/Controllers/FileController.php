<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index()
    {
        $files = File::where("user_id", "=", Auth::id())->get();
        return view('dashboard_layouts.files', compact('files'));
    }

    public function anyFiles()
    {
        $files = File::where('user_id', '!=', Auth::id())->whereHas('metadata', function ($query) {
            $query->where('status_hidden', '!=', 1);
        })->get();
        return view('dashboard_layouts.files', compact('files'));
    }

    public function create()
    {
        $groups = Group::all();
        return view("dashboard_layouts.addFile", compact("groups"));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
            "description" => "required|string",
            "file" => "required|file|mimes:jpg,jpeg,png,pdf,doc,docx,psd,svg",
            "groups" => "required"
        ]);
        $file = File::create([
            'name' => $validated['title'],
            'description' => $validated["description"],
            'path' => $validated['file']->store('images', 'public'),
            'user_id' => Auth::id(),
        ]);
        $file->metadata()->create([
            "file_id" => $file->id,
            'size' => filesize($request->file),
            'status_hidden' => request()->isPrivate == "on" ? 1 : 0,
            'extension' => $validated['file']->getClientOriginalExtension(),
        ]);
        $file->groups()->sync($validated["groups"]);
        $file->save();
        return redirect()->route("file.index")->with("success", "Uploaded file successfully");
    }

    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect()->route("file.index")->with("success", "File deleted successfully");
    }

    public function edit($id)
    {
        $file = File::find($id);
        return view("dashboard_layouts.edit", compact("file"));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            "title" => "required|string|max:255",
        ]);
        $file = File::find($request->id);
        $file->name  = $validated["title"];
        $file->save();
        return redirect()->route("file.index")->with("success", "File updated successfully");
    }


    public function show($id)
    {
        $file = File::find($id);
        return view("dashboard_layouts.showFile", compact('file'));
    }
}
