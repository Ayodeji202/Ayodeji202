<?php

namespace App\Models;

use CodeIgniter\Model;

class RMIdeas extends Model
{
    //Query all the new ideas except those rejected by RM
    public function getideasrm() {
        $builder = $this->db->table('ideas');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }

    // Query all investors
    public function getinvestorsrm() {
        $builder = $this->db->table('investorprefs');
        $builder->select('*');
        return $builder->get()->getResultArray();
    }


    // Query all details on investor
    public function getselectedinvestor($investorid) {
        $builder = $this->db->table('investorprefs');
        $builder->select('*');
        $builder->where('investor_id', $investorid);
        return $builder->get()->getrow();
    }

    public function prefupdate($id,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l){
        $data = array(
            'investor_id' => $id,
            'name' =>$a,
            'key_terms' =>$d,
            'expires_on' => $b,
            'preferences' => $g,
            'risk' => $c,
            'product_type' => $f,
            'instruments' => $e,
            'currency' => $h,
            'major_sector' => $i,
            'minor_sector' => $j,
            'region' => $k,
            'country' =>$l  
          );
     $this->db->table('investorprefs')->replace($data);

        
    }

    public function updateOnlyIfNotEmpty($str,$field,$builder){
        if (!empty($str)) {
            $builder->set($field,$str);
        }
        return;
    }

}