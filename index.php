<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style>
    body{
        background-color: lightblue;
    }
    input{
        width:50%;
        height:5%;
        border:1px;
        border-radius:05px;
        padding:8px 15px 8px 15px;
        margin:10px 0px 15px 0px;
        box-shadow:1px 1px 2px 1px grey;
        font-weight:bold;
    }
    h1{
        font-size:23px;
        
    }
    </style>
</head>
<body>
    <br><div id="content" align="left-center">
        <h1>Upload Image</h1>
        <form method="POST" action="" enctype="multipart/form-data">
            <label>username:</label><br>
            <input type="text" name="username" /><br>
            <label>password:</label><br>
            <input type="password" name="password" /><br>
            <label> Upload Profile pic:</label><br>
            <input type="file" name="uploadfile" value="" /><br>

            <div>
                <button type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
error_reporting(0); 
?> 
<?php 
  $msg = ""; 
  
  // If upload button is clicked ... 
  if (isset($_POST['upload'])) { 
    $username=$_POST['username'];
    $password=$_POST['password'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
        $folder = "image/".$filename; 
          
    $db = mysqli_connect("localhost", "root", "", "photos"); 
  
        // Get all the submitted data from the form 
        $sql="INSERT INTO `image`(`username`, `password`, `filename`) VALUES ('$username','$password','$filename')";
        // Execute query 
        mysqli_query($db, $sql); 
          
        // Now let's move the uploaded image into the folder: image 
        if (move_uploaded_file($tempname, $folder))  { 
            $msg = "Image uploaded successfully"; 
        }else{ 
            $msg = "Failed to upload image"; 
      } 
  } 
  $result = mysqli_query($db, "SELECT * FROM image"); 
?> 