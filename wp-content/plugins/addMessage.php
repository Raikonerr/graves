<?php

global $wpdb;
if(isset($_POST['submit'])){


  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  $tablename = $wpdb->prefix."shaco";

  if($first != '' && $last != '' && $email != '' && $subject != '' && $message != ''){
     $data = $wpdb->get_results("SELECT * FROM ".$tablename." WHERE email='".$email."' ");
     if(count($data) == 0){
       $insert = "INSERT INTO ".$tablename."(first,last,email,subject,message) values('".$first."','".$last."','".$email."','".$subject."','".$message."') ";
       $wpdb->query($insert);
       echo "Sent sucessfully.";
     }
   }
}

?>


<h1 class="header">Add New Message</h1>
<form method='post' action=''>
  
  <input type='text' id="first" name='first' placeholder="firstname .."> <br><br>
  <input type='text' id="last" name='last' placeholder="lastname .."> <br><br>
    <input type='email' id="email" name='email' placeholder="Email .."> <br><br>
    
    <input type='text' id="subject" name='subject' placeholder="Subject .."><br><br>
 
 
    <input type='text' id="mssg" name='message' placeholder="Message .."><br><br>

     <span>&nbsp;</span>
     <input type='submit' name='submit' value='Send'>
 

</form>


<script >
  

  var first = document.getElementById('first');
  const first_display = localStorage['first'];
  first.style.display = first_display;

  var last = document.getElementById('last');
  const last_display = localStorage['last'];
  last.style.display = last_display;

  var email = document.getElementById('email');
  // var input_fname = document.getElementById('input_fname');
  const email_display = localStorage['email'];
  email.style.display = email_display;
  // input_fname.removeAttribute('required');
  var subject = document.getElementById('subject');
  // var input_fname = document.getElementById('input_fname');
  const sub_display = localStorage['subject'];
  subject.style.display = sub_display;
  var mssg = document.getElementById('mssg');
  // var input_fname = document.getElementById('input_fname');
  const mssg_display = localStorage['message'];
  mssg.style.display = mssg_display;
</script>


<style>
.header{
  text-align: center;
  font-size: 30px;
  font-weight: bold;
  color: #006699;
}
input{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



</style>