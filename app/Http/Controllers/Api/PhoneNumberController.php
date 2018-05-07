<?php

namespace App\Http\Controllers\Api;

use App\Repository\PhoneNumberRepository;
use App\Http\Resources\PhoneNumberResource;
use App\Http\Requests\PhoneNumberRequest;

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
    
    /**
     * Show phone number by id
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(PhoneNumberRepository $phoneNumberRepository, $id)
    {
        $phoneNumber = $phoneNumberRepository->findById($id);
        
        return new PhoneNumberResource($phoneNumber);
    }
    
    /**
     * Insert new phone number
     *
     * @param \App\Http\Requests\PhoneNumberRequest $phoneNumberRequest
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function insert(PhoneNumberRequest $phoneNumberRequest, PhoneNumberRepository $phoneNumberRepository)
    {
        $input = $phoneNumberRequest->validationData();
        
        $phoneNumber = $phoneNumberRepository->create($input);
        
        return new PhoneNumberResource($phoneNumber);  
    }
    
    /**
     * Find phone number by id and update it
     *
     * @param \App\Http\Requests\PhoneNumberRequest $phoneNumberRequest
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneNumberRequest $phoneNumberRequest, PhoneNumberRepository $phoneNumberRepository, $id)
    {
        $input = $phoneNumberRequest->validationData();
        
        $phoneNumber = $phoneNumberRepository->update($input, $id);
        
        return new PhoneNumberResource($phoneNumber);  
    }
    
    /**
     * Delete contact by id
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(PhoneNumberRepository $phoneNumberRepository, $id)
    {
        $phoneNumber = $phoneNumberRepository->deleteById($id);
        
        return new PhoneNumberResource($phoneNumber);  
    }
}
