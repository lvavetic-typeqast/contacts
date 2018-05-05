<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use ResponseApi\Response;

class Controller extends BaseController
{
    /**
     * The http request instance
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The api response instance
     *
     * @var \ResponseApi\Response
     */
    protected $response;

    /**
     * Create new controller instance
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ResponseApi\Response  $response
     * @param  \Illuminate\Config\Repository  $config
     * @param  \Illuminate\Translation\Translator  $lang
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}
