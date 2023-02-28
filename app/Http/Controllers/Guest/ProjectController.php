<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::orderBy('modification_date', 'DESC')->paginate(12);
        return view('guest.home', compact('projects'));
    }

        /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$previousProject = Project::where('modification_date', '>', $project->modification_date)->orderBy('modification_date')->first();
        //$nextProject = Project::where('modification_date', '<', $project->modification_date)->orderBy('modification_date', 'DESC')->first();
    return view('guest.showProject', compact('project'/*, 'previousPost', 'nextPost'*/));
    }
}
