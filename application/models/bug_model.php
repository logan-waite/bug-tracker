<?php

class Bug_model extends CI_Model {
    
/*    function getAll() {
        $q = $this->db->get('bugs');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
    }
    */
/*    function getAll() {
        
        $this->db->select('bug_name, date_submitted');
        $q = $this->db->get('bugs');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
    }
  */
    
/*    function getAll() {
        $sql = "SELECT bug_name, bug_description, date_submitted FROM bugs WHERE id = ? AND date_submitted = ?";
        $q = $this->db->query($sql, array(2, '2016-1-20'));
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
  }
  */
    
    function getAll() {
        $this->db->select('bug_name, bug_description');
        $this->db->from('bugs');
        $this->db->where('id', 2);
        
        $q = $this->db->get();
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
        
    }
}