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
        $keycode = $this->uri->segment(3);
        $data = array();
        $data['keycode'] = $keycode;
        $instance = new Judgement_Model();
        $citation_instance = new Citation_Model();
        $citations = $citation_instance->get_citation($keycode);

        $judgement = $instance->get_judgement($keycode);
        $data['judgement'] = $judgement;
        $data['citations'] = $citations;
        $this->template->title('Edit Judgement');
        $this->template->build('edit_judgement', $data);
    }

    public function view_judgement()
    {
        $keycode = $this->uri->segment(3);

        $instance = new Judgement_Model();
        $data = array();

        $result = $instance->get_judgement($keycode);
        $data['judgement'] = $result;
        $citation_model_instance = new Citation_Model();
        $data['citation'] = null;
        $data['citation'] = $citation_model_instance->get_citation($result->Keycode);
        $this->template->title('Judgement');
        $this->template->build('view_judgement', $data);
    }

    public function update_judgement()
    {
        $judgement = $this->input->post('judgement');
        $headnote = $this->input->post('headnote');
        $advocate = $this->input->post('advocate');
        $appellant = $this->input->post('appellant');
        $respondant = $this->input->post('respondant');
        $case_number = $this->input->post('case_number');
        $cases_referred = $this->input->post('cases_referred');
        $keycode = $this->input->post('keycode');
        $judges = $this->input->post('judges');
        $date = $this->input->post('date');
        $citation_instance = new Citation_Model();

        $citation_instance->delete_citation($keycode);
        for ($index = 1; $index < 7; ++$index) {
            $journal = $this->input->post('journal' . $index);
            $page = $this->input->post('page' . $index);
            $year = $this->input->post('year' . $index);
            $volume = $this->input->post('volume' . $index);
            if (empty($journal)) {
                continue;

            }
            if (empty($page)) {
                $page = 0;
            }
            if (empty($volume)) {
                $volume = "";
            }
            if (empty($year)) {
                $year = 0;
            }
            $data = array("journal" => $journal, "year" => $year, "volume" => $volume, 'page' => $page, 'keycode' => $keycode);
            $citation_instance->insert_citation($data);
            unset($data);
        }

        if (empty($judgement))
            $judgement = "";
        if (empty($headnote))
            $headnote = "";
        if (empty($advocate))
            $advocate = "";
        if (empty($appellant))
            $appellant = "";
        if (empty($respondant))
            $respondant = "";
        if (empty($case_number))
            $case_number = "";
        if (empty($cases_referred))
            $cases_referred = "";
        if (empty($date))
            $date = "";
        if (empty($judges))
            $judges = "";
        $data = array('judgement' => $judgement,
            'headnote' => $headnote, 'advocates' => $advocate,
            'judges' => $judges, 'appellant' => $appellant, 'respondent' => $respondant,
            'caseno' => $case_number, 'casesreferred' => $cases_referred,
            'date' => $date, 'keycode' => $keycode);
        $instance = new Judgement_Model();

        $instance->update_judgement($data);
        redirect(base_url("/welcome/results"));

    }

    public function add_judgement()
    {
        $this->template->title('New Judgement');
        $this->template->build('add_judgement');
    }

    public function new_judgement()
    {
        $judgement = $this->input->post('judgement');
        $headnote = $this->input->post('headnote');
        $advocate = $this->input->post('advocate');
        $appellant = $this->input->post('appellant');
        $respondant = $this->input->post('respondant');
        $case_number = $this->input->post('case_number');
        $cases_referred = $this->input->post('cases_referred');
        $judges = $this->input->post('judges');
        $date = $this->input->post('date');
        $keycode = random_string('unique');

        if (empty($judgement))
            $judgement = "";
        if (empty($headnote))
            $headnote = "";
        if (empty($advocate))
            $advocate = "";
        if (empty($appellant))
            $appellant = "";
        if (empty($respondant))
            $respondant = "";
        if (empty($case_number))
            $case_number = "";
        if (empty($cases_referred))
            $cases_referred = "";
        if (empty($date))
            $date = "";
        if (empty($judges))
            $judges = "";
        $data = array('judgement' => $judgement,'keycode'=>$keycode,
            'headnote' => $headnote, 'advocates' => $advocate,
            'judges' => $judges, 'appellant' => $appellant, 'respondent' => $respondant, 'caseno' => $case_number, 'casesreferred' => $cases_referred, 'date' => $date);
        $instance = new Judgement_Model();
//        $inserted_keycode = $instance->insert_judgement($data);
        $citation_instance = new Citation_Model();

        for ($index = 1; $index < 7; ++$index) {
            $jour = $this->input->post('journal' . $index);
            $yr = $this->input->post('year' . $index);
            $vol = $this->input->post('volume' . $index);
            $pg = $this->input->post('page' . $index);

            if (!empty($jour)) {
                $data = array();
                $data['page'] = $pg;
//                $data['keycode'] = $inserted_keycode;
                $data['keycode'] = $keycode;
                $data['volume'] = $vol;
                $data['year'] = $yr;
                $data['journal'] = $jour;
                $citation_instance->insert_citation($data);
                unset($data);
            }
        }

        redirect(base_url("/welcome/results"));

    }
}
