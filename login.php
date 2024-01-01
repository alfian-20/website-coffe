
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin-bottom: 0px;
            padding: 0px;
            background: url(img/image\ 55.png);
            background-size: cover;
            font-family: Poppins;
            height: 900px;
        }
        .cek{
            border: 1px solid red;
        }
        .cek1{
            border: 1px solid pink;
        }
        .login-box{
            width: 500px;
            height: 600px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(1rem);
            box-sizing: border-box;
            position: absolute;
            border-radius: 10px;
            margin: 20vh;
        }
        h1{
            margin-top: 50px;
            padding: 0 0 20px;
            text-align: center;
            font-size: 50px;
        }
        .login-box p{
            margin-top: 20px;
            font-weight: bold;
            font-size: 20px;
            margin-left: 8vh;
        }
        .login-box input{
            height: 50px;
            width: 350px;
            border-radius: 10px;
            text-align: center;
            margin-left: 8vh;
        }
        .login-box input[type="checkbox"]{
            position: absolute;
            margin-left: 4px;
            width: 17px;
            height: 17px;
        }
        .login-box label{
            font-size: 13px;
            margin-left: 26px;
            
        }
        .login-box a{
            font-size: 25px;
        }
        .login-box a:hover{
            transition: all .4s ease-in-out;
        color: #E33D57;
        }

        .tombol{
            width: 300px;
            margin-top: 20px;
            padding: 8px 200px;
        }
        .btn-login{
            background-color: white;
            border-radius: 10px;
            border: note;
            box-shadow: 0px 1px 8px #ffffff;
            cursor: pointer;
            color: white;
            height: 35px;
            margin: 0 auto;
            margin-top: 10px;
            transform: 0.25s;
            width: 100px;
            text-decoration: none;
            padding: 8px 24px;
            color: rgb(0, 0, 0);
            opacity: 0.8;
            animation: 1s ease 1s;
            position: relative;
            
        }
        .btn-login:active{
            position: relative;
            top: 5px;
            box-shadow: none;
        }
        .btn-login:hover {
            opacity: 1;
        }
        .bungkus{
            text-align: center;
            margin-top: 10px;
        }
        .bungkus label{
            font-size: 20px;

        }
        .a{
            padding-right: 55px;
        }
        .bungkus .b{
            font-size: 20px;
            text-decoration: none;
            color: black;
        }
        .b:hover{
            transition: all .4s ease-in-out;
            color: red;
        }
    </style>
</head>
<body>
<form method="post" action="loginprocess.php">
    <div class="login-box">
        <h1>Login</h1>
        <font>
            <div>
                <p>Username</p>
                <input type="text" name="username" placeholder=" Masukkan Username">
                <p>Password</p>
                <input type="password" name="password" placeholder="Masukan Password" class="pass">
                <span class="eye">
                    <i id="eye" class="fa-solid fa-eye"></i>
                </span><br>
                <div class="bungkus">
                        <input type="checkbox">
                        <label for="centang" class="a"> Remember Me</label>
                        <a href="InputDataCostumer.php" class="b">create an account?</a>
                </div>
                <div class="tombol">
                    <button type="submit" class="btn-login">Login</button>
                </div>
            </div>
        </font>
    </div>
    </form>
</body>
</html>