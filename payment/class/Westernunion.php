<?php

include_once 'db.php';

class Westernunion{


	   private $db;
     public function __construct(){
        $this->db = new db();
     } 

     public function updatewuinfo($fullname,$address,$state,$postcode,$country,$tel){

          if (empty($fullname) || empty($address ) || empty($state) || empty($postcode) || empty($country) || empty($tel)) {
           
                $msg= "<div style='font-weight:bold;margin-top: 10px'; class='alert alert-danger'>
                <strong>Error!</strong> Field must not be empty !</div>";
                return $msg;

          }else{
               $id = 1; 
               $query = "UPDATE
               wu_info
               SET 
               fullname = '$fullname', 
               address = '$address', 
               state = '$state', 
               postcode = '$postcode', 
               country = '$country',
               tel = '$tel'
                WHERE id='$id'";
               $updated_row = $this->db->update($query);
               if ($updated_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> western union data updated succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> western union data not updated ! </div>";
                    return $msg;
               }
          }//end else

     }//end method


     public function readDatafromwu(){
        
        $id = 1;
        $query = "SELECT * FROM wu_info WHERE id='$id'";
        $selected_row = $this->db->select($query)->fetch_assoc();
        return $selected_row; 
     }   




     







 public function validation($data){
      $data = trim($data);
      $data = stripcslashes($data);
      $data = htmlspecialchars($data);
      return $data;
 }


     

}//end class

?>