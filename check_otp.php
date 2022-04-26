<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <title>Signup</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="register-form" action="" method="POST">
      <input type="number" placeholder="OTP" name="otp" required />
      <p id="verbose">Please try not to copy paste OTP from mail</p>
      <button type="submit">Verify</button>
    </form>
  </div>
</div>
</body>
</html>

<?php
session_start();
if(isset($_POST['otp'])){
  if ($_SESSION['otp'] == $_POST['otp']) {
    header("Location: set_pass.php");
  }
  else{
    $str = "
	          <script type='text/javascript'>
		        Swal.fire(
                'Oops!',
                'Invalid OTP!',
                'error'
                ).then(function() {
                window.location.href = 'check_otp.php';
                })
	            </script>
			";
      echo $str;
  }
}
?>
