<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{


    public function results($page=null){
        if(empty($page))
            $page=0;
        $this->template->title('SC Results');
        $instance = new Judgement();
        $paging = array();
        $judgement=null;
        $judgement=$instance->getResults($page);
        $results_count = $instance->get_judgement_count()->count;

        $pages=$results_count/10;
        for($index=0;$index<$pages;++$index){
            $paging[]=$page+$index+1;
            if($index>=9)
                break;
        }
        $data=array();
        $data['judgement']=$judgement;
        $data['starting_index']=$page;
        $data['paging']=$paging;
        $this->template->build('results',$data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */