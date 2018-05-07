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
    public function findById($id)
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
     * @param  array $inputs
     * @return \App\Model\PhoneNumber
     */
    public function create(array $inputs)
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumberModel->contact_id = $inputs['contact_id'];
        $phoneNumberModel->number = $inputs['number'];
        $phoneNumberModel->label = $inputs['label'];
        
        $phoneNumberModel->save();

        return $phoneNumberModel;
    }
    
    /**
     * Find phone number by id and update it
     *
     * @param  array $inputs
     * @param int $id
     * @return \App\Model\PhoneNumber
     */
    public function update(array $inputs, $id)
    {
        $phoneNumberModel = new PhoneNumber();
        
        $phoneNumber = $phoneNumberModel->findOrFail($id);

        $phoneNumber->contact_id = $inputs['contact_id'];
        $phoneNumber->number = $inputs['number'];
        $phoneNumber->label = $inputs['label'];
        
        $phoneNumber->save();

        return $phoneNumber;
    }
}
