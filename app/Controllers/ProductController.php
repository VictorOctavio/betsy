<?php
namespace App\Controllers;
Use App\Models\ShoeModel;
Use App\Models\CommentModel;
use CodeIgniter\Controller;
use FFI\Exception;


class ProductController extends Controller{
    
    protected $session;

	public function __construct(){
        helper(['form', 'url']);
	}

    public function createProduct() {
        
       $input = $this->validate([
            'title'    => 'required|min_length[4]|max_length[100]',
            'description' => 'required|min_length[8]',
            'price' => 'required',
            'mark' => 'required',
            'sale' => 'required',
            'stock' => 'required',
            'minstock' => 'required',
            'category' => 'required',
            'sizes' => 'required',
            'gender' => 'required',
       ],);

        if (!$input || count($this->request->getFiles('images')['images']) <= 1) {
            echo view('front/pages/private/HeaderAdminPage');
            session()->setFlashdata('danger', 'Error de datos');
            echo view('front/pages/private/NewProductPage', ['validation' => $this->validator]);
        } else {

            $shoeModel = new ShoeModel();

            try{
                $shoeModel->createShoe($this->request);

                session()->setFlashdata('success', 'Shoe created successfully');
                return $this->response->redirect(base_url('admin/new-product'));

            } catch (Exception $e) {
                session()->setFlashdata('danger', 'OHH NO, Error in database');
                return $this->response->redirect(base_url('admin/new-product'));
            }
                
        }
    }

    public function saveCommentShoe($shoeId){

        $input = $this->validate([
            'message'=>'required|min_length[4]|max_length[100]',
       ],);

       if (!$input) {
            session()->setFlashdata('danger', 'Error cant caracteres');
            return redirect()->back()->withInput();
       }else{
            $commentModel = new CommentModel();
            $commentModel->save_comment($shoeId, $this->request);
            session()->setFlashdata('success', 'Comentario agregado');
            return redirect()->back()->withInput();
       }
        
    }

    public function removeCommentShoe($commentId){
        $commentModel = new CommentModel();
        $commentModel->remove_comment($commentId);
        session()->setFlashdata('success', 'Comentario removido');
        return redirect()->back()->withInput();  
    }

    
}
