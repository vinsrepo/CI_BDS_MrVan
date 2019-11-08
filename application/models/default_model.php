<?php
error_reporting(0);
class Default_model extends CI_Model{ 
    
    function __contruct() 
    { 
        parrent::__contruct(); 
        
    } 
    
    //--- Them dong du lieu moi voi du lieu dau vao la 1 mang
    function addDuLieuMoi($table,$data){
        if($this->db->insert($table,$data))
            return TRUE;
        else
            return FALSE;
    }
    // update du lieu voi du lieu dau vao la 1 mang
    function updateDuLieu($table,$data,$where) 
    { 
        if($this->db->update($table,$data,$where))
            return TRUE;
        else
            return FALSE;
    }
    //xoa du lieu hang loat voi du lieu dau vao la 1 mang
    function XoaDuLieu($data,$table,$where,$query="") 
    { 
       if($query!="")
       {
        $this->db->query($query);
       }else{
        for($i=0;$i<count($data);$i++)
        {
        $this->db->delete($table, array("$where" => $data[$i]));
        }
       }
    }
    // //Lay 1 dong thong tin qua 1 id voi du lieu dau vao la 1 mang va ket qua tra ve la 1 dong du lieu
    function getInfoID($table,$data,$noibang='',$random='') 
    { 
      if($noibang!=""){
        foreach ($noibang as $join)
        {
        $this->db->join($join['key'], $join['where']);
        }
      }
      if($random!=""){
        $this->db->order_by($random, "random"); 
      }
        $query = $this->db->get_where($table,$data);
          if($query->num_rows()!=0){
            return $query->row_array();
          }
          else{
            return FALSE;
          } 
    }
    function geTotalIDLike($table,$data,$like) 
    { 
         if($like!=''){
         $this->db->like($like); 
         }
        $query = $this->db->get_where($table,$data);
          if($query->num_rows()!=0){
            return $query->num_rows();
          }
          else{
            return FALSE;
          } 
    }
    //dem so dong du lieu co trong bang
    function totalRows($table,$timkiem,$where,$where_dieukien="",$noibang='') 
    { 
      if($where_dieukien!=""){
        $this->db->where($where_dieukien);
      }
      if($timkiem!=""){
        foreach ($timkiem as $member)
        {
        $this->db->or_where("$where", $member[$where]);
        }
      }
      if($noibang!=""){
        foreach ($noibang as $join)
        {
        $this->db->join($join['key'], $join['where']);
        }
      }
        $query=$this->db->get($table);
        $total=$query->num_rows;
          if($total!=0){
            return $total;
          }
          else{
            return FALSE;
          } 
    }
    function totalGroupBy($table,$group_by,$select=''){
        $this->db->select("$group_by,$select COUNT($group_by) as total");
        $this->db->group_by($group_by); 
        $this->db->order_by('total', 'desc'); 
        $query = $this->db->get($table);
        $num=$query->num_rows();
          if($num!=0){
            return $query->result_array();
          }
          else{
            return FALSE;
          } 
    }
    //truy van bang csdl va phan trang
    function getTableRows($table,$per,$start,$order_by,$timkiem,$where,$where_noibang="",$where_dieukien="",$group_by="",$select="",$like='') 
    { 
      if($select!=""){
         $this->db->select($select);
        }
      if($timkiem!=""){
        foreach ($timkiem as $member)
        {
        $this->db->or_where("$where", $member[$where]);
        }
      }else{
        if($where_dieukien!=""){
        $this->db->where($where_dieukien);
        }
      }
      if($like!=''){
         $this->db->like($like); 
         }
      if($where_noibang!=""){
        foreach ($where_noibang as $join)
        {
        $this->db->join($join['key'], $join['where']);
        }
      }
        if($group_by!=""){
        $this->db->group_by($group_by); 
        }
        if($order_by!=""){
        $this->db->order_by($order_by);
        }
        
        if($per!=""){
        $this->db->limit($per,$start);
        }
        $query = $this->db->get($table);
        
          if($query->num_rows()!=0){
            return $query->result_array();
          }
          else{
            return FALSE;
          } 
    }
    //tim du lieu theo ID hoac theo ten
    function TimKiem($table,$tukhoa,$TimTheo,$where_dieukien="") 
    { 
        if($where_dieukien!=""){
        $this->db->where($where_dieukien);
        }
        $this->db->like("$TimTheo", $tukhoa); 
        $query = $this->db->get($table);
        
          if($query->num_rows()!=0){
            return $query->result_array();
          }
          else{
            $loai['userid']='false';
            return $loai;
          } 
    }
    function delContact($id) {
      $d = $this->db->where('IDContact', $id);
      $d = $this->db->delete('contact');
      // var_dump($d);die;
      return $d;
    }
}