<?php 
class Show extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
    }
    
    public function index() {
        if($this->session->validated) {
            $this->load->model('Getinfo');
            $res['data'] = $this->Getinfo->getproduct();
            if($res) {
                $this->load->view('formlist',$res);
            }
            else {
                $msg = "<p>No Forms to show!</p>";
                $this->load->view('formlist',$msg);
            }
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
            redirect('Home/index');
        }
        else {
            $this->session->set_flashdata("success","Form Submission sucessful!");
            redirect('Home/index');
        }
    }
}