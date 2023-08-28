<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminFilter implements FilterInterface
{

   protected $session;

	public function __construct(){
       $this->session = \Config\Services::session();
	}

    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in') || (!session()->get('isAdmin'))) {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
       
    }
}