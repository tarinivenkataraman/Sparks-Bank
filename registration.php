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
    <title>registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .message{
            text-align:center;
            color:white;
            font-size:10px;
        }
        .img-responsive {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9)), url(images/bg2.jpg);
            background-position: center;
            background-size: cover;
            height: 100vh;
            width: 100vw;
            margin: 0px;
            opacity: 0.9;
            background-color: aliceblue;
            position: absolute;
        }

        .contact {
            margin-top: 50px;
        }

        .contact h1,
        p {
            color: white;
            font-weight: 700;
        }

        .entireform {
            margin-top: 50px;
        }

        .form-control {
            width: 600px;
            background: transparent;
            border: none;
            border-bottom: 2px solid #ae5e50;
            text-align: center;
            color: white;
        }

        form .btns {
            background-color: #ae5e50;
            color: white;
            font-weight: 600;
        }

        .btns:hover {
            background-color: #f9e506;
            border-bottom: none;
            font-weight: 700;
            cursor: pointer;
        }

        hr {
            width: 700px;
            color: #f9e506;
        }
        #sidenav{
    width: 250px;
    transition: 0.3s;
    height: 100vh;
    top: 0;
    right: -250px;
    position: fixed;
    background-color: #ae5e50;
    z-index: 2;
}
nav ul li{
    list-style: none;
    color: white;
    font-weight: 700;
    margin: 50px 20px;
}
#menubtn{
    position: fixed;
    right: 30px;
    top: 20px;
    background-color: #ae5e50;
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
nav ul li a{
    text-decoration: none;
    color: white;
}
nav ul li a:hover{
    text-decoration: none;
    color: aliceblue;
}
.submitmsg{
    color: green;
}

        @media screen and(width:1199px) {
            body {
                width: 1198px;
            }
        }

        @media screen and(width:991px) {
            body {
                width: 990px;
            }
        }

        @media screen and(width:768px) {
            body {
                width: 767px;
            }
        }
    </style>
</head>

<body>

    <div class="img-responsive">
        <div class="contact">
            <center>
                <h1>Welcome To Our Online registration Forum
                </h1>
                <p>Fill the form to join us on the journey of making Online transactions easy and convenient.</p>
                <hr>
            
            </center>
           
            <center>
                <form action="php/r1.php" method="POST" class="entireform">
                    <input type="text" name="fname" class="form-control" placeholder="Your First Name"><br>
                    <input type="text" name="lname" class="form-control" placeholder="Your Last Name"><br>
                    <input type="email" name="email" class="form-control" placeholder="Your EMail"><br>
                    <input type="number" name="due" class="form-control" placeholder="Your account balance"><br>
                    <input type="submit" name="name" class="form-control btns" value="Verify Your Submission!">

                </form>
            </center>
        </div>
    </div>
    <div id="sidenav">
        <nav>
            <ul>
                <li><a href="main.html">HOME.</a></li>
                <li>ABOUT US.</li>
                <li>CONTACT US.</li>
               <a href="php/users.php"> <li>OUR USERS.</li></a>
                <li>LOGIN.</li>
            </ul>
        </nav>
    </div>
    <div id="menubtn">
        <img src="images/menu.png" alt="" id="menu">
    </div>
  
    <script>
        var menubtn=document.getElementById("menubtn");
        var sidenav=document.getElementById("sidenav");
        var menu=document.getElementById("menu");
        menubtn.onclick= function(){
            if(sidenav.style.right =="-250px"){
                sidenav.style.right="0"
                menu.src="images/close.png";
            }
            else{
                sidenav.style.right="-250px";
                menu.src="images/menu.png";
            }
        }
    </script>
</body>

</html>
