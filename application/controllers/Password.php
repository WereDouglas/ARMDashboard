<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function index() {


        $this->load->view('reset-page');
    }

    public function lists() {
        $query = $this->Md->query("SELECT * FROM users WHERE  orgID='" . $this->session->userdata('orgID') . "' ");
        //$query = $this->Md->query("SELECT * FROM client");
        echo json_encode($query);
    }

    public function reset() {
        $this->load->helper(array('form', 'url'));
        $this->load->library('email');

        $contact = $this->input->post('contact');
        $email = $this->input->post('email');
        $result = $this->Md->query("SELECT * FROM users WHERE  email='" . $email . "' AND contact = '" . $contact . "'");
        foreach ($result as $res) {
            
            if ($res->contact != "") {
                $password = $this->generateRandomString();
                $this->load->helper(array('form', 'url'));
                $new_password = md5($password);
                $info = array('passwords' => $new_password);
                $this->Md->update_dynamic($contact, 'contact', 'users', $info);
                $body = $contact . '  ' . ' Your password has been reset to ' . $password . " Please click the link below to access your epitrack account http://caseprofessional.pro/index.php";


                $subject = "Password reset ";

                $this->email($email, $body, $subject);
                //echo 'INFORMATION UPDATED';
                $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>USER PASSWORD HAS CHANGED</strong></div>');
                $this->sms($contact, $body);
                redirect('/web', 'refresh');
            }
            redirect('/web', 'refresh');
        }
        redirect('/web', 'refresh');
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
            redirect('/web', 'refresh');
        } catch (AfricasTalkingGatewayException $e) {
            echo "Encountered an error while sending: " . $e->getMessage();
            redirect('/user', 'refresh');
        }
    }

    public function update_password() {

        $this->load->helper(array('form', 'url'));
        //user information
        $this->load->library('email');
        $password = $this->input->post('password');
        //$password = '123456';
        $this->load->helper(array('form', 'url'));
        $id = $this->input->post('userID');
        $email = $this->Md->query_cell("SELECT email FROM users WHERE userID ='" . $id . "'", 'email');
        $name = $this->Md->query_cell("SELECT name FROM users WHERE userID='" . $id . "'", 'name');

        $new_password = md5($password);

        $info = array('password' => $new_password);
        $this->Md->update_dynamic($id, 'userID', 'users', $info);

        $body = $name . '  ' . ' Your password has been reset to ' . $password . " Please click the link below to access your Case Professional account: caseprofessional.org";

        $from = "noreply@caseprofessional.org";
        $subject = "Password reset ";
        if ($email != "") {

            $this->email->from($from, 'Case Professional');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($body);
            $this->email->send();
            echo $this->email->print_debugger();
            echo "email has been sent";
            //return;
        }

        echo 'INFORMATION UPDATED';
        $this->session->set_flashdata('msg', '<div class="alert alert-success">  <strong>USER PASSWORD CHANGED</strong></div>');

        redirect('/web' . $name, 'refresh');
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

    public function GUID() {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    public function delete() {

        $this->load->helper(array('form', 'url'));
        $userID = $this->uri->segment(3);
        $query = $this->Md->cascade($userID, 'users', 'id');
        redirect('user', 'refresh');
    }

    public function generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
