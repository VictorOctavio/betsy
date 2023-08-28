<?php
namespace App\Controllers;
Use App\Models\UserModel;
Use App\Models\MessageModel;
Use App\Models\QuestionModel;
use CodeIgniter\Controller;


class UserController extends Controller{
    
    protected $session;

	public function __construct(){

            $this->session = \Config\Services::session();

           helper(['form', 'url']);

	}
    public function create() {
        
         $data['title']='Signup'; 
         echo view('front/pages/HeaderPage',$data);
         echo view('front/components/navbar');
         echo view('back/users/signup');
         echo view('front/components/footer');
    }

    public function signin() {
        $data['title']='Signin'; 
        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('back/users/signin');
        echo view('front/components/footer');
   }

    public function myAccount(){

        $userModel = new UserModel();
        $questionModel = new QuestionModel();


        $data['title']='account'; 
        $data['user'] = $userModel->get_user(session()->get('email'));
        $data['question'] = $questionModel->get_questions_user($data['user']['id']);

        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('back/users/accountPage', $data);
        echo view('front/components/footer');
    }

    public function restorePassword(){

        $userModel = new UserModel();
        $data['title']= ' Forgot Password '; 

        echo view('front/pages/HeaderPage', $data);
        echo view('front/components/navbar');
        echo view('back/users/restorePasswordPage');
        echo view('front/components/footer');
    }

    public function myMessages(){

        $messages = new MessageModel();

        $data['title']='messages'; 
        $data['messages'] = $messages->get_msgs(session()->get('email'));

        echo view('front/pages/HeaderPage',$data);
        echo view('front/components/navbar');
        echo view('front/pages/UserMessagesPage');
        echo view('front/components/footer');
    }
    
 
    public function formValidation() {
        
       $input = $this->validate([
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'     => 'required|min_length[8]'
       ],);

        $formModel = new UserModel();
        $questionModel = new QuestionModel();
     
        if (!$input) {
               $data['title']='Login'; 
                echo view('front/pages/HeaderPage',$data);
                echo view('front/components/navbar');
                echo view('back/users/signup', ['validation' => $this->validator]);
                echo view('front/components/footer');
        } else {
            $formModel->save([
                'email'=> $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ]);  

            $user = $formModel->where('email', $this->request->getVar('email'))
                              ->first();

            $questionModel->save([
                'userId'=> $user['id']
            ]);

            session()->setFlashdata('success', 'Bienvenido a Besty');
            return $this->response->redirect(base_url('signin'));
        }
    }


    public function signinSubmit(){
        $input = $this->validate([
            'email'    => 'required',
            'password'     => 'required'
       ],);

       if (!$input) {
         $data['title']='Login'; 
         echo view('front/pages/HeaderPage',$data);
         echo view('front/components/navbar');
         echo view('back/users/signin', ['validation' => $this->validator]);
         echo view('front/components/footer');
         return;
        } else {

            $formModel = new UserModel();

            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');

            $user = $formModel->where('email', $email)
                              ->first();

            if ($user) {
                if (password_verify($password, $user['password'])){
                   
                    if(!$user['isBloqued']){
                        // start a session 
                        $this->session->start();

                        // initialize session variables 
                        $_SESSION['logged_in'] = TRUE;
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['id'] = $user['id'];
                        $_SESSION['avatar'] = $user['avatar'];
                        $_SESSION['fullname'] = $user['firstname'].' '.$user['lastname'];
                        $_SESSION['nickname'] = $user['nickname'];
                        $_SESSION['createdAt'] = $user['createdAt'];
                        
                        // admin
                        $_SESSION['isAdmin'] =  $user['rol_id'] == 1||$user['rol_id'] == 3;

                        // moderator
                        $_SESSION['isMainAdmin'] = $user['rol_id'] == 1;

                        if(session()->get('isAdmin')){
                            return $this->response->redirect(base_url('admin'));
                        }

                        return $this->response->redirect(base_url('products'));
                    }else{
                        session()->setFlashdata('danger', "You're bloqued");
                        return $this->response->redirect(base_url('signin'));
                    }
                    
                }else{
                    session()->setFlashdata('danger', 'Email or password incorrect');
                    return $this->response->redirect(base_url('signin'));
                }
            }else{
                session()->setFlashdata('danger', 'Email or password incorrect');
                return $this->response->redirect(base_url('signin'));
            }
            
        }

    }

