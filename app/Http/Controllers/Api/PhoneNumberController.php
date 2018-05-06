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
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function insert(PhoneNumberRepository $phoneNumberRepository)
    {
        $phoneNumber = $phoneNumberRepository->create($this->request);
        
        return new PhoneNumberResource($phoneNumber);  
    }
    
    /**
     * Find phone number by id and update it
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneNumberRepository $phoneNumberRepository, $id)
    {
        $phoneNumber = $phoneNumberRepository->update($this->request, $id);
        
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
