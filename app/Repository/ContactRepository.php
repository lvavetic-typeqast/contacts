<?php

namespace App\Repository;

use App\Model\Contact;
use App\Model\PhoneNumber;

class ContactRepository 
{
    /**
     * Get all contacts
     *
     * @param  int  $limit
     * @param  int  $perPage
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
     * Search all contacts
     *
     * @param  int  $perPage
     * @param  string  $keyword
     * @return \App\Model\Contact
     */
    public function search($perPage = 15, $keyword)
    {
        $contactModel = new Contact();

        $contacts = $contactModel
            ->when($keyword, function ($query) use ($keyword) {
                $query->where('firstname', 'LIKE', '%'.$keyword.'%');
                $query->orWhere('lastname', 'LIKE', '%'.$keyword.'%');
            })
            ->with('numbers')
            ->orderBy('id', 'asc')
            ->paginate($perPage);

        return $contacts;
    }
    
    /**
     * Get contact by contact id
     *
     * @param  int  $id
     * @return \App\Model\Contact
     */
    public function findById($id)
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
    public function deleteById($id) : ?Contact
    {
        $contactModel = new Contact();

        $contact = $contactModel->find($id);
        
        return $contact ? $contact->delete() : null;
    }
    
    /**
     * Create new contact
     *
     * @param  array $inputs
     * @return \App\Model\Contact
     */
    public function create(array $inputs) : Contact
    {
        $contactModel = new Contact();
    
        $contactModel->firstname = $inputs['firstname'];
        $contactModel->lastname = $inputs['lastname'];
        $contactModel->email = $inputs['email'];
        $contactModel->is_favorite = $inputs['is_favorite'];
        
        $contactModel->save();
        
        $this->saveNumber($contactModel, $inputs['numbers']);

        return $contactModel;
    }
    
    /**
     * Find contact by id and update it
     *
     * @param  array $inputs
     * @param int $id
     * @return \App\Model\Contact
     */
    public function update(array $inputs, $id)
    {
        $contactModel = new Contact();
        
        $contact = $contactModel->findOrFail($id);

        $contact->firstname = $inputs['firstname'];
        $contact->lastname = $inputs['lastname'];
        $contact->email = $inputs['email'];
        $contact->is_favorite = $inputs['is_favorite'];
        
        $contact->save();
       
        return $contact;
    }
    
    /**
     * Save numbers relation
     *
     * @param \App\Model\Contact $contact
     * @param  array $input
     * @return void
     */
    private function saveNumber(Contact $contact, $input)
    {
        $phoneNumber = new PhoneNumber();

        $phoneNumber->number = $input['number'];
        $phoneNumber->label = $input['label'];

        $contact->numbers()->save($phoneNumber);
    }
}
