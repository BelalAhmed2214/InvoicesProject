<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    public function index(Request $request,$customerId)
    {
        return Project::where('customer_id',$customerId)->get();

    }

    public function show(Request $request,$id,$customerId)
    {
        $project = Project::where('customer_id', $customerId)->find($id);
        if (!$project) {
            return response()->json(['status' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        return $project;
    }

    public function create(Request $request,$customerId)
    {
        $project= new Project();
        $project->project_name = $request->get('project_name');
        $project->status = (bool)$request->get('status');
        $project->project_cost = $request->get('project_cost');
        $project->customer_id = $customerId;

        $project->save();
        return $project;
    }
    public function update(Request $request,$id,$customerId)
    {
        $project = Project::find($id);
        if(!$project){
            return response()->json(['status'=>'Not Found'],Response::HTTP_NOT_FOUND);
        }
        if ($project->customer_id != $customerId){
            return response()->json(['status'=>'Invalid Data'],Response::HTTP_BAD_REQUEST);

        }
        $project->project_name = $request->get('project_name');
        $project->status = $request->get('status');
        $project->project_cost = $request->get('project_cost');
        $project->save();
        return $project;
    }
    public function delete(Request $request,$id,$customerId)
    {
        $project = Project::find($id);
        if(!$project){
            return response()->json(['status'=>'Not Found'],Response::HTTP_NOT_FOUND);
        }
        if ($project->customer_id != $customerId){
            return response()->json(['status'=>'Invalid Data'],Response::HTTP_BAD_REQUEST);

        }
        $project->delete();
        return response()->json(['status'=>'deleted'],Response::HTTP_OK);
        ;
    }


}
