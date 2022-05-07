<html>
<head>
<title>Gym Database Members</title>
<?php require_once('header.php'); ?>
<style>
#button {
     line-height: 12px;
     width: 18px;
     font-size: 8pt;
     font-family: tahoma;
     margin-top: 1px;
     margin-right: 2px;
     position:absolute;
     top:0;
     right:0;
 }

</style>
</head>

<?php require_once('connection-employee.php'); ?>

<body>
<button><a href="logout.php">Log Out</a></button>

<div class="container-fluid mt-3 mb-3">
    <ul>
  <li><a href="classes.php">Basic information about classes</a></li>  
   <li><a href="rooms.php">Basic information about rooms</a></li> 
<li><a href="member.php">Information about members</a></li>  
  <!--  include information about employees and adding/dropping them -->
    </ul>
</div>

</body>
</html>