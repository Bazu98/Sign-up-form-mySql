<?php    
include 'crud.php';  
$object = new Crud();  

if($_POST["action"] == "Load")  {  
     echo $object->get_data_in_table();  
}  
if($_POST["action"] == "Submit")  { 
     $object ->put_data_in_table($_POST['first_name'], $_POST['last_name'],$_POST['email']);
}

if($_POST["action"] == "Delete") {
     $object ->delete_data_by_id($_POST['id']);
}
?>  