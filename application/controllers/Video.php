<?php
class Video extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('video_model');
        $this->load->helper(array('form', 'url'));
        
        $this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        $data['videos'] = $this->video_model->get_video();
        $data['title'] = 'Videos';

        $this->load->view('templates/header', $data);
        $this->load->view('video/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id = NULL)
    {
        $data['video_item'] = $this->video_model->get_video($id);

        if (empty($data['video_item']))
        {
                show_404();
        }

        //$data['title'] = $data['video_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('video/view', $data);
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        //$this->load->library('form_validation');

        $data['title'] = 'Create a video item';

        //$this->form_validation->set_rules('title', 'Title', 'required');        

        //if ($this->form_validation->run() === FALSE)
        //{
            $this->load->view('templates/header', $data);
            $this->load->view('video/create');
            $this->load->view('templates/footer');
/*            
        }
        else
        {
            $this->video_model->set_video();
            $this->load->view('templates/success');
        }
*/        
    }

    public function upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'mp4|jpg|png';
        $config['max_size']             = 10000000000000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            echo 'hello';
            $this->load->view('video/create', $error);
        }
        else
        {
            $data = array();
            $upload = $this->upload->data();
            $data['filename'] = $upload['file_name'];
            $this->video_model->set_video($data);
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('video/success', $data);
        }
    }    
}
