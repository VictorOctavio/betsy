<?php namespace App\Models;
      use CodeIgniter\Model;

    class SaleHeaderModel extends Model{
        protected $table = 'sale_header';
        protected $primaryKey = 'saleheaderId';
        protected $allowedFields = ['total_venta', 'userId', 'sale_createdAt', 'received'];

        public function getLastBuys(){
            return $this->join('users', ' userId = users.id')       
                        ->where('received', 0)
                        ->orderBy('sale_createdAt', 'DESC')
                        ->limit(7)
                        ->find();
        }

        public function getUserBuys(){
            return $this->where('userId =', session()->get('id'))
                        ->orderBy('sale_createdAt', 'DESC')
                        ->findAll();
        }

        public function getUserBuyById($id){
            return $this->where('userId =', session()->get('id'))
                        ->orderBy('sale_createdAt', 'DESC')
                        ->where('saleheaderId', $id)
                        ->first();
        }

        public function getUserBuy($id){
            return $this->join('users', ' userId = users.id')       
                        ->where('saleheaderId', $id)
                        ->first();
        }

        public function changeStateReceived($id){
            return $this->where('saleheaderId', $id)
                        ->set(['received' => 1])
                        ->update();
        }
    }
?>