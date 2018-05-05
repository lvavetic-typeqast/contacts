<?php

namespace App\Repository;

use App\Model\Contact;

class ContactRepository 
{
    /**
     * Get all contacts
     *
     * @param  int  $limit
     * @param  int  $limit
     * @return \App\Model\Contact
     */
    public function get($limit = 20, $perPage = 15)
    {
        $contactModel = new Contact();

        $contacts = $contactModel
            ->with('numbers')
            ->orderBy('id', 'asc')
            ->limit($limit)
            ->paginate($perPage);

        return $contacts;
    }
    
    /**
     * Get contact by contact id
     *
     * @param  int  $id
     * @return \App\Model\Contact
     */
    public function getById($id)
    {
        $contactModel = new Contact();

        $contact = $contactModel
            ->with('numbers')
            ->findOrFail($id);

        return $contact;
    }
    
    /**
     * Delete contact by contact id
     *
     * @param  int  $id
     * @return void
     */
    public function deleteById($id)
    {
        $contactModel = new Contact();

        $contact = $contactModel->findOrFail($id);
        
        $contact->delete();
        
        return $contact;
    }
    
    /**
     * Create new contact
     *
     * @param  array $request
     * @return \App\Model\Contact
     */
    public function create($request)
    {
        $contactModel = new Contact();

        $contactModel->firstname = $request->input('firstname');
        $contactModel->lastname = $request->input('lastname');
        $contactModel->email = $request->input('email');
        $contactModel->is_favorite = $request->input('is_favorite');
        
        $contactModel->save();

        return $contactModel;
    }
    
    /**
     * Find contact by id and update it
     *
     * @param  array $request
     * @param int $id
     * @return \App\Model\Contact
     */
    public function update($request, $id)
    {
        $contactModel = new Contact();
        
        $contact = $contactModel->findOrFail($id);

        $contact->firstname = $request->input('firstname');
        $contact->lastname = $request->input('lastname');
        $contact->email = $request->input('email');
        $contact->is_favorite = $request->input('is_favorite');
        
        $contact->save();

        return $contact;
    }
}
