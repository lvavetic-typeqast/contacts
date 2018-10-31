<?php

namespace App\Http\Controllers\Web;

class ContactController extends Controller
{
    /**
     * Get contacts from API and pass it to view
     *
     * @param \App\Repository\ContactRepository $contactRepository
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->response->view('index');
    }
} 