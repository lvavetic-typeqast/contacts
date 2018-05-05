<?php

namespace App\Http\Controllers\Api;

use App\Repository\Api\ContactRepository;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactRepository $contactRepository)
    {
        $contacts = $contactRepository->get(30,15);
        
        $contactResource = new ContactResource($contacts);
        
        return $contactResource->collection($contacts);
    }
}
