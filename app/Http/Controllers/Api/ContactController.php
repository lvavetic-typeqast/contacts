<?php

namespace App\Http\Controllers\Api;

use App\Repository\ContactRepository;
use App\Http\Resources\ContactResource;

class ContactController extends Controller
{
    /**
     * Get contacts by limit and per page
     *
     * @param \App\Repository\ContactRepository $contactRepository
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
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactRepository $contactRepository, $id)
    {
        $contact = $contactRepository->findById($id);
        
        return new ContactResource($contact);
    }
    
    /**
     * Insert new contact
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function insert(ContactRepository $contactRepository)
    {
        $contact = $contactRepository->create($this->request);
        
        return new ContactResource($contact);       
    }
    
    /**
     * Find contact by id and update it
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRepository $contactRepository, $id)
    {
        $contact = $contactRepository->update($this->request, $id);
        
        return new ContactResource($contact);
    }
    
    /**
     * Delete contact by id
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(ContactRepository $contactRepository, $id)
    {
        $contact = $contactRepository->deleteById($id);
        
        return new ContactResource($contact);
    }
}
