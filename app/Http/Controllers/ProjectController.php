<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function projects(Request $request)
    {
        //$projects = Project::where('is_deleted',false)->where('is_public',true)->get();

        $query = Project::query();

        $query->where('is_deleted', false)->where('is_public', true);

        if ($request->has('name') && $request->name != '') {
            $name = $request->input('name');
            $query->where('save_as', 'like', '%' . $name . '%');
        }

        if ($request->has('topic') && $request->topic != '') {
            $topic = $request->input('topic');
            $query->where('language', $topic);
        }

        $projects = $query->paginate(20)->appends($request->all());

        return view('projects',compact('projects'));
    }

    public function view_project($id){
        $project_id = base64_decode($id);
        $project = Project::where('is_deleted',false)->where('is_public',true)->where('id',$project_id)->first();
        return view('view-project',compact('project'));
    }

    public function web_project($id){
        $project_id = base64_decode($id);
        $project = Project::where('is_deleted',false)->where('is_public',true)->where('id',$project_id)->first();
        $encrypted_project_id = base64_encode($project->id);
        return view('web-project',compact('project','encrypted_project_id'));
    }

    public function view_project_code($id){
        $project_id = base64_decode($id);
        $project = Project::where('is_deleted',false)->where('is_public',true)->where('id',$project_id)->first();
        return view('view-project-code',compact('project'));
    }
}
