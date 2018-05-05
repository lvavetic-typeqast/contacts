<?php

namespace App\Http\Controllers\Api;

use App\Repository\Api\ContactRepository;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Get contacts by limit and per page
     *
     * @param \App\Repository\Api\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function index(ContactRepository $contactRepository)
    {
        $contacts = $contactRepository->get(30,15);
        
        $contactResource = new ContactResource($contacts);
        
        return $contactResource->collection($contacts);
    }
    
    /**
     * Show contact by id
     *
     * @param \App\Repository\Api\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactRepository $contactRepository, $id)
    {

    }
}
