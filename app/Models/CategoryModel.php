<?php namespace App\Models;
      use CodeIgniter\Model;

    class CategoryModel extends Model{
        protected $table = 'categories';
        protected $primaryKey = 'categoryId';
        protected $allowedFields = ['name'];
    
        public function get_categories() {
            return $this->findAll();
        }
      
    }

?>