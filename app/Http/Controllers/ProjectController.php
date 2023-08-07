<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Method to display a list of projects
    public function index()
    {
        $projects = Project::all();
        return response()->json(['projects' => $projects]);
    }

    // Method to store a new project
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|url',
            'link' => 'required|url',
        ]);

        $project = new Project;
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->image = $request->input('image');
        $project->link = $request->input('link');
        $project->save();

        return response()->json(['message' => 'Project created successfully']);
    }

    // Method to update an existing project
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|url',
            'link' => 'required|url',
        ]);

        $project = Project::findOrFail($id);
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->image = $request->input('image');
        $project->link = $request->input('link');
        $project->save();

        return response()->json(['message' => 'Project updated successfully']);
    }

    // Method to delete a project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json(['message' => 'Project deleted successfully']);
    }
}
