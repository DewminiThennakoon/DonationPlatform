<?php
include "connection.php";
    if (isset($_POST['update'])) {
        $theme        = $_POST["theme"];
        $organization = $_POST["organization"];
        $location     = $_POST["location"];
        $date         = $_POST["date"];    
        $sTime        = $_POST["sTime"];
        $eTime        = $_POST["eTime"];
        $mobileNo     = $_POST["mobileNo"];   
     //update event details   
        $sql = "UPDATE `events` SET `theme` = '$theme', `organization` = '$organization', `location` = '$location' ,
         `date` =  '$date', `sTime` = '$sTime', `eTime` = '$eTime', `mobileNo` = '$mobileNo' 
        WHERE `eventId` = '$eventId'";
        $result = $conn->query($sql);
        if ($result == TRUE) {
          //Display success alert
            echo '<script>
            window.alert("Successfully updated event!");
            window.location.href = "eventManage.php"
            </script>';
        }else{
          //Display error alert
            echo '<script>
            window.alert("Error!Failed to updated the event");
            window.location.href = "eventManage.php"
            </script>';
        }

    }

    if (isset($_GET['eventId'])) {
        $eventId = $_GET['eventId'];
        $sql = "SELECT * FROM events WHERE eventId='$eventId'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theme          = $row['theme'];
                $organization   = $row['organization'];
                $location       = $row['location'];
                $date           = $row['date'];
                $sTime          = $row['sTime'];
                $eTime          = $row['eTime'];
                $mobileNo       = $row['mobileNo'];
            }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Event</title>
    <!--Bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <link href="home.css" rel ="stylesheet">

    <style>
      .background-image {
        background-image: url("formImage.jpg");    
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
    <a class="nav-link active" aria-current="page" href="home.html">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="aboutUs.html">About Us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="contactUs.php">Contact Us</a>
  </li>
  </ul>
  </div>

<div class="background-image">
<form action=" " method="post">
    <h1>Events</h1>
    <!--Event update form-->
    <label class="form-label">Theme</label><br>
    <input type="text" id="theme" name="theme" value="<?php echo $theme; ?>"><br>

    <label class="form-label">Organization Name</label><br>
    <input type="text" id="organization" name="organization" value="<?php echo $organization; ?>"><br>

    <label class="form-label">Location</label><br>
    <input type="text" id="location" name="location" value="<?php echo $location; ?>"><br> 

    <label class="form-label">Date</label><br>
    <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br><br>

    <label class="form-label">Start Time</label><br>
    <input type="time" id="sTime" name="sTime" value="<?php echo $sTime; ?>"><br><br>

    <label class="form-label">End Time</label><br>
    <input type="time" id="eTime" name="eTime" value="<?php echo $eTime; ?>"><br><br> 

    <label class="form-label">Mobile No</label><br>
    <input type="text" id="mobileNo" name="mobileNo" value="<?php echo $mobileNo; ?>"><br><br>

    <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</body>
</html>

<?php
    } else{
        header('Location: eventManage.php');
    }
}
?>

  