<?php 
class Update extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
    }

    public function view() {
        if($this->session->validated) {
            $pid = $this->input->get('pid');
            $this->load->model('Getinfo');
            $res['data'] = $this->Getinfo->viewform($pid);
            if($res['data']) {
                $this->load->view('showform',$res);
            }
            else {
                $msg = "<p>No Forms to show!</p>";
                $this->load->view('showform',$msg);
            }
        }
        else {
            redirect('Login');
        }
    }

     public function edit($pid) {
        if($this->session->validated) {
            $this->load->model('Getinfo');
            $res = $this->Getinfo->updateform($pid);
            if($res) {
                $this->session->set_flashdata('message','Form Updated Successfully');
                redirect('Show');
            }
            else {
                 $this->session->set_flashdata('message','Form NOT Updated Successfully');
                redirect('Show');
            }
        }
        else {
            redirect('Login');
        }
    }

     public function removeproduct() {
        if($this->session->validated) {
            $pid = $this->input->get('pid');
            $this->load->model('Getinfo');
            $res = $this->Getinfo->removeform($pid);
            if($res) {
                $this->session->set_flashdata('message','Form Deleted Successfully');
                redirect('Show');
            }
            else {
                 $this->session->set_flashdata('message','Form NOT Deleted Successfully');
                redirect('Show');
            }
        }
        else {
            redirect('Login');
        }
    }
}