<?php

namespace App\Http\Controllers;

use Crm\Project\Services\ProjectService;
use Crm\Customer\Services\CustomerService;
use Crm\Project\Requests\CreateProjectRequest;
use Crm\Project\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    private ProjectService $projectService;
    private CustomerService $customerService;

    public function __construct(ProjectService $projectService, CustomerService $customerService)
    {
        $this->customerService = $customerService;
        $this->projectService = $projectService;
    }

    public function create(CreateProjectRequest $request,$customerId)
    {
        $customer = $this->customerService->show($customerId);
        if( !$customer ) {
            return response()->json(['status'=> 'Customer Not found'], Response::HTTP_NOT_FOUND);
        }
        return $this->projectService->create($request, $customerId);
    }

}
