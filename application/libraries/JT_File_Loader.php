<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: naveen
 * Date: 9/5/12
 * Time: 11:27 PM
 * To change this template use File | Settings | File Templates.
 */

//todo: write all assumption here.
class JT_File_Loader
{

    public function __construct()
    {

    }

    private $counter = 0;

    public function parseJudgements($file_path)
    {
        //if file does not exist, return null
        if (!file_exists($file_path))
            return array();

        $file_data = file_get_contents($file_path);

        $judgements_data = $this->split_files($file_data);

        $judgements = array();
        foreach ($judgements_data as $judgement) {
            $parse_judgement = $this->parse_judgement($judgement);
            if (!empty($parse_judgement))
                $judgements[] = $parse_judgement;
        }

        return $judgements;
    }

    private function split_files($file_data)
    {
        return explode("**********", $file_data);
    }

    private function parse_judgement($data)
    {
        $judgement = new Judgement_Model();
        $data_lines = explode("\n", $data);

        $line_counter = 0;

        //keep moving ahead until we get first non-empty line
        while ($line_counter < sizeof($data_lines)) {
            $str = trim($data_lines[$line_counter]);
            if (!empty($str))
                break;
            else
                ++$line_counter;
        }

        if ($line_counter > 0)
            $data_lines = array_slice($data_lines, $line_counter, sizeof($data_lines));

        if (sizeof($data_lines) == 0)
            return null;

        $judgement->keycode = random_string('unique');
        $judgement->citation = $this->get_citations($data_lines, $judgement->keycode);

        $parties = $this->get_party($data_lines);

        $judgement->appellant = $parties[0];
        $judgement->respondent = $parties[1];

        $judgement->case_number = $this->get_case_number($data_lines);
        $judgement->judges = $this->get_judges($data_lines);
        $judgement->case_date = $this->get_date($data_lines);
        $judgement->advocates = $this->get_advocates($data_lines);
        $judgement->headnote = $this->get_headnote($data_lines);
        $judgement->judgement = $this->get_judgement($data_lines);

        return $judgement;
    }

    private function get_citations(array $data_lines, $keycode)
    {
        $citation_text = $data_lines[0];

        $citation_lines = explode(' ', $citation_text);

        //if citation doesnt start with JT, return blank array
        if (!($citation_lines[0] == "JT"))
            return array();

        $citation = new Citation_Model();
        $citation->keycode = $keycode;
        $citation->journal = "JT";
        $citation->year = sizeof($citation_lines > 1) ? $citation_lines[1] : -1;

        $volume = sizeof($citation_lines > 2) ? $citation_lines[2] : "";
        $citation->volume = str_replace("(", '', str_replace(')', '', $volume));

        $citation->page = sizeof($citation_lines > 4) ? $citation_lines[4] : -1;
        return array($citation);
    }

    /**
     * @param array $data_lines
     * @return array of appellant and respondent
     */
    private function get_party(array $data_lines)
    {
        if (sizeof($data_lines) == 0)
            return array("", "");

        $party_lines = explode("v.", $data_lines[1]);

        if (sizeof($party_lines) == 0)
            return array("", "");

        $data = array();
        $data[] = trim($party_lines[0]);
        $data[] = isset($party_lines[1]) ? trim($party_lines[1]) : "";

        return $data;
    }

    private function get_case_number(array $data_lines)
    {
        if (sizeof($data_lines) < 2)
            return "";

        $this->counter = 2;

        while ($this->counter < sizeof($data_lines)) {
            $ends_with = "J.";

            if ($this->check_ends_with(trim($data_lines[$this->counter]), $ends_with)) {
                break;
            } else
                ++$this->counter;
        }

        $case_number = "";

        for ($i = 2; $i < $this->counter; ++$i) {
            $case_number .= $data_lines[$i] . "\n";
        }

        return $case_number;
    }

    private function get_judges(array $data_lines)
    {
        $judges = trim(
            str_replace(",", "",
                substr($data_lines[$this->counter], 0, strrpos($data_lines[$this->counter], " "))));
        ++$this->counter;
        return $judges;
    }

    private function get_date(array $data_lines)
    {
        $date = $data_lines[$this->counter];
        $date = trim(str_ireplace("dt.", '', $date));
        $date = new DateTime($date);

        ++$this->counter;
        return $date;
    }

    private function get_advocates(array $data_lines)
    {
        $start_counter = 0;

        while ($start_counter < sizeof($data_lines)) {
            if (strcasecmp(trim($data_lines[$start_counter]), "Appearances") == 0) {
                //need to start with next line
                ++$start_counter;
                break;
            }

            ++$start_counter;
        }

        $end_counter = $start_counter;

        while ($end_counter < sizeof($data_lines)) {
            //assuming that this section ends with upper case string
            if (strcmp(strtoupper($data_lines[$end_counter]), $data_lines[$end_counter]) == 0)
                break;

            ++$end_counter;
        }


        $advocates = "";

        for ($i = $start_counter; $i < $end_counter; ++$i) {
            $advocates .= $data_lines[$i] . "\n";
        }

        if (!empty($advocates))
            $this->counter = $end_counter;

        return $advocates;
    }

    private function get_headnote(array $data_lines)
    {

        $end_counter = $this->counter;

        while ($end_counter < sizeof($data_lines)) {
            if ($this->check_ends_with(trim($data_lines[$end_counter]), "J."))
                break;

            ++$end_counter;
        }

        $headnote = "";

        for ($i = $this->counter + 1; $i < $end_counter; ++$i) {
            $headnote .= $data_lines[$i] . "\n";
        }

        $this->counter = $end_counter;

        return $headnote;
    }

    private function get_judgement(array $data_lines)
    {
        $judgement = "";
        while ($this->counter < sizeof($data_lines)) {
            $judgement .= $data_lines[$this->counter] . "\n";
            ++$this->counter;
        }

        return $judgement;
    }

    private function check_ends_with($data, $ends_with)
    {
        if (strlen($data) < strlen($ends_with))
            return false;

        return substr_compare($data, $ends_with, -strlen($ends_with), strlen($ends_with)) === 0;
    }


}
