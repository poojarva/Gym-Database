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
/*      top:0; */
/*      right:0; */
       top:50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%); 
 }
 
#body {
  background-image: url('background.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}

.background {
background-image: url('background.png');
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

.button-78 {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 24px;
  margin: 0;
  min-height: 64px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-78 {
    padding: 19px 32px;
  }
}

.button-78:before,
.button-78:after {
  border-radius: 80px;
}

.button-78:before {
  background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.button-78:after {
  background-color: initial;
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.button-78:hover:not(:disabled):before {
  background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
}

.button-78:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
  opacity: 0;
}

.button-78:active:not(:disabled) {
  color: #ccc;
}

.button-78:active:not(:disabled):before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
}

.button-78:active:not(:disabled):after {
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.button-78:disabled {
  cursor: default;
  opacity: .24;
}
</style>


    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<?php require_once('connection-employee.php'); ?>

<body class="background">
<button><a href="logout.php">Log Out</a></button>

<div class="container-fluid mt-3 mb-3">
    <ul>
    <center> <button class="button-78"><a href="classes-employee.php">Change the Classes</a></button> </center>
  </br> 
    </br> 
    <center> <button class="button-78"><a href="rooms-employee.php">Change the Rooms</a></button> </center>
  </br> 
    </br> 
    <center> <button class="button-78"><a href="courts-employee.php">Change the Courts</a></button> </center>
  </br> 
    </br> 
    <center> <button class="button-78"><a href="member.php">Change the Members</a></button> </center>
  </br> 
    </br> 
    </ul>
</div>

</body>
</html>