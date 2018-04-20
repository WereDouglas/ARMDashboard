<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {

        parent::__construct();
        // error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {


        $this->load->view('sign-in');
    }

    public function sign() {

        $this->load->helper(array('form', 'url'));
        $contact = $this->input->post('contact');
        $password = md5($this->input->post('password'));
        // echo md5($password) ;
        $user = $this->Md->query("SELECT * FROM users WHERE  contact = '" . $contact . "' AND password='" . $password . "' LIMIT 1");
        // var_dump($user);
        if (count($user) > 0) {

            foreach ($user as $v) {

                $logo = $this->Md->query_cell("SELECT * FROM  company", 'Image');
                $company = $this->Md->query_cell("SELECT * FROM  company", 'Name');
                $newdata = array(
                    'userID' => $v->Id,
                    'username' => $v->Name,
                    'email' => $v->Email,
                    'image' => $v->Image,
                    'contact' => $v->Contact,
                    'category' => $v->Category,
                    'logo' => $logo,
                    'company' => $company,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
            }

            redirect('home/', 'refresh');
        } else {
            //echo"no user";
            $this->session->set_flashdata('msg', '<span href="<?php echo base_url(); ?>index.php/login/registration" class="btn btn-error"> ! User does not exist</span>');
            redirect('login/', 'refresh');
        }
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

    public function add() {

        $this->load->view('add-user');
    }

    public function create() {

        $this->load->helper(array('form', 'url'));

        //user information
        $userid = $this->GUID();


        if ($this->input->post('surname') != "") {
            $result = $this->Md->check($this->input->post('email'), 'email', 'users');

            if (!$result) {
                $this->session->set_flashdata('msg', '<div class="alert alert-error">                                                   
                                                <strong>
                                                 email already in use please try again	</strong>									
						</div>');
                redirect('/user', 'refresh');
            }
            ///organisation image uploads
            $file_element_name = 'userfile';
            $new_name = $userid;
            $config['file_name'] = $userid;
            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name'] = FALSE;
            $config['allowed_types'] = 'jpg';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload($file_element_name)) {
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
                $this->session->set_flashdata('msg', '<div class="alert alert-error"> <strong>' . $msg . '</strong></div>');
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


            $users = array('id' => $userid, 'idNO' => $this->input->post('no'), 'contact' => $this->input->post('contact'), 'contact2' => $this->input->post('contact2'), 'surname' => $this->input->post('surname'), 'lastname' => $this->input->post('lastname'), 'email' => $this->input->post('email'), 'nationality' => $this->input->post('nationality'), 'address' => $this->input->post('address'), 'kin' => '', 'kincontact' => '', 'passwords' => md5($this->input->post('passwords')), 'roles' => $this->input->post('role'), 'gender' => $this->input->post('gender'), 'image' => $base64, 'initialPassword' => $this->input->post('password'), 'account' => '', 'status' => $this->input->post('status'), 'practice' => '', 'specialisation' => '', 'sub' => '', 'created' => date('d-m-Y H:i:s'), 'department' => $this->input->post('department'), 'orgID' => $this->session->userdata('orgID'));
            $this->Md->save($users, 'users');
            $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Information saved</strong></div>');

            redirect('/user', 'refresh');
        }
    }

    public function api() {
        $orgid = urldecode($this->uri->segment(3));
        $result = $this->Md->query("SELECT * FROM users WHERE org ='" . $orgid . "'");

        $all = array();

        foreach ($result as $res) {
            $resv = new stdClass();
            $resv->id = $res->id;
            $resv->name = $res->name;
            $resv->org = $res->org;
            $resv->address = $res->address;
            $resv->image = $res->image;
            $resv->contact = $res->contact;
            $resv->password = $this->encrypt->decode($res->password, $res->email);
            $resv->types = $res->types;
            $resv->level = $res->level;
            $resv->created = $res->created;
            $resv->status = $res->status;
            $resv->email = $res->email;

            array_push($all, $resv);
        }
        echo json_encode($all);
    }

    public function update_image() {

        $this->load->helper(array('form', 'url'));
        //user information

        $userID = $this->input->post('userID');
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
            redirect('/client/profile/' . $namer, 'refresh');

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
        $this->Md->update_dynamic($userID, 'id', 'users', $user);

        $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>Image updated saved</strong></div>');

        redirect('/user/profile/' . $namer, 'refresh');
    }

    public function client() {
        if ($this->session->userdata('username') == "") {
            $this->session->sess_destroy();
            redirect('welcome', 'refresh');
        }

        $query = $this->Md->query("SELECT * FROM users where types = 'client' AND org='" . $this->session->userdata('orgid') . "'");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }


        $this->load->view('client-page', $data);
    }

    public function update_password() {

        $this->load->helper(array('form', 'url'));
        //user information
        $this->load->library('email');

        $password = $this->input->post('password');
        //$password = '123456';
        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('userID');
        $email = $this->Md->query_cell("SELECT email FROM users WHERE id ='" . $id . "'", 'email');
        $name = $this->Md->query_cell("SELECT surname FROM users WHERE id='" . $id . "'", 'surname');
        $contact = $this->Md->query_cell("SELECT contact FROM users WHERE id='" . $id . "'", 'contact');

        $new_password = md5($password);

        $info = array('passwords' => $new_password, 'created' => date('d-m-Y H:i:s'));
        $this->Md->update_dynamic($id, 'id', 'users', $info);

        $body = $name . '  ' . ' Your password has been reset to ' . $password . " Please click the link below to access your Case Professional account: caseprofessional.pro";


        $subject = "Password reset ";
        $this->emails($email, $body, $subject);

        //  return;
        $this->sms($contact, $body);

        echo 'INFORMATION UPDATED';
        $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>USER PASSWORD CHANGED</strong></div>');

        redirect('/user/profile/' . $name, 'refresh');
    }

    public function emails($address, $message, $subject) {
//"{From: 'info@caseprofessional.pro', To: 'douglas@caseprofessional.pro', Subject: 'Hello from Postmark', HtmlBody: '<strong>Hello</strong> dear Postmark user.'}"
        $this->load->helper(array('form', 'url'));

        $this->load->library('postmark');
// option, you can set these in config/postmark.php
        $this->postmark->from('info@caseprofessional.pro', 'Case professional');

        $this->postmark->to($address, ' ');

        // $this->postmark->cc('cc@example.com', 'Cc Name');
        // $this->postmark->bcc('bcc@example.com', 'BCC Name');
        // $this->postmark->reply_to('us@us.com', 'Reply To');
// optional
        $this->postmark->tag('Password');

        $this->postmark->subject($subject);
        $this->postmark->message_plain($message);
        // $this->postmark->message_html('<html><strong>Testing...</strong></html>');
// add attachments (optional)
//$this->postmark->attach(PATH TO FILE);
//$this->postmark->attach(PATH TO OTHER FILE);
// add headers (optional)
        //  $this->postmark->header('Name', 'Value');
// send the email
        $this->postmark->send();
    }

    public function sms($contact, $message) {

        $name = $this->input->post('name');
        // $name = "Douglas";
        // $contact =  "+256782481746";
        // $message =  "TESTING";

        $this->load->library('AfricasTalkingGateway');
        //require_once('AfricasTalkingGateway.php');
// Specify your login credentials
        $username = "vugaco";
        $apikey = "253cc9e804715064b8ad0323d36e945e0513fa0bec58d0bb753efd02a2272f94";

// NOTE: If connecting to the sandbox, please use your sandbox login credentials
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+256 for Uganda in this case)
        $recipients = $contact;

// And of course we want our recipients to know what we really do
        $message = $name . ' :' . $message;

// Create a new instance of our awesome gateway class
        $gateway = new AfricasTalkingGateway($username, $apikey);

// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
        /*         * ***********************************************************************************
         * ***SANDBOX****
          $gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
         * ************************************************************************************ */

// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block

        try {
            // Thats it, hit send and we'll take care of the rest. 
            $results = $gateway->sendMessage($recipients, $message);

            foreach ($results as $result) {
                // status is either "Success" or "error message"
                echo " Number: " . $result->number;
                echo " Status: " . $result->status;
                echo " MessageId: " . $result->messageId;
                echo " Cost: " . $result->cost . "\n";
            }
            //  redirect('/web', 'refresh');
        } catch (AfricasTalkingGatewayException $e) {
            echo "Encountered an error while sending: " . $e->getMessage();
            // redirect('/user', 'refresh');
        }
    }

    public function exists() {
        $this->load->helper(array('form', 'url'));
        $user = trim($this->input->post('user'));
        //returns($value,$field,$table)
        $get_result = $this->Md->returns($user, 'name', 'users');
        //href= "index.php/patient/add_chronic/'.$chronic.'"
        if (!$get_result)
            echo '<span style="color:#f00"> This client <strong style="color:#555555" >' . $user . '</strong> does not exist in our database.' . '<a href= "' . $user . '" value="' . $user . '" id="myLink" style="background #555555;color:#0749BA;" onclick="NavigateToSite()">Click here to add </a></span>';
        else
            echo '' . $get_result->contact . '<br>';
        echo '' . $get_result->email . '<br>';
        echo '' . $get_result->address . '<br>';
        echo'<span class="span-data" name="userid" id="userid" style="visibility:hidden" >' . $get_result->name . '</span>';
    }

    public function clients() {

        $this->load->helper(array('form', 'url'));


        $query = $this->Md->query("SELECT * FROM users where  orgID='" . $this->session->userdata('orgID') . "' AND category='Client'");
        if ($query) {
            $data['users'] = $query;
        }
        $this->load->view('view-client', $data);
    }

    public function staff() {

        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM users where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['users'] = $query;
        }
        $query = $this->Md->query("SELECT * FROM roles where  orgID='" . $this->session->userdata('orgID') . "'");
        if ($query) {
            $data['roles'] = $query;
        }
        $this->load->view('view-staff', $data);
    }

    public function charges() {

        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM users where  orgID='" . $this->session->userdata('orgID') . "' AND category='Staff'");
        if ($query) {
            $data['users'] = $query;
        }
        $this->load->view('view-charges', $data);
    }

    public function users() {
        $query = $this->Md->query("SELECT * FROM users where types <>'client' AND orgID='" . $this->session->userdata('orgID') . "'");
        //  var_dump($query);
        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->view('user-page', $data);
    }

    public function profile() {

        $this->load->helper(array('form', 'url'));
        $name = urldecode($this->uri->segment(3));

        $query = $this->Md->query("SELECT * FROM events where orgID = '" . $this->session->userdata('orgID') . "'AND id='" . $this->session->userdata('userID') . "' ");

        if ($query) {
            $data['events'] = $query;
        } else {
            $data['events'] = array();
        }
        $query = $this->Md->query("SELECT * FROM users where ID ='" . $this->session->userdata('userID') . "' AND orgID='" . $this->session->userdata('orgID') . "'");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $this->load->helper(array('form', 'url'));
        $query = $this->Md->query("SELECT * FROM files where orgID = '" . $this->session->userdata('orgID') . "' AND id='" . $this->session->userdata('userID') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }

        $query = $this->Md->query("SELECT * FROM document where orgID = '" . $this->session->userdata('orgID') . "' AND userID = '" . $this->session->userdata('userID') . "' ");

        if ($query) {
            $data['docs'] = $query;
        } else {
            $data['docs'] = array();
        }
        $query = $this->Md->query("SELECT * FROM client where  orgID='" . $this->session->userdata('orgID') . "' AND userID = '" . $this->session->userdata('userID') . "'");
        if ($query) {
            $data['clients'] = $query;
        }
        $this->load->view('user-profile', $data);
    }

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function email($address, $message, $subject) {
//"{From: 'info@caseprofessional.pro', To: 'douglas@caseprofessional.pro', Subject: 'Hello from Postmark', HtmlBody: '<strong>Hello</strong> dear Postmark user.'}"
        $this->load->helper(array('form', 'url'));

        $this->load->library('postmark');
// option, you can set these in config/postmark.php
        $this->postmark->from('info@caseprofessional.pro', 'Case professional');

        $this->postmark->to($address, ' ');

        // $this->postmark->cc('cc@example.com', 'Cc Name');
        // $this->postmark->bcc('bcc@example.com', 'BCC Name');
        // $this->postmark->reply_to('us@us.com', 'Reply To');
// optional
        $this->postmark->tag('Reminder');

        $this->postmark->subject($subject);
        $this->postmark->message_plain($message);
        // $this->postmark->message_html('<html><strong>Testing...</strong></html>');
// add attachments (optional)
//$this->postmark->attach(PATH TO FILE);
//$this->postmark->attach(PATH TO OTHER FILE);
// add headers (optional)
        //  $this->postmark->header('Name', 'Value');
// send the email
        $this->postmark->send();
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $userID = $this->uri->segment(3);
        $query = $this->Md->cascade($userID, 'users', 'id');
        redirect('user', 'refresh');
    }

    public function user() {
        $this->load->helper(array('form', 'url'));
        $userid = $this->uri->segment(3);
        $query = $this->Md->query("SELECT * FROM users where id = '" . $userid . "'");
        if ($query) {
            foreach ($query as $res) {
                $data['name'] = $res->name;
                $data['address'] = $res->address;
                $data['image'] = $res->image;
                $data['contact'] = $res->contact;
                $data['created'] = $res->created;
                $data['email'] = $res->email;
            }
        }
        $query = $this->Md->query("SELECT * FROM item where org = '" . $this->session->userdata('orgid') . "' ");
        //  var_dump($query);
        if ($query) {
            $data['items'] = $query;
        } else {
            $data['items'] = array();
        }

        $query = $this->Md->query("SELECT * FROM transactions where org = '" . $this->session->userdata('orgid') . "' AND client = '" . $userid . "' ");
        //  var_dump($query);
        if ($query) {
            $data['trans'] = $query;
        } else {
            $data['trans'] = array();
        }
        //  echo 'we are coming from the controller';
        $query = $this->Md->query("SELECT * FROM payments where org = '" . $this->session->userdata('orgid') . "'");
        //  var_dump($query);
        if ($query) {
            $data['pay'] = $query;
        } else {
            $data['pay'] = array();
        }
        $query = $this->Md->query("SELECT * FROM schedule where org = '" . $this->session->userdata('orgid') . "' AND file= '" . $fileid . "' ");
        //  var_dump($query);
        if ($query) {
            $data['sch'] = $query;
        } else {
            $data['sch'] = array();
        }
        $query = $this->Md->query("SELECT * FROM attend where org = '" . $this->session->userdata('orgid') . "'");
        //  var_dump($query);
        if ($query) {
            $data['att'] = $query;
        } else {
            $data['att'] = array();
        }
        $data['fileid'] = $fileid;

        $this->load->view('client-page', $data);
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
                $user_id = $split_data[1];
                $field_name = $split_data[0];
                if (!empty($user_id) && !empty($field_name) && !empty($val)) {
                    //update the values
                    $task = array($field_name => $val, 'created' => date('d-m-Y H:i:s'));
                    // $this->Md->update($user_id, $task, 'tasks');
                    $this->Md->update_dynamic($user_id, 'id', 'users', $task);
                    echo "Updated";
                } else {
                    echo "Invalid Requests";
                }
            }
        } else {
            echo "Invalid Requests";
        }
    }

}
