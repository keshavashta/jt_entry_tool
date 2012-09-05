<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 9/4/12
 * Time: 6:43 PM
 * To change this template use File | Settings | File Templates.
 */
class Entry extends CI_Controller
{

    public function edit_judgement()
    {
        $this->template->title('Edit Judgement');
        $this->template->build('edit_judgement');
    }

    public function view_judgement()
    {
        $keycode = $this->uri->segment(3);

        $instance = new Judgement();
        $data = array();
        $result = $instance->get_judgement($keycode);
        $data['judgement'] = $result;
        $this->template->title('Judgement');
        $this->template->build('view_judgement', $data);
    }

    public function update_judgement(){
        $keycode = $this->uri->segment(3);

        $instance = new Judgement();
        $data = array();
        $result = $instance->get_judgement($keycode);
        $data['judgement'] = $result;
        $this->template->title('Judgement');
        $this->template->build('view_judgement', $data);
    }
    public function add_judgement()
    {
        $judgement=$this->input->post('judgement');
        $headnote=$this->input->post('headnote');
        $advocate=$this->input->post('advocate');
        $appellant=$this->input->post('appellant');
        $respondant=$this->input->post('respondant');
        $case_number=$this->input->post('case_number');
        $cases_referred=$this->input->post('');
        $date=$this->input->post('date');
        $date=$this->input->post('date');

    }
}
