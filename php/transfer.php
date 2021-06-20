<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!--jQuery library-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--Latest compiled and minified JavaScript-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transfer</title>
    <style>
    *{
        padding: 0px;
        margin: 0px;
        font-family: 'Times New Roman', Times, serif;
    }
    table: hover{
        cursor: pointer;
    }
    table{

         width:100%;
         color: #588c7e;
         font-size: 25px;
         text-align:center;
           margin-top:30px;
    }
    .container  h1{
        text-align: center;
        font-size: 35px;
        font-weight: 900;
    }
    .container p{
        text-align:center;
        font-size: 24px;
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
        tr{
            text-align:center;
            font-size:16px;
        }
        tr:nth-child(even){
            background-color:#f2f2f2;
        }
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
@media screen and (max-width: 770px){
   
   #menubtn img{
       width: 10px;
       margin-top: 10px;
   }
   #menubtn{
       position: fixed;
       right: 20px;
       top: 10px;
       background-color: #588c7e;
       border-radius: 2px;
       width: 30px;
       height: 30px;
       text-align: center;
       z-index: 3;
       cursor: pointer;
   }   
}
      
</style>
</head>
<body>
    

<?php 
    $server="localhost";
    $username="root";
    $password="";
    $db="banking";
    
    $conn=mysqli_connect($server,$username,$password,$db);
    if($conn->connect_error)
        die("connection to this database failed due to " .mysqli_connect_error()); 
    $sql = "SELECT * FROM registration";
    $result = mysqli_query($conn,$sql);
?>
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

<div class="container">
        <h1>Transfer Money</h1>
        <p>We provide secure internet banking, which helps our customers make transaction easy and hassle-free!</p>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">First Name</th>
                            <th scope="col" class="text-center py-2">Last Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance(Indian Currency)</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['fname'] ?></td>
                        <td class="py-2"><?php echo $rows['lname']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['balance']?></td>
                        <td><a href="transaction.php?fname=<?php echo $rows['fname'] ;?>"> <button type="button" class="btn btn-success">Transact Money</button></a></td>  
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
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

</body>
</html>