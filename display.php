<!DOCTYPE html>
<html >
<head>
    
    <title>Display record</title>
    <style>
    
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
    th {
  background-color: #4CAF50;
  color: white;
}
    img{
        width=128px;
        height=128px;
    }
    th, td {
  padding: 20px;
  text-align: center;
  border-bottom: 1px solid #ddd;

}
table {
  border-collapse: collapse;
  width: 100%;
}
tr:hover {background-color:#f5f5f5;}
 
    </style>
</head>
<body>
<center>
<form action="" method="post" enctype="multipart/form-data">
<br><h1 class="text-warning text-center">List of users Record</h1>
<table>
<thead>
<tr>
<th>Id</th>
<th>Username</th>
<th>Password</th>
<th>IMAGE</th>
<th>UPDATE</th>
<th>DELETE</th>
</tr>
<?php
    $db = mysqli_connect("localhost", "root", "", "photos"); 
    $q= "select*from image";
    $query=mysqli_query($db,$q);
    while($res=mysqli_fetch_array($query)){
?>
<tr>
<td align="center"><?php echo $res['id'];?></td>
<td align="center"><?php echo $res['username'];?></td>
<td align="center"><?php echo $res['password'];?></td>
<td align="center"><?php echo "<img src='image/".$res['filename']."'>";?></td>
<td align="center"><button class="btn-primary btn"><a href="update.php?id=<?php echo $res['id'];?>" class="text-white">UPDATE</a></button></td>
<td align="center"><button class="btn-danger btn"><a href="delete.php?id=<?php echo $res['id'];?>" class="text-white">DELETE</a></button></td>
</tr>
<?php
    }
?>
</thead>
</table>
</form>
</center>
</body>
</html>