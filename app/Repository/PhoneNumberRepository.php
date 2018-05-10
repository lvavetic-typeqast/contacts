<?php

namespace App\Repository;

use App\Model\PhoneNumber;

class PhoneNumberRepository extends Repository
{
    /**
     * Get all phone numbers
     *
     * @param  int  $limit
     * @param  int  $limit
     * @return \App\Model\PhoneNumber
     */
    public function get(int $limit = 20, int $perPage = 15) : object
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
    public function findById(int $id) : ?PhoneNumber
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumber = $phoneNumberModel
            ->with('contact')
            ->find($id);

        return $phoneNumber ? $phoneNumber : null;
    }

    /**
     * Delete phone number by phone number id id
     *
     * @param  int  $id
     * @return \App\Model\PhoneNumber
     */
    public function deleteById(int $id) : ?PhoneNumber
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumber = $phoneNumberModel->find($id);

        if (! $phoneNumber) {
            return null;
        }

        $phoneNumber->delete();

        return $phoneNumber;
    }

    /**
     * Create new phone number
     *
     * @param  array $inputs
     * @return \App\Model\PhoneNumber
     */
    public function create(array $inputs) : PhoneNumber
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
    public function update(array $inputs, int $id) : ?PhoneNumber
    {
        $phoneNumberModel = new PhoneNumber();

        $phoneNumber = $phoneNumberModel->find($id);

        $phoneNumber->contact_id = $inputs['contact_id'];
        $phoneNumber->number = $inputs['number'];
        $phoneNumber->label = $inputs['label'];

        $phoneNumber->save();

        return $phoneNumber;
    }
}
