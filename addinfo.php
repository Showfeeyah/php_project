
<!DOCTYPE html>
<html>
<head>
<title>Add data</title>
<style type="text/css">
   #content{
   	width: 100%;
   	margin: auto;
    margin-left: 20px;
   }
   form{
   	width: 100%;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   .gallery{
     padding-top: 20px;
     float: left;
     width:20%;
     height:200px;
   }
  

</style>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
        <div class="col-lg-4 m-auto d-block">
          <div class="form_main ">
             <h4 class="heading text-center "><strong>Add</strong> Data:<span></span></h4>
              <form method="POST" action="#" enctype="multipart/form-data" class="text-center">
              	<input type="hidden" name="size" value="1000000" class="form-control">
                 <div> <input type="text" name="full_name" placeholder="Enter your full name" class="form-control" required> </div>
                  <div><input type="text" name="per_adderess" placeholder="Enter your permanent address" class="form-control" required></div>
                  <div><input type="text" name="temp_address" placeholder="Enter your temporary address" class="form-control" required></div>
              	<div><input type="number" name="contact_no" placeholder="Enter your contact address" class="form-control" required><div> 
              		<div><input type="email" name="email" placeholder="Enter your email address" class="form-control" required><div>
                  		<input type="file" name="image" class="form-control" required></div>
              	</div>
              	<br>
                <div>
              	<button type="submit" name="upload" class="btn btn-success">Add</button>
              <button type="submit" name="view" class="btn btn-success" ><a href="detailpage2.php">Add Details</button></a>
                  </div>
               </form>
         </div>
        </div>
      </div>
      <br><br>
       <table class="table  table-striped" >
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                       <th>Permanent Address</th>
                        <th>temp address </th>
       					<th>contact</th>
                        <th>email </th>
                        <th>Profile pic</th>
      
                    </tr>


</body>
</html>


<?php
  // Create database connection
//  $db = mysqli_connect("localhost", "root", "", "CMS");
 
  $con = new mysqli("localhost", "root", "","php_project");

//include('db.php');
  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$full_name = mysqli_real_escape_string($con, $_POST['full_name']);
  	$per_adderess = mysqli_real_escape_string($con, $_POST['per_adderess']);
    $temp_address=mysqli_real_escape_string($con, $_POST['temp_address']);
    $email=mysqli_real_escape_string($con, $_POST['email']);
     $contact=mysqli_real_escape_string($con, $_POST['contact_no']);
  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO details (full_name, per_address,temp_address,contact,email,profile_pic) VALUES ( '$full_name','$per_adderess','$temp_address','$contact','$email',' $target')";
  	// execute query
   // echo "<meta http-equiv='refresh' content='3'>";
  	mysqli_query($con, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
  }
///refresh page in 3 sec to view image id
 /*echo "<meta http-equiv='refresh' content='15'>";*/
   
//display data in table to view the image id ------------image id must be same in detail page 
      $que="SELECT e_id,full_name, per_adderess,temp_address,contact,email,profile_pic from details ";
        $result2=mysqli_query($con,$que);

      while ($row2=mysqli_fetch_array($result2)){
     echo '<tr>';
     echo '<div><h4><td>'; echo $row2['id']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['full_name']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['per_adderess']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['temp_address']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['contact']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['email']; echo '</td></h4></div>';
     echo '<div><h4><td>'; echo $row2['profile_pic']; echo '</td></h4></div>';
     echo '</tr>';?>
        </div>
    </div>
    <br>
    <?php } ?>
    </table>

