<?php
//check if the form in a submission
if($_SERVER["REQUEST_METHOD"] == "POST") {          
  // Include database connection file
  include 'connection.php';     
  $name       = $_POST["name"];
  $email      = $_POST["email"]; 
  $password   = $_POST["password"];  
  $cpassword  = $_POST["cpassword"];
  //select data from the database
  $sql = "Select * from user_signup where email='$email'"; 
  $result = mysqli_query($conn, $sql); 
  $num = mysqli_num_rows($result);    
  if($num == 0) { 
    //check if the passwords are same
    if(($password == $cpassword) ) { 
        $hash = password_hash($password, PASSWORD_DEFAULT); 
        //Insert data to the database             
        $sql = "INSERT INTO `user_signup` ( `name`,  `email`, `password`) VALUES ('$name', '$email' , '$hash')"; 
        $result = mysqli_query($conn, $sql); 
        echo '<script> 
        alert("Your account is created!");
        </script>';
      }
      else{
       echo '<script> 
        alert("Passwords do not match!");
        window.location.href = "donorSignup.php";
        </script>';
      }
    }
    else{
     echo '<script> 
      alert("Name is already existed!");
      window.location.href = "donorSignup.php";
      </script>';
      }
    }         
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Page</title>
    <!--Bootstrap link CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel ="stylesheet" href="style1.css">
    <link rel ="stylesheet" href="home.css">
    <style>
      .background-image {
        background-image: url("formImage.jpg"); 
        min-height: 380px;
        background-position: center;
        background-repeat: no-repeat;
        background-size:cover;
        position: relative;
      }

    </style>
  </head>
  <body>
 
<!--navbar-->
  <!--add logo-->
  <div class="navbar">
    <div class="logo">
    <img src="logo.PNG" alt="logo">
    </div>

  <ul class="nav  nav-underline justify-content-end">
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="home.html">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="aboutUs.html">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="contactUs.php">Contact Us</a>
  </li>
</ul>
</div>

<!--form start-->
<div class="background-image">
    <form action="" method="post">
        <h1> Sign Up</h1>
        <div class="mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
            </svg>
              <label for="InputName" class="form-label">Name</label>
          <input type="name" class="form-control" id="InputName" name="name" required>
        </div>
        <div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
              </svg>
              <label for="InputEmail" class="form-label">Email address</label>
          <input type="email" class="form-control" id="InputEmail" name="email" required>
        </div>
        <div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
          </svg>
          <label for="InputPassword" class="form-label">Password</label>
          <input type="password" class="form-control" id="InputPassword" name="password" required>
        </div>
        <div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
          </svg>
          <label for="InputCPassword" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" id="InputCPassword" name="cpassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
</div>

      <!--Footer Start-->
     <br><br><br>
     <div class="footer">
         <br><br><br><br><br>
         <div class="container-fluid">
             <div class="row">
                 <div class="col-lg-3 col-md-6">
                     <div class="footer-widget">
                        
                         <div class="contact-info">
                             <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                              <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>Address:17, Nawam Mawatha, Colombo</p>
                             <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                              <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                            </svg>Email: give.ease@gmail.com</p>
                             <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                            </svg>Mobile No: 0118739472</p>
                         </div>
                     </div>
                 </div>
                 
                 <div class="col-lg-3 col-md-6">
                     <div class="footer-widget">
                         <h2>Follow Us</h2>
                         <div class="contact-info">
                             <div class="social">
                                 <a href=""><i class="fab fa-twitter"></i></a>
                                 <a href=""><i class="fab fa-facebook-f"></i></a>
                                 <a href=""><i class="fab fa-linkedin-in"></i></a>
                                 <a href=""><i class="fab fa-instagram"></i></a>
                                 <a href=""><i class="fab fa-youtube"></i></a>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-3 col-md-6">
                     <div class="footer-widget">
                         <h2>Info</h2>
                         <ul>
                             <li><a href="aboutUs.html">About Us</a></li>
                             <li><a href="privacyPolicy.html">Privacy Policy</a></li>
                             <li><a href="term&conditions.html">Terms & Condition</a></li>
                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                      <div class="logo">
                        <img src="logo.PNG" alt="logo">
                        </div>
                    </div>
                </div>
             </div>
         </div>
     </div>

     <!--Footer End-->
      <!--Bootstrap link JS-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>