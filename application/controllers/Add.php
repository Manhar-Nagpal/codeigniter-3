<?php 
class Add extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
    }

    public function index() {
        if($this->session->validated) {
        $this->load->view('form');
        }
        else {
            redirect('Login');
        }
    }

    public function addproduct() {
        $this->load->model('Process');
        $result = $this->Process->newproduct();

        if(!$result) {
            $this->session->set_flashdata("error","Form Submission failed!");
            redirect('Add');
        }
        else {
            $this->session->set_flashdata("success","Form Submission sucessful!");
            redirect('Home/index');
        }
    }
}