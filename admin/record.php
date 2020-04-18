<?php
   include_once '../config/Database.php';

   header("Content-Type: application/json; charset=UTF-8");

   // Instantiate DB & connect
   $database = new Database();
   $db = $database->connect();
   $table = 'main';

   /* date_default_timezone_set("Singapore");
   $date = date("d/m/Y"); */

   // get the json string and decode it
   $json = file_get_contents('php://input');
   $data = json_decode($json);

   $query = 'INSERT INTO ' . $table . ' SET 
               date = :date,
               new_case = :new_case,
               recovered = :recovered,
               death = :death';

   $stmt = $db->prepare($query);
   $stmt->bindParam(':date', $data->date);
   $stmt->bindParam(':new_case', $data->cases);
   $stmt->bindParam(':recovered', $data->recovered);
   $stmt->bindParam(':death', $data->death);

   if ($stmt->execute()) {
      echo json_encode(201);
   } else {
      echo json_encode(400);
   }
   //echo json_encode($data->name);
?>