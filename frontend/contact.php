<?php
include '../backend/pages/conn.php';
 $msg_content_title=$msg_content_category=$msg_content_description=$msg_content_order=$message_contact="";
            if (isset($_REQUEST['btn_contact'])) {
                 echo  $name=$_REQUEST['name'];
                 echo $gmail=$_REQUEST["gmail"];
                echo  $message=$_REQUEST["message"];
                    $insert_contact=mysqli_query($conn,"INSERT INTO contact(name,gmail,message) VALUES('$name','$gmail','$message')");
                    if ($insert_contact==TRUE) {
                      $message_contact='<div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Success</strong> Your message has been sent 
                    </div>';
                    }
                    else{
                      $message_contact='<div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Failed</strong>Your message has not been sent
                    </div>'.$conn->error;
                    }   
            }

            ///Update menu_item
            // if (isset($_REQUEST['get_content_id'])) {
            //   $get_content_id=$_REQUEST['get_content_id'];
            //     if (isset($_REQUEST['btn_edit_content'])) {
            //         $content_title=$_REQUEST['content_title'];
            //         $content_menu=$_REQUEST["content_menu"];
            //         $content_description=$_REQUEST["detail"];
            //         $content_order=$_REQUEST["content_order"];
            //         $update_content=mysqli_query($conn,"UPDATE content SET content_title='$content_title',content_menu='$content_menu',content_description='$content_description',content_order='$content_order' WHERE content_id=$get_content_id");
            //       if ($update_content==TRUE) {
            //         $message_content='<div class="alert alert-success alert-dismissible">
            //         <button type="button" class="close" data-dismiss="alert">&times;</button>
            //         <strong>Success</strong> Your data has been updated
            //       </div>';
            //       }
            //       else {
            //         $message_content='<div class="alert alert-danger alert-dismissible">
            //         <button type="button" class="close" data-dismiss="alert">&times;</button>
            //         <strong>Failed</strong> Your data has note been updated
            //       </div>';
            //       }
            //     }
            //     $sqlselect="SELECT*FROM content WHERE content_id=$get_content_id";
            //     $qrselect = $conn->query($sqlselect);
            //     $rowselect = $qrselect->fetch_assoc();
            // }
            // else {
            //   $rowselect=array('content_title'=>'','content_menu'=>'','content_description'=>'','content_order'=>'');
            // }
?>
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title text-center">
      <h2>Contact Form</h2>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
    </div>
    <?php
      echo $message_contact;
    ?>
    <div class="col-md-10 col-md-offset-1">
      <form  method="post">
        <div class="row">
          <div class="col-md-6">
            <input type="text" name="name" required="" placeholder="Name" class="form-control">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="gmail" name="gmail" required="" placeholder="Gmail" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-group">
         
        </div>
       
      <button type="submit" class="btn btn-primary" name="btn_contact">Send Message</button>
      </form>
    </div>
  </div>
</div>