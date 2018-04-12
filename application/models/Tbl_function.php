<?php

class Tbl_function extends CI_Model
{
	
  function get_name_from_id($id,$tblname,$match_fld,$return_fld)
  {
      $sql="SELECT * FROM $tblname WHERE $match_fld='$id'";
      $query = $this->db->query($sql);
      //echo $this->db->last_query();
      $row = $query->row(); 
      $Result_No = $this->db->count_all($tblname);
    
      if($Result_No>0)
      {
      $NAME = $row->$return_fld;
          return $NAME;exit;
      }
      else
      {
          return false;
      }

  }


  function is_Exist($tblname,$fldname,$checkvalue)
  {
  $CHECK="SELECT * FROM $tblname WHERE $fldname='$checkvalue'";

    $EXEC_CHECK=@$this->db->query($CHECK);
    //echo $this->db->last_query();exit;
    $rowcount =$EXEC_CHECK->num_rows();
    if($rowcount>0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
    function select_one_row($table,$return_field,$where)
   {
     $this->db->select($table.'.'.$return_field)->from($table);
     $this->db->where($where);
     $query = $this->db->get();
     //echo $this->db->last_query();exit;
     return $query->row();
   }
   function delete($table,$field,$id){
      $this->db->where($field, $id);
      $this->db->delete($table);
      return $this->db->affected_rows();
   }


  
  

}


?>