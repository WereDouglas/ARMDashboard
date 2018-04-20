<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    function __construct() {

        parent::__construct();
        error_reporting(E_PARSE);
        $this->load->model('Md');
        $this->load->library('session');
        $this->load->library('encrypt');
        date_default_timezone_set('Africa/Kampala');
        $this->load->library('excel');
    }

    public function index() {
        $query = $this->Md->query("SELECT * FROM users where org = '" . $this->session->userdata('orgid') . "' ");

        if ($query) {
            $data['users'] = $query;
        } else {
            $data['users'] = array();
        }
        $query = $this->Md->query("SELECT * FROM files where org = '" . $this->session->userdata('orgid') . "' ");

        if ($query) {
            $data['files'] = $query;
        } else {
            $data['files'] = array();
        }
        $data['procs'] = array();

        $query = $this->Md->query("SELECT * FROM procedures where org = '" . $this->session->userdata('orgid') . "' OR org=''");
        if ($query)
            $data['procs'] = $query;

        $this->load->view('upload-page', $data);
    }

    public function user() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('userID'), 'userID', 'users');

            if (!$result) {
                $id = $this->input->post('userID');
                $user = array('name' => $this->input->post('name'), 'address' => $this->input->post('address'), 'image' => $this->input->post('image'), 'contact' => $this->input->post('contact'), 'designation' => $this->input->post('designation'), 'status' => $this->input->post('status'), 'address' => $this->input->post('address'), 'category' => $this->input->post('category'));

                $this->Md->update_dynamic($id, 'userID', 'users', $user);
                echo 'user information updated';
                return;
            } else {
                $users = array('userID' => $this->input->post('userID'), 'orgID' => $this->input->post('orgID'), 'image' => $this->input->post('image'), 'name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'password' => ($this->input->post('password')), 'designation' => $this->input->post('designation'), 'image' => $this->input->post('image'), 'address' => $this->input->post('address'), 'contact' => $this->input->post('contact'), 'category' => $this->input->post('category'), 'created' => $this->input->post('created'), 'status' => $this->input->post('status'), 'action' => 'none');
                $this->Md->save($users, 'users');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $users = array('userID' => $this->input->post('userID'), 'orgID' => $this->input->post('orgID'), 'name' => $this->input->post('name'), 'email' => $this->input->post('email'), 'password' => ($this->input->post('password')), 'designation' => $this->input->post('designation'), 'image' => $this->input->post('image'), 'address' => $this->input->post('address'), 'contact' => $this->input->post('contact'), 'category' => $this->input->post('category'), 'created' => $this->input->post('created'), 'status' => $this->input->post('status'), 'action' => 'none');
            $this->Md->save($users, 'users');
            echo "Information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            $query = $this->Md->cascade($this->input->post('userID'), 'users', 'userID');
        }
    }

    public function file() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('fileID'), 'fileID', 'file');

            if (!$result) {
                $files = array('fileID' => $this->input->post('fileID'), 'client' => $this->input->post('client'), 'lawyer' => $this->input->post('lawyer'), 'orgID' => $this->input->post('orgID'), 'details' => $this->input->post('details'), 'name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'created' => date('Y-m-d H:i:s'), 'status' => $this->input->post('status'), 'no' => $this->input->post('no'), 'subject' => $this->input->post('subject'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'), 'action' => 'none');

                $this->Md->update_dynamic($this->input->post('fileID'), 'fileID', 'file', $files);
                echo 'File information updated';
                return;
            } else {
                $files = array('fileID' => $this->input->post('fileID'), 'client' => $this->input->post('client'), 'lawyer' => $this->input->post('lawyer'), 'orgID' => $this->input->post('orgID'), 'details' => $this->input->post('details'), 'name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'created' => date('Y-m-d H:i:s'), 'status' => $this->input->post('status'), 'no' => $this->input->post('no'), 'subject' => $this->input->post('subject'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'), 'action' => 'none');
                $this->Md->save($files, 'file');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $files = array('fileID' => $this->input->post('fileID'), 'client' => $this->input->post('client'), 'lawyer' => $this->input->post('lawyer'), 'orgID' => $this->input->post('orgID'), 'details' => $this->input->post('details'), 'name' => $this->input->post('name'), 'type' => $this->input->post('type'), 'created' => date('Y-m-d H:i:s'), 'status' => $this->input->post('status'), 'no' => $this->input->post('no'), 'subject' => $this->input->post('subject'), 'citation' => $this->input->post('citation'), 'law' => $this->input->post('law'), 'action' => 'none');
            $this->Md->save($files, 'file');

            echo "File information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            $query = $this->Md->cascade($this->input->post('fileID'), 'file', 'fileID');
        }
    }

    public function transaction() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('transID'), 'transID', 'transaction');

            if (!$result) {
                $trans = array('transID' => $this->input->post('transID'), 'no' => $this->input->post('no'), 'invoice' => $this->input->post('invoice'), 'balance' => $this->input->post('balance'), 'method' => $this->input->post('method'), 'orgID' => $this->input->post('orgID'), 'client' => $this->input->post('client'), 'type' => $this->input->post('type'), 'created' => $this->input->post('created'), 'staff' => $this->input->post('staff'), 'details' => $this->input->post('details'), 'category' => $this->input->post('category'), 'total' => $this->input->post('total'), 'fileID' => $this->input->post('fileID'), 'method' => $this->input->post('method'), 'paid' => $this->input->post('paid'), 'dueDate' => $this->input->post('dueDate'), 'vat' => $this->input->post('vat'), 'status' => $this->input->post('status'), 'action' => 'none');
                $this->Md->update_dynamic($this->input->post('transID'), 'transID', 'transaction', $trans);
                echo 'Transaction information updated';
                return;
            } else {
                $trans = array('transID' => $this->input->post('transID'), 'no' => $this->input->post('no'), 'invoice' => $this->input->post('invoice'), 'balance' => $this->input->post('balance'), 'method' => $this->input->post('method'), 'orgID' => $this->input->post('orgID'), 'client' => $this->input->post('client'), 'type' => $this->input->post('type'), 'created' => $this->input->post('created'), 'staff' => $this->input->post('staff'), 'details' => $this->input->post('details'), 'category' => $this->input->post('category'), 'total' => $this->input->post('total'), 'fileID' => $this->input->post('fileID'), 'method' => $this->input->post('method'), 'paid' => $this->input->post('paid'), 'dueDate' => $this->input->post('dueDate'), 'vat' => $this->input->post('vat'), 'status' => $this->input->post('status'), 'action' => 'none');
                $this->Md->save($trans, 'transaction');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $trans = array('transID' => $this->input->post('transID'), 'no' => $this->input->post('no'), 'invoice' => $this->input->post('invoice'), 'balance' => $this->input->post('balance'), 'method' => $this->input->post('method'), 'orgID' => $this->input->post('orgID'), 'client' => $this->input->post('client'), 'type' => $this->input->post('type'), 'created' => $this->input->post('created'), 'staff' => $this->input->post('staff'), 'details' => $this->input->post('details'), 'category' => $this->input->post('category'), 'total' => $this->input->post('total'), 'fileID' => $this->input->post('fileID'), 'method' => $this->input->post('method'), 'paid' => $this->input->post('paid'), 'dueDate' => $this->input->post('dueDate'), 'vat' => $this->input->post('vat'), 'status' => $this->input->post('status'), 'action' => 'none');
            $this->Md->save($trans, 'transaction');
            echo "Transaction information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            $query = $this->Md->cascade($this->input->post('transID'), 'transaction', 'transID');
            $query = $this->Md->cascade($this->input->post('transID'), 'item', 'transID');
        }
    }

    public function item() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('itemID'), 'itemID', 'item');

            if (!$result) {
                $id = $this->input->post('itemID');
                $itema = array('itemID' => $this->input->post('itemID'), 'name' => $this->input->post('name'), 'transID' => $this->input->post('transID'), 'description' => $this->input->post('description'), 'rate' => $this->input->post('rate'), 'qty' => $this->input->post('qty'), 'total' => $this->input->post('total'), 'orgID' => $this->input->post('orgID'), 'action' => 'none');
                $this->Md->update_dynamic($id, 'itemID', 'item', $itema);
                echo 'Item information updated';
                return;
            } else {
                $itema = array('itemID' => $this->input->post('itemID'), 'name' => $this->input->post('name'), 'transID' => $this->input->post('transID'), 'description' => $this->input->post('description'), 'rate' => $this->input->post('rate'), 'qty' => $this->input->post('qty'), 'total' => $this->input->post('total'), 'orgID' => $this->input->post('orgID'), 'action' => 'none');
                $this->Md->save($itema, 'item');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $itema = array('itemID' => $this->input->post('itemID'), 'name' => $this->input->post('name'), 'transID' => $this->input->post('transID'), 'description' => $this->input->post('description'), 'rate' => $this->input->post('rate'), 'qty' => $this->input->post('qty'), 'total' => $this->input->post('total'), 'orgID' => $this->input->post('orgID'), 'action' => 'none');
            $this->Md->save($itema, 'item');
            echo "Item Information saved online";
            return;
        }
    }

    public function tasks() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'update') {

            $result = $this->Md->check($this->input->post('taskID'), 'taskID', 'tasks');

            if (!$result) {
                $id = $this->input->post('taskID');
                $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'), 'action' => 'none');

                $this->Md->update_dynamic($id, 'taskID', 'tasks', $sch);
                echo 'Schedule information updated';
                return;
            } else {
                $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'), 'action' => 'none');
                $this->Md->save($sch, 'tasks');
                echo "Information saved online";
                return;
            }
        }
        if ($this->input->post('action') == 'create') {

            $sch = array('taskID' => $this->input->post('taskID'), 'date' => $this->input->post('date'), 'priority' => $this->input->post('priority'), 'period' => $this->input->post('period'), 'details' => $this->input->post('details'), 'orgID' => $this->input->post('orgID'), 'startTime' => $this->input->post('startTime'), 'endTime' => $this->input->post('endTime'), 'trigger' => $this->input->post('trigger'), 'userID' => $this->input->post('userID'), 'created' => date('Y-m-d'), 'fileID' => $this->input->post('file'), 'action' => 'none');
            $id = $this->Md->save($sch, 'tasks');
            echo "Information saved online";
            return;
        }
        if ($this->input->post('action') == 'delete') {
            // $query = $this->Md->delete($id, 'files');
            $query = $this->Md->cascade($this->input->post('taskID'), 'tasks', 'taskID');
            $query = $this->Md->cascade($this->input->post('taskID'), 'attend', 'taskID');
            $query = $this->Md->cascade($this->input->post('taskID'), 'message', 'taskID');
        }
    }

    public function attend() {
        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'create') {
            $schs = array('attendID' => $this->input->post('attendID'), 'orgID' => $this->input->post('orgID'), 'name' => $this->input->post('name'), 'contact' => $this->input->post('contact'), 'userID' => $this->input->post('userID'), 'taskID' => $this->input->post('taskID'), 'action' => 'none');
            $id = $this->Md->save($schs, 'attend');
            echo "Attendance information saved online";
            return;
        }
    }

    public function msg() {

        $this->load->helper(array('form', 'url'));
        if ($this->input->post('action') == 'create') {
            $mails = array('messageID' => $this->input->post('messageID'), 'taskID' => $this->input->post('taskID'), 'body' => $this->input->post('body'), 'subject' => $this->input->post('subject'), 'date' => $this->input->post('date'), 'to' => $this->input->post('to'), 'created' => $this->input->post('created'), 'from' => $this->input->post('from'), 'sent' => $this->input->post('sent'), 'type' => $this->input->post('type'), 'orgID' => $this->input->post('orgID'), 'action' => 'none', 'contact' => $this->input->post('contact'), 'email' => $this->input->post('email'));
            $this->Md->save($mails, 'message');
            echo "Attendance Information saved online";
            return;
        }
    }

}
