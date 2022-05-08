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

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php require_once('connection-member.php'); ?>

<body>

<button><a href="logout.php">Log Out</a></button>

<div class="container-fluid mt-3 mb-3">
    <ul>
  <li><a href="classes.php">Basic information about classes</a></li>  
   <li><a href="rooms.php">Basic information about rooms</a></li> 
  
    </ul>
</div>

</body>
</html>