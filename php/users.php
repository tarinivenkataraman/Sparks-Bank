<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *{
        margin:0px;
        padding:0px;
        font-family: 'Times New Roman', Times, serif;
    }
    body{
        min-height: 100vh;
    }
    footer{
    background-color:#333;
    margin-bottom: 0px;
}
footer p{
    color:white;
    text-align: center;
    padding:5px;
}
    
    .tableval{
        margin-top:100px;
    }
    .users h1, p{
        margin-top:10px;
        text-align:center;
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
        tr{
            text-align:left;
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
            .tableval{
                margin-top:20px;
             }
             .users h1{
        text-align:center;
        font-size:20px;

    }
    p{
        font-size:11px;
    }
        table{
            width:100%;
            color: #588c7e;
            
            text-align:center;
            padding:15px;
        }
        th{
            background-color: #588c7e;
            color: white;
            padding:1px;
            max-width:100px;
            text-align:center;
            font: size 16px;
            font-weight:700;
        }
        tr{
            text-align:left;
            font-size:11px;
            margin-left:5px;
        }
        hr {
            width: 700px;
            color: #f9e506;
        }
        @media screen and (max-width: 300px){
            .tableval{
                margin-top:10px;
             }
             .users h1{
        text-align:center;
        font-size:15px;
    }
    p{
        font-size:7px;
    }
        table{
            width:100%;
            color: #588c7e;
            
            text-align:center;
            padding:5px;
        }
        th{
            background-color: #588c7e;
            color: white;
            padding:1px;
            max-width:100px;
            text-align:center;
            font: size 7px;
            font-weight:1px;
        }
        tr{
            text-align:left;
            font-size:9px;
        }
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
    <div class="users">
        <H1>Our Customers from all across the Country.</H1>
        
        <p>We provide our users with a wide range of facilities and features which enables them to bank, shop and transfer funds in one CLICK!</p>
    </div>
    <div class="tableval">
    <center>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Account Balance(in Indian currency)</th>
        </tr>
        <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "banking";

     // Create a connection
     $conn = mysqli_connect($servername, $username, $password, $database);
     if($conn->connect_error)
     {
        die("Connection Failed:".$conn->connect_error);
     }
     $sql="SELECT fname,lname,balance from registration";
     $result=$conn->query($sql);
     if($result->num_rows>0)
     {   
        while($row=$result->fetch_assoc()){
            echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td><td>".$row["balance"]."</td></tr>";
        }
        echo "</table>";
     }
     else{
        echo "No User Login Yet";
     }
    
     $conn->close();
     ?>
    </table>
    </center>
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
</body>
</html>