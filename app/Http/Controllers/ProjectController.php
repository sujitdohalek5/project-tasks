<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $projects = Project::query();

        if ($request->has('filter')) {
            $projects->where('project_name', 'like', '%' . $request->filter . '%');
            $projects->orWhere('project_code', 'like', '%' . $request->filter . '%');
        }

        $projects = $projects->with('tasks')->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_code' => 'required|unique:projects',
            'project_name' => 'required',
            'tasks.*.task_name' => 'required',
            'tasks.*.task_hours' => 'required',
        ]);

        $projectData = $request->only(['project_code', 'project_name']);
        $tasksData = $request->input('tasks');

        // dd($projectData, $tasksData);
        $project = Project::create($projectData);

        foreach ($tasksData as $task) {
            $project->tasks()->create($task);
        }

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $messages = [
            'project_code.required' => 'project_code is required',
            'project_code.unique' => 'The key has already been taken.',
        ];
        $request->validate([
            'project_code' => [
                'required',
                // 'unique:projects,project_code,'.$project->project_code
                function (string $attribute, mixed $value, \Closure $fail) {
                    if (!(Project::where('project_code', $value)->exists())) {
                        $fail("The {$attribute} entry is not available.");
                    }
                }
            ],
            'project_name' => 'required',
            'tasks.*.task_name' => 'required',
            'tasks.*.task_hours' => 'required',
        ], $messages);

        $projectData = $request->only(['project_code', 'project_name']);
        $tasksData = $request->input('tasks');

        $project->update($projectData);
        $project->tasks()->delete();

        foreach ($tasksData as $task) {
            $project->tasks()->create($task);
        }

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        Task::where('project_code', $project->project_code)->delete();
        $project->delete();
        return redirect()->route('projects.index');
    }
}
