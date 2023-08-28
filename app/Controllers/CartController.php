<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\ShoeModel;
Use App\Models\SaleHeaderModel;
Use App\Models\SaleDetailModel;

class CartController extends Controller {

    public function __construct() 
    {
        helper(['form', 'url', 'cart']);
        
        $session = session();
        $cart = \Config\Services::cart();
        $cart->contents();
    }

    // pages
    public function cartList(){
        $data['title'] = ' my cart ';
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('back/cart/cartPage');
        echo view('front/components/footer');
    }

    public function myBuysList(){
        $saleHeaderModel = new SaleHeaderModel();
        $data['buys'] = $saleHeaderModel->getUserBuys();
        $data['title'] = ' my cart ';

        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('back/users/myBuyPage',  $data);
        echo view('front/components/footer');
    }

    public function downloadFactura($invoiceId){
        $saleDetailModel = new SaleDetailModel();
        $saleHeaderModel = new SaleHeaderModel();
        $data['products'] = $saleDetailModel->get_details($invoiceId);
        $data['header'] = $saleHeaderModel->getUserBuyById($invoiceId);
        echo view('front/pages/FaturaPage', $data);
    }

    // Back
    public function addShoe(){

        $cart = \Config\Services::Cart();
        $req = \Config\Services::request();
        
        // $randomNumber = rand(1, 10000);

        $cart->insert(array(
            'id' =>  $req->getPost('id'),
            'qty' => $req->getPost('qty'),
            'price' => $req->getPost('price'),
            'name' => $req->getPost('name'),
            'imgURL' => $req->getPost('imgURL'),
            'size' => $req->getPost('size')
        ));

        session()->setFlashdata('successCart', 'Agrego correctamente');

        return redirect()->back()->withInput();
    }

    public function removeCart(){
        $cart = \Config\Services::cart();
        $req = \Config\Services::request();
        $cart->destroy();
        return redirect()->back()->withInput();
    }

    public function updateCart(){
        $cart = \Config\Services::cart();
        $req = \Config\Services::request();
        
        $cart->update(array(
            'id' =>  $req->getPost('id'),
            'qty' => 2,
            'price' => $req->getPost('price'),
            'name' => $req->getPost('name'),
            'imgURL' => $req->getPost('imgURL'),
            'size' => $req->getPost('size')
        ));

        return redirect()->back()->withInput();
    }

    public function removeItemCart($id){
        $cart = \Config\Services::cart();
        $cart->remove($id);
        return redirect()->back()->withInput();
    }

    public function buyCart(){
        $cart = \Config\Services::cart();
        $shoes = $cart->contents();
        $total = 0;

        $input = $this->validate([
            'creditCard'    => 'required',
            'creditCardVencimiento' => 'required',
            'creditCardPass' => 'required',
       ],);
       
       if(!$input){
            session()->setFlashdata('danger', 'Campos incorrectos! ;(');
            return redirect()->back()->withInput();
       }

        foreach($shoes as $shoe){
            $total += $shoe['price'] * $shoe['qty'];
        }
        
        $saleHeader = new SaleHeaderModel();
        $idHeader = $saleHeader->insert(['total_venta' => $total, "userId" => session()->id]);
 
        $saleDetail = new SaleDetailModel();
        $shoeModel = new ShoeModel();


        foreach($shoes as $shoe){
            $saleDetail->insert(["saleId" => $idHeader, "shoeId" => $shoe['id'], "cantidad" => $shoe["qty"], "sale_price" => $shoe['price'], "sale_size" => $shoe['size']]);
            $shoeStock =  $shoeModel->where('id',  $shoe['id'])->first();;
            $shoeModel->where('id',  $shoe['id'])->set(['stock' => ($shoeStock['stock']-$shoe['qty'])])->update();
        }

        $cart->destroy();

        session()->setFlashdata('successBuy', 'Gracias por confiar! Equipo Betsy ;)');
        
        return redirect()->back()->withInput();

    }

    
}

?>