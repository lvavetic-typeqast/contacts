<?php

namespace App\Http\Controllers\Api;

use App\Repository\PhoneNumberRepository;
use App\Http\Resources\PhoneNumberResource;
use App\Http\Requests\Api\PhoneNumberRequest;

class PhoneNumberController extends Controller
{
    /**
     * Get phone numbers  by limit and per page
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @return \Illuminate\Http\Response
     */
    public function paginate(PhoneNumberRepository $phoneNumberRepository) : object
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
    public function show(PhoneNumberRepository $phoneNumberRepository, int $id) : object
    {
        $phoneNumber = $phoneNumberRepository->findById($id);

        if ($phoneNumber) {
            return new PhoneNumberResource($phoneNumber);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }

    /**
     * Insert new phone number
     *
     * @param \App\Http\Requests\PhoneNumberRequest $phoneNumberRequest
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function insert(PhoneNumberRequest $phoneNumberRequest, PhoneNumberRepository $phoneNumberRepository) : object
    {
        $input = $phoneNumberRequest->validationData();

        $phoneNumber = $phoneNumberRepository->create($input);

        return new PhoneNumberResource($phoneNumber);
    }

    /**
     * Find phone number by id and update it
     *
     * @param \App\Http\Requests\PhoneNumberRequest $phoneNumberRequest
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneNumberRequest $phoneNumberRequest, PhoneNumberRepository $phoneNumberRepository, int $id) : object
    {
        $input = $phoneNumberRequest->validationData();

        $phoneNumber = $phoneNumberRepository->update($input, $id);

        if ($phoneNumber) {
            return new PhoneNumberResource($phoneNumber);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }

    /**
     * Delete contact by id
     *
     * @param \App\Repository\PhoneNumberRepository $phoneNumberRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(PhoneNumberRepository $phoneNumberRepository, int $id) : object
    {
        $phoneNumber = $phoneNumberRepository->deleteById($id);

        if ($phoneNumber) {
            return new PhoneNumberResource($phoneNumber);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }
}
