<?php

namespace App\Http\Controllers\Web;

use App\Repository\ContactRepository;

class ContactController extends Controller
{
    /**
     * Get contacts from API
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function index(ContactRepository $contactRepository)
    {
        $url = 'http://www.contacts.dev/api/contacts';
        
        $contacts = $contactRepository->getData($url);
        
        $data = [
            'contacts' => $contacts['data'],
        ];
        
        //create response to view
    }
}