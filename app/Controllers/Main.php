<?php

namespace App\Controllers;
Use App\Models\ShoeModel;
Use App\Models\CommentModel;

class Main extends BaseController
{   
    
    function __construct() {
    
    }

    public function home()
    {
        $data['title'] = ' Inicio ';
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/homePage');
        echo view('front/components/footer');
    }

    public function terminosCondiciones(){
        $data['title'] = ' Terminos y Condiciones ';
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/termycond');
        echo view('front/components/footer');
    }

    public function questions(){
        $data['title'] = ' Preguntas Frecuentes ';
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/questions');
        echo view('front/components/footer');
    }

    public function product($id){

        $commentModel = new CommentModel();
        $shoeModel = new ShoeModel();
        $data['shoe'] = $shoeModel->get_shoe($id);
        if($data['shoe']) $data['title'] =  $data['shoe']['title'];
        else  $data['title'] =  'Not found Product';
        $data['comments'] = $commentModel->get_comments($id);
     
        if(!$data['shoe'] || (($data['shoe']['stock'] - $data['shoe']['minstock']) <= 0) ){
            return $this->response->redirect(base_url('/products'));
        }
        
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/product', $data);
        echo view('front/components/footer');
    }


    public function products(){
        $request = service('request');
        $shoeModel = new ShoeModel();  
        $data['title'] = ' Descubre ';
        $data['shoes'] = $shoeModel->get_shoes_query($request);

        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/productsPage', $data);
        echo view('front/components/footer');
    }

    
    public function nosotros(){     
        $data['title'] = ' Nuestra Misión ';
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('front/pages/NosotrosPage');
        echo view('front/components/footer');
    }
}

?>

