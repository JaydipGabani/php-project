<?php


class loginModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    public function login($uname, $pass)
    {
        $this->db->where('uname', $uname);
        $this->db->where('pass', $pass);
        $row = $this->db->get('users');
        $id = $row->result();
        if ($row->num_rows() == 1) {

            $data = array(
                'userdata' => $id[0]->uname,
                'role' => $id[0]->role,
                'is_logged_in' => TRUE
            );
            $this->session->set_userdata('ci_session', $data);
            echo json_encode($data);
            redirect('/home');
        } else {
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('ci_session');
        redirect(base_url());

    }


}

?>