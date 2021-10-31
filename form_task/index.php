<html>
<head>
<title>Contact Form</title>
<link rel="stylesheet" href="style.css" >
<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
<?php
$time = $_SERVER['REQUEST_TIME'];

/**
* for a 30 minute timeout, specified in seconds
*/
$timeout_duration = 30;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;
?>
</head>
<body>



<div class="Contact-form" width = "80%">
<h2>Contact us</h2>
<form id="frmContact" action="varify_captcha.php" method="POST" novalidate="novalidate">
<table border="0" width="80%">
<tr>
<td width="30%">
Name: <br></td>
<td width=70%>
   <input type="text" name="name" placeholder="Name" required>
</td> 
</tr>
<tr>
<td>
Email: <br>
</td>
<td>
   <input type="text" name="email" placeholder="Email" required>
</td>
</tr>
<td>
Date of Birth: <br>
</td>
<td>
   <input type="text" name="dob" placeholder="d-o-b" required><br>
</td>
</tr>
<td>
Please mention about yourself :
</td>
<td>
   <textarea name="about_yourself" placeholder="About yourself" required> </textarea>
</td>
</tr>
<td>
Please verify the captcha :
</td>
<td>
<div class="g-recaptcha" data-sitekey="6LfZwQYdAAAAALq2Q7OyWtCjc9nEckyu9-vT1nGS"></div>
</td>
</tr>
<tr>
<td colspan="2">
   <input type="submit" name="submit" value="save Details" class="submit-btn">
</td>
</tr>
</table>
 </div>

   </body>
   </html>
   