<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    // Method to display a list of projects
    public function index()
    {
        $projects = Project::orderBy('created_at', 'desc')->get();
        return response()->json(['projects' => $projects]);
    }



    // Method to show an individual blog post
    public function show(Project $project)
    {
        return [
            "status" => 1,
            "data" => $project
        ];
    }

    // Method to display the create post form
    public function create()
    {
        return view('projects.create');
    }
    // Method to store a new project
    public function store(Request $request)
    {
        try {
            $this->authorize('create', Project::class);
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
        } catch (\Exception $e) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
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
