<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 9/4/12
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 */
class Judgement_Model extends CI_Model {
    public $id;
    public $keycode; //this keycode is an alphanumeric string
    public $court;
    public $appellant;
    public $respondent;

    public $case_date;

    /**
     * @var : array
     */
    public $citation;

    public $judges;
    public $advocates;
    public $case_number;
    public $headnote;
    public $judgement;
    public $page_count = 10;

    public function get_judgement_count() {
        $sql = "select count(*) as count from judgements";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }

    public function __toString() {
        return "";
    }

    public function getResults($starting_index, $end_index) {
        $db = load_database();
        $db->select('Keycode,Date,Appellant,Respondent,FileName');
        $db->from('judgements');
        $db->limit($end_index, $starting_index);
        $db->order_by('Date', 'desc');
        $query = $db->get()->result();
        return $query;
    }

    public function get_judgement($keycode) {
        $db = load_database();
        $db->select('*');
        $db->from('judgements');
        $db->where('Keycode', $keycode);
        $result = $db->get()->row();
        return $result;
    }

    public function update_judgement($data) {
        $db = load_database();
        $db->where('keycode', $data['keycode']);
        $db->update('judgements', $data);
    }


    public function save_judgement() {
        $db = load_database();

        $judgement_data = array();
        $judgement_data['keycode'] = $this->keycode;
        $judgement_data['court'] = $this->court;
        $judgement_data['appellant'] = $this->appellant;
        $judgement_data['respondent'] = $this->respondent;
        $judgement_data['date'] = $this->case_date;
        $judgement_data['judges'] = $this->judges;
        $judgement_data['advocates'] = $this->advocates;
        $judgement_data['caseno'] = $this->case_number;
        $judgement_data['headnote'] = $this->headnote;
        $judgement_data['judgement'] = $this->judgement;
        foreach ($this->citation as $citation) {
            $citation->save_citation();
        }

        $sql = "INSERT  INTO judgements (keycode, court, appellant, respondent,date,judges,advocates,caseno,headnote,judgement) VALUES (?,?,?,?,?,?,?,?,?,?);";
        $db->query($sql, array($judgement_data['keycode'], get_court_name(), $this->appellant, $this->respondent, $this->case_date->format('Y-m-d H:i:s'),
            $this->judges, $this->advocates, $this->case_number, $this->headnote, $this->judgement));

    }

    public function insert_judgement($data) {
        $db = load_database();
        $db->insert('judgements', $data);
        return $db->insert_id();
    }
}
