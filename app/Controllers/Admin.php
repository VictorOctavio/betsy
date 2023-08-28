<?php

namespace App\Controllers;
Use App\Models\MessageModel;
Use App\Models\UserModel;
Use App\Models\ShoeModel;
Use App\Models\SaleDetailModel;
Use App\Models\SaleHeaderModel;
Use App\Models\CategoryModel;
Use App\Models\GenderModel;
use CodeIgniter\Controller;

class Admin extends Controller
{   
   
    // ADMIN PAGES
    public function dashboardAdmin(){

        $userModel = new UserModel();
        $shoeModel = new ShoeModel();
        $saleHeader = new SaleHeaderModel();
        $saleDetailModel = new saleDetailModel();

        $data['lastMonthSales'] = $saleDetailModel->select('SUM(cantidad) AS total')
                                                  ->find();

        $data['agotarse'] = $shoeModel->get_shoes_por_agotarse();
        $data['lastBuys'] = $saleHeader->getLastBuys();

        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/DashboardPage', $data);
    }

    public function productsAdmin(){

        $shoeModel = new ShoeModel();
        $data['shoes'] = $shoeModel->get_shoes_admin();

        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/ProductsPage', $data);
    }

    public function newProductAdmin(){
        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/NewProductPage');
    }

    public function messagesAdmin(){
        $messages = new MessageModel();
        $data['messages'] = $messages->get_msgs(session()->get('email'));
        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/MessagesPage', $data);
    }

    public function usersAdmin(){
        $users = new UserModel();
        $data['users'] = $users->get_users();
        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/UsersPage', $data);
    }

    
    public function listBuyUserAdmin($invoiceId){

        $saleHeaderModel = new SaleHeaderModel();
        $saleDetailModel = new SaleDetailModel();
        $data['header'] = $saleHeaderModel->getUserBuy($invoiceId);
        $data['products'] = $saleDetailModel->get_details($invoiceId);

        if(!$data['header']  OR !$data['products']){
            session()->setFlashdata('danger', 'Incorrect id');
            return $this->response->redirect(base_url('admin'));
        }

        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/BuyListUser', $data);
    }

    public function editProductAdmin($id){

        $shoeModel = new ShoeModel();
        $categoryModel = new CategoryModel();
        $genderModel = new GenderModel();
        $data['shoe'] = $shoeModel->get_shoe($id);
        $data['categories'] = $categoryModel->get_categories();
        $data['genders'] = $genderModel->get_genders();

        if($data['shoe']){
            echo view('front/pages/private/HeaderAdminPage');
            echo view('front/pages/private/EditProductPage', $data);
        }else{
            session()->setFlashdata('danger', 'Incorrect id');
            return $this->response->redirect(base_url('admin/products'));
        }
    }

    public function sendEditProductAdmin($id){

       $input = $this->validate([
            'title'    => 'min_length[5]',
            'description'    => 'min_length[2]',
            'price'    => 'min_length[2]',
            'mark'    => 'min_length[3]',
       ],);

       $shoeModel = new ShoeModel();

       if(!$input){
        $data['shoes'] = $shoeModel->get_shoes();
        echo view('front/pages/private/HeaderAdminPage');
        echo view('front/pages/private/ProductsPage', $data, ['validation' => $this->validator]);
       }else{
            $shoeModel->update_shoe($id, $this->request);
            session()->setFlashdata('success', 'Edición exitosa!');
            return $this->response->redirect(base_url('admin/products'));
       }
    }


    public function sendRemoveProductAdmin($id){
       $shoeModel = new ShoeModel();
       $shoeModel->remove_shoe($id);
       session()->setFlashdata('success', 'Eliminación exitosa! ');
       return $this->response->redirect(base_url('admin/products'));
    }
    
    public function isEnableProductAdmin($id){
        $shoeModel = new ShoeModel();
        $shoeModel->isEnabled_shoe($id);
        session()->setFlashdata('success', 'Edición exitosa! ');
        return $this->response->redirect(base_url('admin/products'));
    }

    public function changeUserStateBlock($id){
        $userModel = new UserModel();
        $userModel->changeStateBlock($id);
        return $this->response->redirect(base_url('admin/users'));
    }

    public function changeUserStateRol($id){
        $userModel = new UserModel();
        $userModel->changeStateRol($id);
        return $this->response->redirect(base_url('admin/users'));
    }


    public function changeStateReceived($id){
        $saleHeaderModel = new SaleHeaderModel();
        $saleHeaderModel->changeStateReceived($id);
        session()->setFlashdata('success', 'Exitoso Cambio!');
        return redirect()->back()->withInput();
    }
}

?>