    public function logout(){
        $_SESSION['logged_in'] = FALSE;
        $this->session->destroy();
        return $this->response->redirect(base_url(''));
    }

    public function sendEmail(){

        $input = $this->validate([
            'title'    => 'required',
            'para'    => 'required',
            'msg' => 'required',
            'email' => 'required',
       ],);

        if (!$input) {
            session()->setFlashdata('danger', 'Datos incorrectos');
            return $this->response->redirect(base_url(''));
        } else {

            $msgModel = new MessageModel();

            $msgModel->send_msg($this->request->getVar('para'), $this->request->getVar('email'), $this->request->getVar('msg'), $this->request->getVar('title'));
      
            session()->setFlashdata('success', 'Enviado correctamente, Betsy ;)');
            return redirect()->back()->withInput();
        }
    }

    public function updateUser(){

       $input = $this->validate([
            'nickname'    => 'min_length[2]',
            'firstname'    => 'min_length[2]',
            'lastname'    => 'min_length[2]',
            'address'    => 'min_length[5]',
            'phone'    => 'min_length[6]',
       ],);


       if (!$input) {
            $userModel = new UserModel();
            $questionModel = new QuestionModel();
            $data['title']='account'; 
            $data['user'] = $userModel->get_user(session()->get('email'));
            $data['question'] = $questionModel->get_questions_user(session()->get('id'));

            echo view('front/pages/HeaderPage', $data);
            echo view('front/components/navbar');
            echo view('back/users/accountPage', $data, ['validation' => $this->validator]);
            echo view('front/components/footer');
       }else{
            $userModel = new UserModel();
            $userModel->update_user($this->request);
            session()->setFlashdata('success', 'Actualizado correctamente');
            return $this->response->redirect(base_url('/user'));
       }
    }

    public function readMessage($id){
        $messageModel = new MessageModel();
        $messageModel->read_msg($id);
        return redirect()->back()->withInput();
    }


    public function sendRestorePassword(){
        $questionModel = new QuestionModel();
        $userModel = new UserModel();
        $data['title'] = ' Forgot Password ';
        
       $input = $this->validate([
            'email'    => 'min_length[2]|required',
            'favoriteColor'    => 'min_length[2]|required',
            'favoritePet'    => 'min_length[2]|required',
            'password'    => 'min_length[8]|required',
        ],);

        if(!$input){
            session()->setFlashdata('danger', 'Data incorrecta');
            return redirect()->back()->withInput();
        }

        $userByEmail = $userModel->where('email =', $this->request->getVar('email'))->first();

        if(!$userByEmail){
            session()->setFlashdata('danger', 'Email no Registrado');
            return redirect()->back()->withInput();
        }

        $questions = $questionModel->get_questions_user($userByEmail['id']);
        
        // validate questions
        if($questions['favoritePet'] == $this->request->getVar('favoritePet') && $questions['favoriteColor'] == $this->request->getVar('favoriteColor')){
            
            $newPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
            $userModel->where('id', $userByEmail['id'])->set(['password' => $newPassword])->update();

            session()->setFlashdata('success', 'Contraseña modificada');
            return redirect()->back()->withInput();
        }else{
            session()->setFlashdata('danger', 'Datos incorrectos ;(');
            return redirect()->back()->withInput();
        }

    }


    public function updateQuestionsSeguridad(){
    
       $input = $this->validate([
            'favoriteColor'    => 'min_length[2]',
            'favoritePet'    => 'min_length[2]',
        ],);

        if(!$input){
            session()->setFlashdata('danger', 'Datos incorrectoss');
            return redirect()->back()->withInput();
        }

        $questionModel = new QuestionModel();
        $questionModel->updateQuestionUser(session()->get('id'), $this->request);
        session()->setFlashdata('success', 'Datos Actualizados');
        return redirect()->back()->withInput();

    }

}
