<?php 
class Login extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
        $this->load->model('Process');
    }

    public function index($msg = NULL, $successmsg = NULL) {
        $data['msg'] = $msg;
        $data['successmsg'] = $successmsg;
        $this->load->view('page-login',$data);
    }

    public function signin()
	{
        $result = $this->Process->validate();	
        if(! $result) {
            $msg = "<p style = 'color:red; margin-left:10px;'>Invalid Username and/or password!</p>";
            $this->index($msg);
        }
        else {
            $data = array(
                'user' => $result['user'],
                'email' => $result['email'],
                'id' => $result['id'],
                'validated' => true
            );
            $this->session->set_userdata($data);
            redirect('Home');
        }
    }

    public function viewregister($msg = NULL) {
        $data['msg'] = $msg;
        $this->load->view('page-register',$data);
    }

    public function createuser() {
       
        $result = $this->Process->newuser();

        if(! $result) {
            $msg = "<p style = 'color:red; margin-left:10px;'>Registration failed!</p>";
            $this->viewregister($msg);
        }

        else {
            $successmsg =  "<p style = 'color:green; margin-left:10px;'>Registration Successful! Please Sign-in.</p>";
            $this->index($msg = NULL, $successmsg);
        }
    }
}