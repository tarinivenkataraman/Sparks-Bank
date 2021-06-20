<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
           #sidenav{
    width: 250px;
    transition: 0.3s;
    height: 100vh;
    top: 0;
    right: -250px;
    position: fixed;
    background-color: #588c7e;
    z-index: 2;
}
        nav ul li{
    list-style: none;
    color: white;
    font-weight: 700;
    margin: 50px 20px;
}
nav ul li a{
    text-decoration: none;
    color: white;
}
nav ul li a:hover{
    text-decoration: none;
    color: aliceblue;
}
#menubtn{
    position: fixed;
    right: 30px;
    top: 20px;
    background-color: #588c7e;
    border-radius: 4px;
    width: 50px;
    height: 50px;
    text-align: center;
    z-index: 3;
    cursor: pointer;
}
#menubtn img{
    width: 20px;
    margin-top: 15px;
}
table{
            width:100%;
            color: #588c7e;
            font-size: 25px;
            text-align:center;
           
        }
        th{
            background-color: #588c7e;
            color: white;
            border:1px solid black;
            padding:2px;
            max-width:100px;
            text-align:center;
            font-size:20px;
            font-weight:900;
        }
        .btn{
            background-color: #588c7e;
        }

</style>

<body>
<?php
$server="localhost";
$username="root";
$password="";
$db="banking";

$conn=mysqli_connect($server,$username,$password,$db);
if(!$conn){
    die("connection to this database failed due to " .mysqli_connect_error()); //connection not establised
}
else{
    if(isset($_POST['submit'])){
        $from = $_GET['fname'];
        $to = $_POST['to'];
        $amount = $_POST['amount'];

        echo $from;
        echo $to;
        echo $amount;

        $temp = '"';
        $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$from.$temp;
        $sql = "SELECT * from registration where fname= $new_var_by_the_great_sourabh_verma_baad_me_party_dena";
        echo $sql;
        $query = mysqli_query($conn,$sql);
        $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

        $temp = '"';
        $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$to.$temp;
        $sql = "SELECT * from registration where fname=$new_var_by_the_great_sourabh_verma_baad_me_party_dena";
        $query = mysqli_query($conn,$sql);
        $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
        if (($amount)<0){
            echo '<script type="text/javascript">';
            echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
            echo '</script>';
        }


  
    // constraint to check insufficient balance.
        else if($amount > $sql1['balance']) {
            
            echo '<script type="text/javascript">';
            echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
            echo '</script>';
        }
    


    // constraint to check zero values
        else if($amount == 0){

            echo "<script type='text/javascript'>";
            echo "alert('Oops! Zero value cannot be transferred')";
            echo "</script>";
        }


    else {        
        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $temp = '"';
        $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$from.$temp;
        $sql = "UPDATE registration set balance=$newbalance where fname=$new_var_by_the_great_sourabh_verma_baad_me_party_dena";
        mysqli_query($conn,$sql);
        

        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $temp = '"';
        $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$to.$temp;
        $sql = "UPDATE registration set balance=$newbalance where fname=$new_var_by_the_great_sourabh_verma_baad_me_party_dena";
        mysqli_query($conn,$sql);
        
        $sender = $sql1['fname'];
        $receiver = $sql2['fname'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
                echo "<script> alert('Transaction Successful');
                                window.location='history.php';
                    </script>";
            
        }

        $newbalance= 0;
        $amount =0;
        }
    
}
}

?>

<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Make Transaction</h2>
            <?php
                include 'config.php';
                $sid=$_GET['fname'];
                $temp = '"';
                $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$sid.$temp;
                $sql = "SELECT * FROM  registration WHERE fname = $new_var_by_the_great_sourabh_verma_baad_me_party_dena";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                else{
                    $rows=mysqli_fetch_assoc($result);
                    echo $rows;
                }
                
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr style="color : black;">
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr style="color : black;">
                    <td class="py-2"><?php echo $rows['fname'] ?></td>
                    <td class="py-2"><?php echo $rows['lname'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['balance'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>
        <label style="color : black;"><b>Receiver:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'config.php';
                $sid=$_GET['fname'];
                $sid=$_GET['fname'];
                $temp = '"';
                $new_var_by_the_great_sourabh_verma_baad_me_party_dena = $temp.$sid.$temp;
                $sql = "SELECT * FROM registration where fname!=$new_var_by_the_great_sourabh_verma_baad_me_party_dena";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['fname'];?>" >
                
                    <?php echo $rows['fname'] ;?> 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
            <div class="text-center" >
                <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Make Transaction?</button>
            </div>
        </form>
    </div>



    <div id="sidenav">
        <nav>
            <ul>
                <li><a href="../main.html">HOME.</a></li>
                <li><a href="">ABOUT US.</a></li>
                <li><a href="">CONTACT US.</a>
                </li>
                <li><a href="users.php">OUR USERS.</a></li>
                <li><a href="">LOGIN.</a></li>
            </ul>
        </nav>
        <div id="menubtn">
        <img src="../images/menu.png" alt="" id="menu">
        </div>
</div>
<script>
        var menubtn = document.getElementById("menubtn");
        var sidenav = document.getElementById("sidenav");
        var menu = document.getElementById("menu");
        menubtn.onclick = function () {
            if (sidenav.style.right == "-250px") {
                sidenav.style.right = "0"
                menu.src = "../images/close.png";
            }
            else {
                sidenav.style.right = "-250px";
                menu.src = "../images/menu.png";
            }
        }
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>