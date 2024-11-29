<?php
include "connection.php";
    if (isset($_POST['update'])) {
        $firstName  = $_POST["firstName"];
        $lastName   = $_POST["lastName"];
        $email      = $_POST["email"];
        $mobileNo   = $_POST["mobileNo"];
        $age        = $_POST["age"];
        $address    = $_POST["address"];
        
        $sql = "UPDATE `myProfile` SET `firstName`='$firstName', `lastName`='$lastName',`email`='$email',`mobileNo`='$mobileNo',`age`='$age',`address`='$address'
         WHERE `profileId`='$profileId'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
            echo "Details updated successfully!";
            header('Location: donorDashbaord.html');
        }else{
            echo "Error:" . $sql . "<br>" . $conn->error;
        }

    }

if (isset($_GET['profieId'])) {
    $profieId = $_GET['profieId'];
    $sql = "SELECT * FROM myProfile WHERE profieId='$profieId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $profieId   = $row['profieId'];
            $firstName  = $row['firstName'];
            $lastName   = $row['lastName'];
            $email      = $row['email'];
            $mobileNo   = $row['mobileNo'];
            $age        = $row['age'];
            $address    = $row['address'];
        }
?>

<!Doctype html>
<body>
<form action="" method="post">
<h1>My Profile</h1>
<div class="mb-3">
  <label for="firstName" class="form-label">First Name</label>
  <input type="firstName" class="form-control" id="firstName" value="<?php echo $firstName; ?>">
</div>
<div class="mb-3">
  <label for="lastName" class="form-label">Last Name</label>
  <input type="lastName" class="form-control" id="lastName" value="<?php echo $lastName; ?>">
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email Address</label>
  <input type="email" class="form-control" id="email" value="<?php echo $email; ?>"> 
</div>
<div class="mb-3">
  <label for="mobileNo" class="form-label">Mobile No</label>
  <input type="mobileNo" class="form-control" id="mobileNo" value="<?php echo $mobileNo; ?>"> 
</div>
<div class="mb-3">
  <label for="age" class="form-label">Age</label>
  <input type="age" class="form-control" id="age" value="<?php echo $age; ?>"> 
</div>
<div class="mb-3">
  <label for="address" class="form-label">Home Address</label>
  <input type="address" class="form-control" id="address" value="<?php echo $address; ?>"> 
</div>
<button type="submit" class="btn btn-primary" name="submit">Update</button>

</form>
</body>
</html>

<?php
    } else{
        header('Location: donorDashboard.html');
    }
}
?>