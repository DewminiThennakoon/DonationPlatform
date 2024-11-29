​<?php
include "connection.php";
if (isset($_GET['eventId'])) {
    $eventId = $_GET['eventId'];
    $sql = "DELETE FROM events WHERE eventId ='$eventId'";
     $result = $conn->query($sql);
     if ($result == TRUE) {
        echo '<script>
        window.alert("Successfully deleted event from the list!");
        window.location.href = "eventManage.php"
        </script>';
    }else{
        echo '<script>
        window.alert("Error!Failed to delete the event");
        window.location.href = "eventManage.php"
        </script>';
    }
}
?>