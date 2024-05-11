<?php
include("conn.php");

$id = isset($_GET["id"]) ? $_GET["id"] : null;
$type = isset($_GET["type"]) ? $_GET["type"] : null;
$email = isset($_GET["email"]) ? $_GET["email"] : null;
$name = isset($_GET["name"]) ? $_GET["name"] : null;



if ($id !== null) {
    switch ($type) {
        case "publish":
            $statuscode = "1";
            $sql = "UPDATE users SET published = $statuscode WHERE id=$id";
             // Send email
             $to = $email;
             $subject = "Hello $name, Your account has been published";
             $message = "Your account has been published.";
             $headers = "From: hello@ugc-craft.com";

             if (mail($to, $subject, $message, $headers)) {
                 echo "Email sent successfully. ";
             } else {
                 echo "Error sending email. ";
             }
         } else {
             echo "Error retrieving email address from the database. ";
         }


            break;
        case "pause":
            $statuscode = "0";
            $sql = "UPDATE users SET published = $statuscode WHERE id=$id";
            break;
        case "delete":
            $sql = "DELETE FROM users WHERE id=$id";
            break;
        default:
            echo "Invalid action type";
            exit; // Stop further execution
    }

    if ($conn->query($sql) === TRUE) {
        if ($type === "delete") {
            echo "Record deleted successfully";
        } else {
            echo "Record updated successfully";
        }
    } else {
        if ($type === "delete") {
            echo "Error deleting record: " . $conn->error;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
} else {
    echo "ID parameter is missing";
}


?>