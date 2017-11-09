<?php

namespace App\Http\Controllers;

use App\Project;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller {

    public function index() {
        if (Auth::check()) {
            $projects = Project::where('user_id', Auth::user()->id)->get();
            return view('projects.index', ['projects' => $projects]);
        }
        return view('auth.login');
    }

    public function create($company_id = null) {
        $companies = null;
        if (!$company_id) {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        return view('projects.create', ['company_id' => $company_id, 'companies' => $companies]);
    }

    public function store(Request $request) {
        if (Auth::check()) {
            $project = Project::create([
                        'name' => $request->input('name'),
                        'description' => $request->input('description'),
                        'company_id' => $request->input('company_id'),
                        'user_id' => Auth::user()->id
            ]);
            if ($project) {
                return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project Created Successfully');
            }
        }
        return back()->withInput()->with('errors', 'Could not create Project');
    }

    public function show(Project $project) {
        $project = Project::find($project->id);
        $comments = $project->comments;
        return view('projects.show', ['project' => $project, 'comments' => $comments]);
    }

    public function edit(Project $project) {
        $project = Project::find($project->id);
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Request $request, Project $project) {
        $projectUpdate = Project::where('id', $project->id)->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);
        if ($projectUpdate) {
            return redirect()->route('projects.show', ['project' => $project->id])->with('success', 'Project Updated Successfully');
        }
        return back()->withInput();
    }

    public function destroy(Project $project) {
        $findProject = Project::find($project->id);
        if ($findProject->delete()) {
            return redirect()->route('projects')->with('success', 'Project Deleted Successfully');
        }
        return back()->withInput()->with('errors', 'Project Could Not Be deleted');
    }

}
