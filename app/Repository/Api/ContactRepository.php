<?php

namespace App\Repository\Api;

use App\Model\Contact;

class ContactRepository 
{
    /**
     * Get all contacts
     *
     * @param  int  $limit
     * @param  int  $limit
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function get($limit = 20, $perPage)
    {
        $contactModel = new Contact();

        $contacts = $contactModel
            ->with('numbers')
            ->orderBy('id', 'asc')
            ->limit($limit)
            ->paginate($perPage);

        return $contacts;
    }
}
