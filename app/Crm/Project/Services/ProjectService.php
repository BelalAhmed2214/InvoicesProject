<?php

namespace Crm\Project\Services;

use Crm\Project\Models\Project;
use Crm\Project\Requests\CreateProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectService
{
    public function create(CreateProjectRequest $request,$customerId)
    {
        $project= new Project();
        $project->project_name = $request->get('project_name');
        $project->status = (bool)$request->get('status');
        $project->project_cost = $request->get('project_cost');
        $project->customer_id = $customerId;

        $project->save();
        return $project;
    }
}
