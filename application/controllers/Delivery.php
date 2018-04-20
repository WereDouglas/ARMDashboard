<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {

    function __construct() {

        parent::__construct();
        //error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {
        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('Login', 'refresh');
        }
        $query = $this->Md->query("SELECT *,users.name AS user,users.image AS userImage,customer.name as customer,customer.image AS customerImage FROM delivery LEFT JOIN users ON delivery.UserID  = users.Id LEFT JOIN customer ON delivery.CustomerID = customer.ID");
        if ($query) {
            $data['d'] = $query;
        } else {
            $data['d'] = array();
        }
         $query = $this->Md->query("SELECT *,item.name as product FROM deliveries LEFT JOIN item ON deliveries.ItemID  = item.Id");

        if ($query) {
            $data['c'] = $query;
        } else {
            $data['c'] = array();
        }
        $this->load->view('view-delivery', $data);
    }

    public function add() {

        $this->load->view('add-customer');
    }

    public function create() {

        $this->load->helper(array('form', 'url'));
        //user information
        $id = $this->GUID();
        $name = $this->input->post('name');

        $query = $this->Md->query("SELECT * FROM customer WHERE name='" . $this->input->post('name') . "'");
        if (count($query)) {

            $status .= '<div class="alert alert-success">  <strong>Client is already registered</strong></div>';
            $this->session->set_flashdata('msg', $status);
            redirect('customer', 'refresh');
            // echo 'failed here';
            return;
        }
        $file_element_name = 'userfile';
        $config['file_name'] = $this->input->post('name');
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'errors';
            $msg = $this->upload->display_errors('', '');
            $status .= '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>';
        }
        $data = $this->upload->data();

        $userfile = $data['file_name'];
        $path = 'uploads/' . $userfile;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = base64_encode($data);
        if (strlen($base64) < 10) {
            $base64 = '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';
        } else {

            $base64 = base64_encode($data);
        }
        $b = array('id' => $id, 'name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'contact' => $this->input->post('contact'), 'userID' => $this->input->post('userID'), 'status' => $this->input->post('status'), 'image' => $base64, 'address' => $this->input->post('address'), 'no' => $this->input->post('no'), 'created' => date('d-m-Y H:i:s'), 'orgID' => $this->session->userdata('orgID'), 'nationality' => $this->input->post('nationality'), 'type' => $this->input->post('type'));
        $this->Md->save($b, 'customer');
        $status .= '<div class="alert alert-success">  <strong>Information submitted</strong></div>';
        $this->session->set_flashdata('msg', $status);
        redirect('customer', 'refresh');
    }

    public function lists() {
        $query = $this->Md->query("SELECT * FROM customer ");
        //$query = $this->Md->query("SELECT * FROM customer");
        echo json_encode($query);
    }

    public function exists() {
        $this->load->helper(array('form', 'url'));
        $user = trim($this->input->post('user'));
        //returns($value,$field,$table)
        $get_result = $this->Md->returns($user, 'name', 'users');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result)
            echo '<span style="color:#f00"> This customer <strong style="color:#555555" >' . $user . '</strong> does not exist in our database.' . '<a href= "' . $user . '" value="' . $user . '" id="myLink" style="background #555555;color:#0749BA;" onclick="NavigateToSite()">Click here to add </a></span>';
        else
            echo '' . $get_result->contact . '<br>';
        echo '' . $get_result->email . '<br>';
        echo '' . $get_result->address . '<br>';
        echo'<span class="span-data" name="userid" id="userid" style="visibility:hidden" >' . $get_result->name . '</span>';
    }

    public function update_image() {

        $this->load->helper(array('form', 'url'));
        //user information

        $userID = $this->input->post('customerID');
        $namer = $this->input->post('namer');
        $file_element_name = 'userfile';
        // $new_name = $userID;
        $config['file_name'] = $userID;
        $config['upload_path'] = 'uploads/';
        $config['encrypt_name'] = FALSE;
        $config['allowed_types'] = '*';
        $config['overwrite'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($file_element_name)) {
            $status = 'error';
            $msg = $this->upload->display_errors('', '');
            $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>');
            redirect('/customer/profile/' . $namer, 'refresh');

            return;
        }

        $data = $this->upload->data();
        $userfile = $data['file_name'];
        $path = 'uploads/' . $userfile;
        $data = file_get_contents($path);
        $base64 = base64_encode($data);
        if (strlen($base64) < 10) {
            $base64 = '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';
        } else {

            $base64 = base64_encode($data);
        }
        $user = array('image' => $base64, 'created' => date('Y-m-d H:i:s'));
        $this->Md->update_dynamic($userID, 'id', 'customer', $user);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Image updated saved</strong></div>');

        redirect('/customer/profile/' . $namer, 'refresh');
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $id = $this->uri->segment(3);
        $query = $this->Md->cascade($id, 'customer', 'id');
        $this->session->set_flashdata('msg', '<div class="alert alert-error">  <strong>  Customer deleted ' . '	</strong></div>');
        redirect('customer', 'refresh');
    }

    public function update() {
        $this->load->helper(array('form', 'url'));
        if (!empty($_POST)) {
            foreach ($_POST as $field_name => $val) {
                //clean post values
                $field_id = strip_tags(trim($field_name));
                $val = strip_tags(trim($val));
                //from the fieldname:user_id we need to get user_id
                $split_data = explode(':', $field_id);
                $id = $split_data[1];
                $field_name = $split_data[0];
                if (!empty($id) && !empty($field_name) && !empty($val)) {
                    //update the values
                    $task = array($field_name => $val, 'created' => date('d-m-Y H:i:s'),'sync'=>'false');
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($id, 'id', 'customer', $task);
                    echo "updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

}
