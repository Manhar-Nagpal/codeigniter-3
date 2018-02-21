<?php 
class Getinfo extends CI_Model {

    public function getproduct() {

        $id = $this->session->id;
        $this->db->select('*');
        $this->db->where('user_id', $id);
        $query = $this->db->get('product');
        if($query->num_rows()>0) {
            $res = $query->result_array();
            return $res;
        }
        else {
            return false;
        }
    }

    public function viewform($pid) {
     $this->db->select('*');
     $this->db->where('id', $pid);
     $query = $this->db->get('product');


     if($query->num_rows()>0) {
        $res = $query->result_array();
        return $res;
    }
    else {
        return false;
    }
}

public function updateform($pid) {


    $pname = $this->security->xss_clean($this->input->post('pname'));
    $ptype = $this->security->xss_clean($this->input->post('ptype'));
    $price = $this->security->xss_clean($this->input->post('price'));
    $stock = $this->security->xss_clean($this->input->post('stock'));
    $brand = $this->security->xss_clean($this->input->post('brand'));

    $this->db->select('*');
    $this->db->where('id', $pid);

    $data = array(
        'pname' => $pname,
        'ptype' => $ptype,
        'price' => $price,
        'stock' => $stock,
        'brand' => $brand
    );

    $query=$this->db->update('product',$data);

    if($query) {
        return true;
    }
    else {
        return false;
    }
}

public function removeform($pid) {

    $this->db->where('id', $pid);

    $query=$this->db->delete('product');

    if($query) {
        return true;
    }
    else {
        return false;
    }
}

}