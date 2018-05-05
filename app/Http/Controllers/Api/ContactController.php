<?php

namespace App\Http\Controllers\Api;

use App\Repository\Api\ContactRepository;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Get contacts by limit and per page
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactRepository $contactRepository)
    {
        $contacts = $contactRepository->get(30,15);
        
        $contactResource = new ContactResource($contacts);
        
        return $contactResource->collection($contacts);
    }
    
    /**
     * Insert new contact
     *
     * @return \Illuminate\Http\Response
     */
    public function insert()
    {

    }
}
