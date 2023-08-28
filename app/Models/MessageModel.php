<?php namespace App\Models;
      use CodeIgniter\Model;

    class MessageModel extends Model{
        protected $table = 'messages';
        protected $primaryKey = 'id';
        protected $allowedFields = ['para', 'email', 'title', 'msg', 'createdAt', 'visto'];
    
        public function get_msgs($to) {
            return $this->where('para', $to)
                        ->orderBy('createdAt', 'DESC')
                        ->findAll();
        }
        
        public function send_msg($to, $email, $msg, $title) {
            return $this->save([
                'email'=>  $email,
                'title' => $title,
                'para' => $to,
                'msg' => $msg,
            ]);
        }

        public function read_msg($id){
            return $this->where('id', $id)->set('visto', 1)->update();
        }
    }

?>