<?php

use App\Model\Contact;

class ContactRepository 
{
    /**
     * Get all contacts
     *
     * @param  int  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get($limit = 20)
    {
        $contactModel = new Contact();

        $contacts = $contactModel
            ->orderBy('id', 'asc')
            ->limit($limit)
            ->get();

        return $contacts;
    }
}
