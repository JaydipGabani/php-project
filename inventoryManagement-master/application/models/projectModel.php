<?php

/**
 * Created by PhpStorm.
 * User: HIT
 * Date: 25-11-2016
 * Time: 01:27
 */
class projectModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function addProject($data)
    {
//        echo json_encode($data);
        $this->db->insert('projects', $data);
        echo "<script>alert('Project Added');</script>";
    }

    function searchProject($data)
    {
        $this->db->select('*')->from('projects')->where('pid', $data['pid']);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $result=$result->result();
            return $result;
        }else{
            echo '<script>alert("Project not found");</script>';
        }
        return null;
    }

    function updateProject($data)
    {
        $this->db->trans_begin();
        $update = array(
            'pname' => $data['pname']
        );
        $this->db->where('pid',$data['pid']);
        $this->db->update('projects',$update);
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo "<script>alert('Error: job name was not updated')</script>";
        }
        else
        {
            echo "<script>alert('Job name updated')</script>";
            $this->db->trans_commit();
        }
        return null;
    }

    public function deleteProject($data)
    {
        $this->db->trans_begin();
        $this->db->where('pid',$data['pid']);
        $this->db->delete('projects');
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            echo "<script>alert('Error: Project not deleted')</script>";
        }
        else
        {
            $this->db->trans_commit();
            echo "<script>alert('Project deleted')</script>";

        }
        return null;
    }

    public function loadMoreProjects($page)
    {
        $offset = 10 * $page;
        $result = $this->db->get('projects', 10, $offset)->result();
        return $result;
    }
}