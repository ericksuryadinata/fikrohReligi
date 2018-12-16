<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

    public function selectData($column,$tablename,$where){
        $query = 'select '.$column.' from '.$tablename.' '.$where;
        $data = $this->db->query($query);
        return $data;
    }
}
