<?php

namespace App\Http\Controllers;

use Crm\Note\Models\Note;
use Crm\Customer\Services\CustomerService;
use Crm\Note\Requests\CreateNoteRequest;
use Crm\Note\Services\NoteService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteController extends Controller
{

    public function __construct(
        public CustomerService $customerService,public NoteService $noteService
    ){}
    public function create(CreateNoteRequest $request,$customerId)
    {
        $customer = $this->customerService->show($customerId);
        if( !$customer ) {
            return response()->json(['status'=> 'Customer Not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->noteService->create($request, $customerId);
    }


}
