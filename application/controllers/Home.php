<?php 
class Home extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
    }

    public function index($msg = NULL, $successmsg = NULL) {
        $data['msg'] = $msg;
        $data['successmsg'] = $successmsg;
        if($this->session->validated) {
        $this->load->view('home',$data);
        }
        else {
            redirect('Login');
        }
    }
}