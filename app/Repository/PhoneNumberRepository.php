<?php

namespace App\Repository;

use App\Model\PhoneNumber;

class PhoneNumberRepository 
{
    /**
     * Get all phone numbers
     *
     * @param  int  $limit
     * @param  int  $limit
     * @return \App\Model\PhoneNumber
     */
    public function get($limit = 20, $perPage = 15)
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumbers = $phoneNumberModel
            ->with('contact')
            ->orderBy('id', 'asc')
            ->limit($limit)
            ->paginate($perPage);

        return $phoneNumbers;
    }
    
    /**
     * Get phone number by phone number id
     *
     * @param  int  $id
     * @return \App\Model\PhoneNumber
     */
    public function getById($id)
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumber = $phoneNumberModel
            ->with('contact')
            ->findOrFail($id);

        return $phoneNumber;
    }
    
    /**
     * Delete phone number by phone number id id
     *
     * @param  int  $id
     * @return \App\Model\PhoneNumber
     */
    public function deleteById($id)
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumber = $phoneNumberModel->findOrFail($id);
        
        $phoneNumber->delete();
        
        return $phoneNumber;
    }
    
    /**
     * Create new phone number
     *
     * @param  array $request
     * @return \App\Model\PhoneNumber
     */
    public function create($request)
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumberModel->contact_id = $request->input('contact_id');
        $phoneNumberModel->number = $request->input('number');
        $phoneNumberModel->label = $request->input('label');
        
        $phoneNumberModel->save();

        return $phoneNumberModel;
    }
    
    /**
     * Find phone number by id and update it
     *
     * @param  array $request
     * @param int $id
     * @return \App\Model\PhoneNumber
     */
    public function update($request, $id)
    {
        $phoneNumberModel = new PhoneNumber();
        
        $phoneNumber = $phoneNumberModel->findOrFail($id);

        $phoneNumber->contact_id = $request->input('contact_id');
        $phoneNumber->number = $request->input('number');
        $phoneNumber->label = $request->input('label');
        
        $phoneNumber->save();

        return $phoneNumber;
    }
}
