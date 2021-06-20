<?php
$insert=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $email = $_POST['email'];
    $balance=$_POST['due'];
            
    // Connecting to the Database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banking";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Die if connection was not successful
    if (!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{ 
    // Submit these to a database
    // Sql query to be executed 
    $sql = "INSERT INTO `registration` (`fname`, `lname`, `email`, `balance`) VALUES ('$fname', '$lname', '$email', $balance)";
    $result = mysqli_query($conn, $sql); 
    echo $result;
    if($result){
        echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
        <strong>Success!</strong> Your entry has been submitted successfully!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span class='errorClose' aria-hidden='true'>×</span>
        </button>
        </div>";
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
        <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span class='errorClose' aria-hidden='true'>×</span>
        </button>
        </div>";
        }
    }
}
?>