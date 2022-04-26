<?php
    include "connection.php";
    session_start();
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
    $email = $_SESSION['email'];
    $password = $_POST['pass'];
    $cpasword = $_POST['cpass'];
    $rpass="";
    $sql="SELECT password FROM useracc WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $rpass= $row['password'];
        }
    }
    
    if($rpass==null){
        if ($password==$cpasword){
            $sql="INSERT INTO useracc VALUES ('$email','$password')";
            $result = mysqli_query($conn,$sql);
            if ($result){
                $str = "
	                <script type='text/javascript'>
		            Swal.fire(
                    'Success',
                    'Account Created Successfully',
                    'success'
                    ).then(function() {
                    window.location.href = 'index.php';
                    })
	                </script>
			    ";

                echo $str;
            }
        }
        else{
            $str = "
	            <script type='text/javascript'>
		        Swal.fire(
                'Oops!',
                'Password not matched!',
                'error'
                ).then(function() {
                window.location.href = 'set_pass.php';
                })
	            </script>
			";
            echo $str;
        }
    }
    else{
        if ($password==$cpasword){
            $sql="UPDATE useracc set password='$password' WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            if ($result){
                $str = "
	                <script type='text/javascript'>
		            Swal.fire(
                    'Success',
                    'Password Changed Successfully',
                    'success'
                    ).then(function() {
                    window.location.href = 'index.php';
                    })
	                </script>
			    ";
                echo $str;
            }
        }
        else{
            $str = "
	            <script type='text/javascript'>
		        Swal.fire(
                'Oops!',
                'Password not matched!',
                'error'
                ).then(function() {
                window.location.href = 'set_pass.php';
                })
	            </script>
			";
            echo $str;
        }

    }


?>