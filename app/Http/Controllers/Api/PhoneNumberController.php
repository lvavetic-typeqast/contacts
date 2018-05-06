<?php

namespace App\Http\Controllers\Api;

use App\Repository\PhoneNumberRepository;
use App\Http\Resources\PhoneNumberResource;

class PhoneNumberController extends Controller
{
    /**
     * Get phone numbers  by limit and per page
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @return \Illuminate\Http\Response
     */
    public function index(PhoneNumberRepository $phoneNumberRepository)
    {
        $phoneNumbers = $phoneNumberRepository->get(30,15);
        
        $phoneNumberResource = new PhoneNumberResource($phoneNumbers);
        
        return $phoneNumberResource->collection($phoneNumbers);
    }
}
