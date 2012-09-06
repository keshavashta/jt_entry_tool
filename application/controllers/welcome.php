<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function results($page = null)
    {
        if (empty($page))
            $page = 0;
        $page_Count = 10;
        $this->template->title('SC Results');
        $instance = new Judgement_Model();
        $paging = array();
        $judgement = null;
        $judgement = $instance->getResults($page * $page_Count, $page_Count);
        $results_count = $instance->get_judgement_count()->count;
        $data = array();

        if ($page == 0) {
            $data['pre'] = 0;
        } else {
            $data['pre'] = 1;
            $data['pre_val'] = $page - 1;
        }
        $all_pages = ceil($results_count / $page_Count);

        $next_page = $page == $all_pages - 1 ? null : $page + 1;

        $data['next_val'] = $next_page;


        $data['page'] = $page;
        $data['page_number'] = $page;
        $data['judgement'] = $judgement;
        $data['starting_index'] = $page * 10;

        $this->template->build('results', $data);

    }

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->template->build('file_loader', array('error' => ' '));

    }

    function do_upload()
    {
        $config['upload_path'] = './assets/uploads';
        $config['allowed_types'] = 'txt';
        $config['max_size'] = '10240';


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->template->build('file_loader', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_path = $data['upload_data']['full_path'];
            $loader = new JT_File_Loader();
            $judgements = array();
            $judgements = $loader->parseJudgements($file_path);

            if (!empty($judgements)) {
                foreach ($judgements as $judgement) {
                    $judgement->save_judgement();
                }
                $message = "Judgement Processed " . sizeof($judgements);

            }
            else{
                $message = "0 Judgement Processed " ;
            }
            $result = array();
            $result['message'] = $message;
            $this->template->build('processed_message', $result);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */