<?php namespace App\Models;
      use CodeIgniter\Model;

    class ShoeModel extends Model{
        protected $table = 'shoes';
        protected $primaryKey = 'id';
        protected $allowedFields = ['title', 'description', 'price', 'sale', 'gender', 'isEnabled', 'imagesURL', 'createdAt', 'mark', 'stock', 'minstock', 'category', 'sizes'];

        public function createShoe($self){

            $images = $self->getFiles('images');
            $imagesURL = array();

            foreach ($images['images'] as $image){
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/uploads', $newName);
                    array_push($imagesURL, $image->getName());
                }
            }
        
            $this->save([
                'title'=> $self->getVar('title'),
                'description' => $self->getVar('description'),
                'price' => $self->getVar('price'),
                'mark' => $self->getVar('mark'),
                'category' => $self->getVar('category'),
                'minstock' => $self->getVar('minstock'),
                'stock' => $self->getVar('stock'),
                'sale' => $self->getVar('sale'),
                'sizes' => $self->getVar('sizes'),
                'gender' => $self->getVar('gender'),
                'imagesURL' => implode(',', $imagesURL)
            ]);  


        }


        public function get_shoes(){
            return $this->where('isEnabled', 1)->orderBy('createdAt', 'DESC')->findAll();
        }

        public function get_shoes_admin(){
            return $this->join('categories', 'category = categories.categoryId')
                        ->orderBy('createdAt', 'DESC')->findAll();
        }

        public function get_shoe($id){
            return $this->join('categories', 'category = categories.categoryId')
                        ->where('id', $id)->first();
        }

        public function update_shoe($id, $self){
            if($self->getVar('title')) $this->where('id', $id)->set(['title' => $self->getVar('title')])->update();
            if($self->getVar('description')) $this->where('id', $id)->set(['description' => $self->getVar('description')])->update();
            if($self->getVar('category')) $this->where('id', $id)->set(['category' => $self->getVar('category')])->update();
            if($self->getVar('price')) $this->where('id', $id)->set(['price' => $self->getVar('price')])->update();
            if($self->getVar('sale')) $this->where('id', $id)->set(['sale' => $self->getVar('sale')])->update();
            if($self->getVar('mark')) $this->where('id', $id)->set(['mark' => $self->getVar('mark')])->update();
            if($self->getVar('stock')) $this->where('id', $id)->set(['stock' => $self->getVar('stock')])->update();
            if($self->getVar('minstock')) $this->where('id', $id)->set(['minstock' => $self->getVar('minstock')])->update();
            if($self->getVar('sizes')) $this->where('id', $id)->set(['sizes' => $self->getVar('sizes')])->update();
            if($self->getVar('gender')) $this->where('id', $id)->set(['gender' => strval($self->getVar('gender'))])->update();


            if($self->getFiles('images')){
                
                $images = $self->getFiles('images');
                $imagesURL = array();

                foreach ($images['images'] as $image){
                    if ($image->isValid() && !$image->hasMoved()) {
                        $newName = $image->getRandomName();
                        $image->move(ROOTPATH . 'public/uploads', $newName);
                        array_push($imagesURL, $image->getName());
                    }
                }
            
                if(count($imagesURL) > 0) $this->where('id', $id)->set(['imagesURL' => implode(',', $imagesURL)])->update();
            }
        }


        public function remove_shoe($id){
            $this->delete($id);
        }

        public function isEnabled_shoe($id){
            $shoe =  $this->where('id', $id)->first();
            $this->where('id', $id)->set(['isEnabled' => !$shoe['isEnabled']])->update();
        }

        // Admin consultar
        public function get_shoes_por_agotarse(){
            return $this->where('stock <=', ($this->minstock + 5))
                        ->findAll();
        }

        // Filters
        public function get_shoes_sales(){
            return $this->where('isEnabled', 1)
                        ->where('sale >', 0)
                        ->orderBy('createdAt', 'DESC')
                        ->findAll();
        }

        public function get_shoes_priceDesc(){
            return $this->where('isEnabled', 1)
                        ->orderBy('price', 'DESC')
                        ->findAll();
        }

        public function get_shoes_priceAsc(){
            return $this->where('isEnabled', 1)
                        ->orderBy('price', 'ASC')
                        ->findAll();
        }

        public function getShoesByCategory($category){
            $data = $this->join('categories', 'category = categories.categoryId');
            return $data->where('name =', $category)
                        ->where('isEnabled', 1)
                        ->orderBy('createdAt', 'DESC')
                        ->findAll();
        }

        public function getShoesByMark($mark){
            return $this->where('mark =', $mark)
                        ->where('isEnabled', 1)
                        ->orderBy('createdAt', 'DESC')
                        ->findAll();
        }

        public function getShoesByGender($gender){
            $data = $this->join('genders', 'gender = genders.genderId');
            return $data->where('name =', $gender)
                        ->where('isEnabled', 1)
                        ->orderBy('createdAt', 'DESC')
                        ->findAll();
        }


        public function get_shoes_query($req){

            // Querys
            $category = $req->getGet('category') OR null;
            $gender = $req->getGet('gender') OR null;
            $brand = $req->getGet('brand') OR null;
            $orderByPrice = $req->getGet('orderByPrice') OR null;
            $sale = $req->getGet('sale') OR null;
            $minPrice = $req->getGet('minPrice');
            $maxPrice = $req->getGet('maxPrice');
            $page = $req->getGet('page');

            $data = $this->where('isEnabled', 1);

            if($category) $data->where('category', $category);
            if($gender) $data->where('gender', $gender);
            if($brand) $data->where('mark', $brand);
            if($orderByPrice) $data->orderBy('price', $orderByPrice);
            if($sale) $data->where('sale >', 0);
            
            if($minPrice && $maxPrice){
                $data->where('price >=', $minPrice);
                $data->where('price <=', $maxPrice);
            }

            return $data->orderBy('createdAt', 'DESC')->find();
        }

    }
?>