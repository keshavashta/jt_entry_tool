<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 9/4/12
 * Time: 3:13 PM
 * To change this template use File | Settings | File Templates.
 */
class Judgement extends CI_Model
{

    public $page_count = 10;

    public function get_judgement_count()
    {
        $sql = "select count(*) as count from judgements";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;

    }
    public function __toString()
    {
        return "";
    }
    public function getResults($page_number = null)
    {
        if (empty($page_number)) {
            $page_number = 0;
        }
        $this->db->select('Keycode,Date,Appellant,Respondent,FileName');
        $this->db->from('judgements');
        $this->db->limit(($page_number+1)*$this->page_count, $page_number * $this->page_count);
        $this->db->order_by('Date', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_judgement($keycode){
        $this->db->select('*');
        $this->db->from('judgements');
        $this->db->where('Keycode',$keycode);
        $result = $this->db->get()->row();
        return $result;
    }

    public function update_judgement($data)
    {
        $this->db->where('keycode', $data['keycode']);
        $this->db->update('judgement', $data);
    }

    public function insert_judgement($data)
    {
        $this->db->insert('judgement', $data);
    }
}
