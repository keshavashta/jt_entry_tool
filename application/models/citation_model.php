<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 9/3/12
 * Time: 7:59 PM
 * To change this template use File | Settings | File Templates.
 */
class Citation_Model extends CI_Model
{

    public $id;
    public $keycode;
    public $journal;
    public $volume;
    public $year;
    public $page;

    public function __construct()
    {
        parent::__construct();
        $this->page = -1;
        $this->year = -1;

    }

    public function save_citation()
    {
        $citation_data = array();
        $citation_data['keycode'] = $this->keycode;
        $citation_data['journal'] = $this->journal;
        $citation_data['volume'] = $this->volume;
        $citation_data['page'] = $this->page;
        $citation_data['year'] = $this->year;

        $this->db->insert('citations', $citation_data);

    }


    public function get_citation($keycode)
    {
        $this->db->select('*');
        $this->db->from('citations');
        $this->db->where('keycode', $keycode);
        $result = $this->db->get()->result();
        return $result;
    }

    public function update_citation($data)
    {
        $this->db->where('journal', $data['journal']);
        $this->db->where('keycode', $data['keycode']);
        $this->db->update('citations', $data);
    }

    public function delete_citation($keycode)
    {
        $this->db->where('keycode', $keycode);

        $this->db->delete('citations');

    }

    public function insert_citation($data)
    {

        $this->db->insert('citations', $data);


    }
}
