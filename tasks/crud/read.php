<?php
include'connect.php';
$cust = $connect->query("select * from custmers");  
?>
<html>
    <head>
        <title>View</title>
    </head>
<body style="text-align:center; padding-left:100px ;">
 <table style="margin:10px;  text-align: center;">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Age</th>
  </tr>
  <?php
while($row =$cust->fetch_assoc()){
    ?>
     <tr>
   <td><?php echo $row['ID'] ; ?></td> 
   <td><?php echo $row['name'] ; ?></td> 
   <td><?php echo $row['age'] ;?></td> 
     </tr>
 <?php } ?>
</table>   
</body>
</html>