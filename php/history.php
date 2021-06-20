<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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


	<div class="container">
        <h2 class="text-center pt-4" style="color : black;">Transaction History</h2>
        <p>View all the transactions made from different accounts through our bank.</p>
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead style="color : black;">
            <tr>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $sql ="select * from transaction";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr style="color : black;">
            
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<div id="sidenav">
        <nav>
            <ul>
                <li><a href="../main.html">HOME.</a></li>
                <li><a href="">ABOUT US.</a></li>
                <li><a href="">CONTACT US.</a>
                </li>
                <li><a href="php/users.php">OUR USERS.</a></li>
                <li><a href="">LOGIN.</a></li>
            </ul>
        </nav>
    </div>
    <div id="menubtn">
        <img src="../images/menu.png" alt="" id="menu">
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