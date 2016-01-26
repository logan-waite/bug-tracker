<?php
class Comment_model extends CI_Model {

    function get_comments($id) {
        $this->db->where('bugID', $id);
        $q = $this->db->get('comments');
        
        if($q->num_rows() > 0)
        {
            foreach ($q->result() as $row)
            {
                $data[] = $row;
            }
                return $data;
        }
        else
        {
            return FALSE;
        }
    }

    function create_comment() {
        
    }

    function edit_comment() {
        
    }

    function delete_comment() {
        
    }

}
/******************
    End of file comment_model.php
    Location: ./application/models/comment_model.php
*******************/