<?php
class Comment_model extends CI_Model {

    function create_comment() {     //Creates comment and assigns it to an issue
        $issueID = $_POST['id'];
        $title = $_POST['commentTitle'];
        $content = $_POST['content'];
        $today = date("Y-m-d", time());

        echo "You made it to the model!";
        $comment_data = array(
            'bugID'             => $issueID,
            'title'             =>  $title,
            'content'           =>  $content,
        //    'userID'            =>  $userID,
            'date_submitted'    =>  $today
        );

        $this->db->insert('comments', $comment_data);
        //$this->load->view('success');
    }  

    function delete_comment() {
        
    }

    function edit_comment() {
        
    }

    function get_comments($id) {    // Gets all comments for selected issue
        $query_string = "SELECT comments.id, 
                                comments.title, 
                                comments.content, 
                                comments.date_submitted,
                                users.first_name,
                                users.last_name
                        FROM comments
                        LEFT JOIN users
                            ON users.id = comments.userID
                        WHERE comments.bugID = ?";
        $q = $this->db->query($query_string, $id);
        /*    $this->db->select('*');
        $this->db->from('comments');
        $this->db->join('users', 'users.id = comments.userID', 'left');
        $this->db->where('bugID', $id);
        $q = $this->db->get();
        */
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
}
/******************
    End of file comment_model.php
    Location: ./application/models/comment_model.php
*******************/