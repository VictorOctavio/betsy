<?php namespace App\Models;
      use CodeIgniter\Model;

    class UserModel extends Model {
        protected $table = 'users';
        protected $primaryKey = 'id';
        protected $allowedFields = ['firstname', 'createdAt', 'lastname', 'email', 'avatar', 'password', 'phone', 'nickname', 'address', 'rol_id', 'isBloqued'];


        public function get_users() {
            if(session()->get('inMainAdmin')){
                return $this->where('email !=', session()->get('email'))->findAll();
            }else{
                return $this->where('email !=', session()->get('email'))
                            ->where('rol_id !=', 1)
                            ->findAll();
            }
        }

        public function get_user($email) {
            return $this->where('email', $email)->first();
        }

        public function update_user($self) {
            if($self->getVar('firstname')) $this->where('email', session()->get('email'))->set(['firstname' => $self->getVar('firstname')])->update();
            if($self->getVar('lastname')) $this->where('email', session()->get('email'))->set(['lastname' => $self->getVar('lastname')])->update();
            if($self->getVar('email')) $this->where('email', session()->get('email'))->set(['email' => $self->getVar('email')])->update();
            if($self->getVar('phone')) $this->where('email', session()->get('email'))->set(['phone' => $self->getVar('phone')])->update();
            if($self->getVar('address')) $this->where('email', session()->get('email'))->set(['address' => $self->getVar('address')])->update();
            if($self->getVar('nickname')) $this->where('email', session()->get('email'))->set(['nickname' => $self->getVar('nickname')])->update();
            
            // update avatar
            if($self->getFile('avatar')) {
                $image = $self->getFile('avatar');
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(ROOTPATH . 'public/uploads', $newName);
                    $this->where('email', session()->get('email'))->set(['avatar' => $image->getName()])->update();
                }   
            }
        }

        public function changeStateBlock($id){
            $user = $this->where('id', $id)->first();
            $this->where('id', $id)->set(['isBloqued' => !$user['isBloqued']])->update();
        }

        public function changeStateRol($id){
            $user = $this->where('id', $id)->first();
            $rol = $user['rol_id'] == 3 ? 2 : 3;
            $this->where('id', $id)->set(['rol_id' => $rol])->update();
        }
    }

?>