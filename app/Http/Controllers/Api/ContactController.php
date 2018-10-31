<?php

namespace App\Http\Controllers\Api;

use App\Repository\ContactRepository;
use App\Http\Resources\ContactResource;
use App\Http\Requests\Api\ContactRequest;

class ContactController extends Controller
{
    /**
     * Get contacts by limit and per page
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function index(ContactRepository $contactRepository) : object
    {
        $contacts = $contactRepository->paginate();

        $contactResource = new ContactResource($contacts);

        return $contactResource->collection($contacts);
    }

    /**
     * Get contacts by limit and per page
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function favourite(ContactRepository $contactRepository) : object
    {
        $contacts = $contactRepository->getFavourite(1);

        $contactResource = new ContactResource($contacts);

        return $contactResource->collection($contacts);
    }

    /**
     * Search contacts
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function search(ContactRepository $contactRepository) : object
    {
        $keyword = $this->request->get('search');

        $contacts = $contactRepository->search(15, $keyword);

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
    public function show(ContactRepository $contactRepository, int $id) : object
    {
        $contact = $contactRepository->findById($id);

        if ($contact) {
            return new ContactResource($contact);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }

    /**
     * Insert new contact
     *
     * @param \App\Http\Requests\ContactRequest $contactRequest
     * @param \App\Repository\ContactRepository $contactRepository
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function insert(ContactRequest $contactRequest, ContactRepository $contactRepository) : object
    {
        $input = $contactRequest->validationData();

        $contact = $contactRepository->create($input);

        return new ContactResource($contact);
    }

    /**
     * Find contact by id and update it
     *
     * @param \App\Http\Requests\ContactRequest $contactRequest
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $contactRequest, ContactRepository $contactRepository, int $id) : object
    {
        $input = $contactRequest->validationData();

        $contact = $contactRepository->update($input, $id);

        if ($contact) {
            return new ContactResource($contact);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }

    /**
     * Delete contact by id
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(ContactRepository $contactRepository, int $id) : object
    {
        $contact = $contactRepository->deleteById($id);

        if ($contact) {
            return new ContactResource($contact);
        } else {
            abort(response()->json(['Something went wrong! Probably the data with ID:' .$id. ' does not exist']));
        }
    }
}
