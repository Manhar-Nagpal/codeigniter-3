<?php 
class Process extends CI_Model {
    
    public function validate() {
        
        $user = $this->security->xss_clean($this->input->post('user'));
        $password = md5($this->security->xss_clean($this->input->post('password')));
        $this->db->select('*');
        $this->db->where('user',$user);
        $this->db->where('password',$password);
        $query = $this->db->get('userinfo');

        if($query->num_rows() > 0) {
            $res = $query->row_array();
            return $res;
        }
        else {
            return false;
        }
    }

    public function newuser() {
        
        $fname = $this->security->xss_clean($this->input->post('fname'));
        $lname = $this->security->xss_clean($this->input->post('lname'));
        $user = $this->security->xss_clean($this->input->post('user'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = md5($this->security->xss_clean($this->input->post('password')));

        $data = array(
            'fname' => $fname,
            'lname' => $lname,
            'user' => $user,
            'email' => $email,
            'password' => $password
        );

        $result = $this->db->insert('userinfo',$data);

        if(! $result) {
            return false;
        }
        else {
            return true;
        }
    }

    public function newproduct() {
        
        $pname = $this->security->xss_clean($this->input->post('pname'));
        $ptype = $this->security->xss_clean($this->input->post('ptype'));
        $price = $this->security->xss_clean($this->input->post('price'));
        $stock = $this->security->xss_clean($this->input->post('stock'));
        $brand = $this->security->xss_clean($this->input->post('brand'));
        $id = $this->session->id;

        $data = array(
            'user_id' => $id,
            'pname' => $pname,
            'ptype' => $ptype,
            'price' => $price,
            'stock' => $stock,
            'brand' => $brand,
        );

        $result = $this->db->insert('product',$data);

        if(! $result) {
            return false;
        }
        else {
            return true;
        }
    }
}