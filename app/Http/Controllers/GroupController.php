<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index() {}


    public function create()
    {
        return view("dashboard_layouts.addGroup");
    }

    public function store()
    {
        $validate = request()->validate([
            "group" => "required|min:3",
            "color_group" => "required"
        ]);

        $group = new Group();
        $group->name = $validate['group'];
        $group->color = $validate['color_group'];
        $group->save();

        return redirect()->route("group.create")->with('success', "success to add new group");
    }
}
