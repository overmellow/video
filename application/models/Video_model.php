<?php
class Video_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_video($id = FALSE)
    {
        if ($id === FALSE)
        {
            $query = $this->db->get('video');
            return $query->result_array();
        }

        $query = $this->db->get_where('video', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_video($data)
    {
        $this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        //$data = array(
            //'title' => $this->input->post('title'),
            //'slug' => $slug,
            //'filename' => $this->input->post('text')
        //);

        return $this->db->insert('video', $data);
    }
}