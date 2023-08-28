<?php namespace App\Models;
      use CodeIgniter\Model;

    class GenderModel extends Model{
        protected $table = 'genders';
        protected $primaryKey = 'genderId';
        protected $allowedFields = ['name'];
    
        public function get_genders() {
            return $this->findAll();
        }
      
    }

?>