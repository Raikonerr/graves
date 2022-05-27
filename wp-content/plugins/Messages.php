<?php

global $wpdb;
$tablename = $wpdb->prefix."shaco";
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$id);
}
?>
<h1>Messages</h1>

<table width='100%' border='1' style='border-collapse: collapse;'>
  <tr>
   <th>Id</th>
   <th>email</th>
   <th>Subject</th>
   <th>Message</th>
   <th>&nbsp;</th>
  </tr>
  <?php

  $messagesLists = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
  if(count($messagesLists) > 0){
    $count = 1;
    foreach($messagesLists as $message){
      $id = $message->id;
      $email = $message->email;
      $subject = $message->subject;
      $message = $message->message;

      echo "<tr>
      <td>".$count."</td>
      <td>".$email."</td>
      <td>".$subject."</td>
      <td>".$message."</td>
      <td><a href='?id=".$id."'>Delete</a></td>
      </tr>
      ";
      $count++;
   }
 }else{
   echo "<tr><td colspan='5'>No Messages</td></tr>";
 }
?>
</table>



<style>
  .header{
    font-size: 20px;
    font-weight: bold;
    text-align: start;
  }
  table{
    width: 100%;
    border-collapse: collapse;
  }
  table, th, td{
    border: 1px solid #006699;
  }
  th, td{
    padding: 10px;
  }
  tr:nth-child(even){
    background-color: #dddddd;
  }
  tr{
    background-color: #006699;
    color: #000000;
  }
  
</style>