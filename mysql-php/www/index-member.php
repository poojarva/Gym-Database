<html>
<head>
<title>Gym Database Members</title>
<?php require_once('header.php'); ?>
<style>
button {
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
 
body {
  background-image: url("assets/images/halls/background.webp");
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

.block {
  display: block;
  width: 60%;
  border: none;
  background-color: #ADD8E6;
  padding: 14px 28px;
  font-size: 25px;
  cursor: pointer;
  text-align: center;
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
  <button class="block"><a href="classes.php">Basic information about classes</a></button>  
  <button class="block"><a href="rooms.php">Basic information about rooms</a></button> 
  
    </ul>
</div>

</body>
</html>