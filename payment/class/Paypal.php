<?php

include_once 'db.php';

class Paypal{


	   private $db;
     public function __construct(){
        $this->db = new db();
     } 

     public function updatepaymentinfo($fname,$lname,$address,$district,$division,$phone){

          if (empty($fname) || empty($lname ) || empty($address) || empty($district) || empty($division) || empty($phone)) {
           
                $msg= "<div style='font-weight:bold;margin-top: 10px'; class='alert alert-danger'>
                <strong>Error!</strong> Field must not be empty !</div>";
                return $msg;

          }else{
               $id = 1; 
               $query = "UPDATE
               paypal_info
               SET 
               fname = '$fname', 
               lname = '$lname', 
               address = '$address', 
               district = '$district', 
               division = '$division',
               phone = '$phone'
                WHERE id='$id'";
               $updated_row = $this->db->update($query);
               if ($updated_row) {
                  
                   $msg= "<div style='font-weight:bold'; class='alert alert-info'>
                      <strong>success !</strong> payment data updated succesfully </div>";
                   return $msg;

               }else{

                     $msg= "<div style='font-weight:bold'; class='alert alert-danger'>
                      <strong>Error!</strong> payment data not updated ! </div>";
                    return $msg;
               }
          }//end else

     }//end method


     public function readDatafrompaypal(){
        
        $id = 1;
        $query = "SELECT * FROM paypal_info WHERE id='$id'";
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