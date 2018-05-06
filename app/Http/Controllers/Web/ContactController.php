<?php

namespace App\Http\Controllers\Web;

use App\Repository\ContactRepository;

class ContactController extends Controller
{
    /**
     * Get contacts from API and pass it to view
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
        
        return $this->response->view('web.contact.index', $data);
    }
}