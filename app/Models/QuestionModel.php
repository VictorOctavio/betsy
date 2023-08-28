<?php namespace App\Models;
      use CodeIgniter\Model;

    class QuestionModel extends Model{
        protected $table = 'questions';
        protected $primaryKey = 'questionId';
        protected $allowedFields = ['favoritePet', 'favoriteColor', 'userId'];
    
        public function get_questions_user($userId) {
            return $this->where('userId =', $userId)->first();
        }

        public function updateQuestionUser($userId, $self){
            if($self->getVar('favoritePet')) $this->where('userId', $userId)->set(['favoritePet' => $self->getVar('favoritePet')])->update();
            if($self->getVar('favoriteColor')) $this->where('userId', $userId)->set(['favoriteColor' => $self->getVar('favoriteColor')])->update();
        }
      
    }

?>