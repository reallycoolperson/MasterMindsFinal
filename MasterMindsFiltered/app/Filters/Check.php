<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Check implements FilterInterface
{
    public function before(RequestInterface $request)
    {
     $uri = service('uri');
     if($uri->getSegment(1) == "Admin")
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'moderator')
        return redirect()->to('/Moderator/index');
        else  if (session()->get('tip_ulogovan') == 'igrac')
        return redirect()->to('/Igrac/index');
        }
     }

     else if(($uri->getSegment(1) == "Moderator"))
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'admin')
        return redirect()->to('/Admin/index');
        else  if (session()->get('tip_ulogovan') == 'igrac')
        return redirect()->to('/Igrac/index');
        }
     }

     else if(($uri->getSegment(1) == "Igrac"))
     {
       if((!session()->get('isLoggedIn')))
       return redirect()->to('/Home/index');
       else
        { //ulogovan je
        if (session()->get('tip_ulogovan') == 'admin')
        return redirect()->to('/Admin/index');
        else  if (session()->get('tip_ulogovan') == 'moderator')
        return redirect()->to('/Moderator/index');
        }
     }

     if($uri->getSegment(1) == "Home")
     {
       if(session()->get('isLoggedIn') && $uri->getSegment(2) != "odjava" )
       {
         if (session()->get('tip_ulogovan') == 'admin')
         return redirect()->to('/Admin/index');
         else  if (session()->get('tip_ulogovan') == 'moderator')
         return redirect()->to('/Moderator/index');
         else  if (session()->get('tip_ulogovan') == 'igrac')
         return redirect()->to('/Igrac/index');
       }
     }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {

    }
}
