<?php namespace App\Models;
      use CodeIgniter\Model;

    class SaleDetailModel extends Model{

        protected $table = 'sale_detail';
        protected $primaryKey = 'id';
        protected $allowedFields = ['sale_size', 'cantidad', 'sale_price', 'shoeId', 'saleId'];

       public function get_details($idBuy){
            return $this->where('saleId =', $idBuy)
                        ->join('shoes', 'shoeId = shoes.id')
                        ->findAll();
       }

       public function getUserBuys(){
        return $this->join('users', ' userId = users.id')
                    ->where('userId =', session()->get('id'))
                    ->orderBy('sale_createdAt', 'DESC')
                    ->findAll();
    }
    }


?>