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
}
