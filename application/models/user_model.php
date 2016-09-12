<?php

class User_model extends CI_Model {
        
    function create_user() {
        
    }
    
    function check_input() {    //Make sure username and password exist; returns TRUE if name and password match, TRUE otherwise.
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $found = FALSE;
        $rightPassword = FALSE;
        $user;
        
        $usersQuery = $this->db->get('users');
        
        if($usersQuery->num_rows() > 0)
        {
            foreach ($usersQuery->result() as $entry)
            {
                if($entry->username == $username)
                {
                    $user = $entry->id;
                    $found = TRUE;
                    $storedUsername = $entry->username;
                    $storedPassword = $entry->password;
                } 
            }
            
            if($found)
            {
                if($storedPassword == $password)
                {
                    $rightPassword = TRUE;
                }
            }
            
            if(!$found || !$rightPassword)
            {
                return FALSE;
            }
            else
            {
                $result = array(
                    'valid'     => TRUE,
                    'userID'    => $user
                );
                return $result;
            }
            
        }
    }

    function delete_user() {
        
    }
    
    function edit_user() {
        
    }
    
    function get_all_users() {
        
    }
    
    function get_logged_in_user($userID) {      //Get user that logged in and return session variable
        
        $this->db->where('id', $userID);
        $userQuery = $this->db->get('users');
        $thisUser = array();
        
        foreach ($userQuery->result() as $user)
        {
            $userID = $user->id;
            $userName = $user->first_name . " " . $user->last_name;
            $thisUser = array(
                'id'    => $userID,
                'name'  => $userName
            );
        }
        
        return $thisUser;
    }
    
}