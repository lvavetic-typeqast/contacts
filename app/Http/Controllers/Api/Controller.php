<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    /**
     * The http request instance
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;
    
    /**
     * Create new controller instance
     *
     * @param  \Illuminate\Http\Request  $request

     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}