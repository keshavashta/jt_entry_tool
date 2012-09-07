<?php

function load_database() {
    $courts = array();
    $courts[0] = "jt_sc";
    $courts[1] = "jt_allahadbad";
    $courts[2] = "jt_andhra";
    $courts[3] = "jt_bombay";
    $courts[4] = "jt_calcutta";
    $courts[5] = "jt_chattisgarh";
    $courts[6] = "jt_delhi";
    $courts[7] = "jt_gauhati";
    $courts[8] = "jt_gujarat";
    $courts[9] = "jt_himachal";
    $courts[10] = "jt_jk";
    $courts[11] = "jt_jharkhand";
    $courts[12] = "jt_karnatka";
    $courts[13] = "jt_kerala";
    $courts[14] = "jt_mp";
    $courts[15] = "jt_madras";
    $courts[16] = "jt_orrissa";
    $courts[17] = "jt_patna";
    $courts[18] = "jt_punjab_haryand";
    $courts[19] = "jt_rajasthan";
    $courts[20] = "jt_sikkim";
    $courts[21] = "jt_uttarakhand";

    $court_id = get_selected_court_id();

    //if no court is found, set supreme court as default court
    if (empty($court_id))
        $court_id = 0;

    if ($court_id < 0 || $court_id > 21) {
        return null;
    }

    $ci =& get_instance();
    $db_instance = $ci->load->database(get_database_config($courts[$court_id]), TRUE);
    return $db_instance;
}

//todo: update this to have a single function for getting selected court name and id
function get_court_name() {
    $courts = get_courts();
    $ci =& get_instance();
    $court_id = $ci->session->userdata('court');
    //if no court is found, set supreme court as default court
    if (empty($court_id))
        $court_id = 0;

    return $courts[$court_id];
}

function get_selected_court_id() {
    $ci =& get_instance();
    $court_id = $ci->session->userdata('court');
    //if no court is found, set supreme court as default court
    if (empty($court_id))
        $court_id = 0;

    return $court_id;
}

function get_courts() {
    $courts = array();
    $courts[0] = "Supreme Court of India";
    $courts[1] = "Allahabad High Court";
    $courts[2] = "Andhra Pradesh High Court";
    $courts[3] = "Bombay High Court";
    $courts[4] = "Calcutta High Court";
    $courts[5] = "Chhattisgarh High Court";
    $courts[6] = "Delhi High Court";
    $courts[7] = "Gauhati High Court";
    $courts[8] = "Gujarat High Court";
    $courts[9] = "Himachal Pradesh High Court";
    $courts[10] = "Jammu and Kashmir High Court";
    $courts[11] = "Jharkhand High Court";
    $courts[12] = "Karnataka High Court";
    $courts[13] = "Kerala High Court";
    $courts[14] = "Madhya Pradesh High Court";
    $courts[15] = "Madras High Court";
    $courts[16] = "Orissa High Court";
    $courts[17] = "Patna High Court";
    $courts[18] = "Punjab and Haryana High Court";
    $courts[19] = "Rajasthan High Court";
    $courts[20] = "Sikkim High Court";
    $courts[21] = "Uttarakhand High Court";

    return $courts;
}

function get_database_config($db_name) {
    $config['hostname'] = "localhost";
    $config['username'] = "root";
    $config['password'] = "";
    $config['database'] = $db_name;
    $config['dbdriver'] = "mysql";
    $config['dbprefix'] = "";
    $config['pconnect'] = FALSE;
    $config['db_debug'] = TRUE;
    $config['cache_on'] = FALSE;
    $config['cachedir'] = "";
    $config['char_set'] = "utf8";
    $config['dbcollat'] = "utf8_general_ci";
    return $config;
}
