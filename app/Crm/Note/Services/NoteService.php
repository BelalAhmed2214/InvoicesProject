<?php

namespace Crm\Note\Services;
use Crm\Note\Models\Note;
use Crm\Note\Requests\CreateNoteRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoteService
{
    public function create(CreateNoteRequest $request,$customerId)
    {
        $note= new Note();
        $note->note = $request->get('note');
        $note->customer_id = $customerId;
        $note->save();
        return $note;
    }
}
