<?php namespace App\Models;
      use CodeIgniter\Model;

    class CommentModel extends Model{
        protected $table = 'comments';
        protected $primaryKey = 'commentId';
        protected $allowedFields = ['userId', 'shoeId', 'message', 'title', 'stars', 'commentCreatedAt'];
    
        public function get_comments($shoeId) {
            return $this->where('shoeId =', $shoeId)
                        ->join('users', ' userId = users.id')
                        ->orderBy('commentcreatedAt', 'desc')
                        ->findAll();
        }

        public function save_comment($shoeId, $self){
            return $this->save([
               'message'=>  $self->getVar('message'),
               'shoeId' => $shoeId,
               'userId' => session()->get('id')
            ]);
        }

        public function remove_comment($commentId){
            return $this->delete($commentId);
        }
      
    }

?>