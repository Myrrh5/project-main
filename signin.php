<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com"> 
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <title>Login</title>
        <style>
            body {font-family: 'Montserrat Alternates', sans-serif;}
            * {box-sizing: border-box}

            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                display: inline-block;
                border: none;
                background: #f1f1f1;
            }

            input[type=text]:focus, input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            hr {
                border: 1px solid #f1f1f1;
                margin-bottom: 25px;
            }

            /* Set a style for all buttons */
            button {
                background-color: black;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            button:hover {
                opacity:1;
            }

            /* Float cancel and signup buttons and add an equal width */
            .cancelbtn, .signupbtn {
                float: left;
                width: 50%;
            }

            /* Add padding to container elements */
            .container {
                padding: 100px 500px;
            }

            /* Clear floats */
            .clearfix::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Change styles for cancel button and signup button on extra small screens */
            @media screen and (max-width: 300px) {
                .cancelbtn, .signupbtn {
                    width: 100%;
                }
            }
        </style>
    </head> 
    <body>
        <form method="post" action="signin-check.php">
            <div style="display:flex">
                <div class="container">
                    <h1>Sign In</h1>
                    <p>กรอกข้อมูลเพื่อเข้าสู่ระบบ</p>
                    <hr>

                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" required autofocus  pattern="[A-Za-z0-9_]{8,10}" maxlength="10">

                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required autofocus pattern="[A-Z]{1}[a-z0-9]{7}" maxlength="10">

                    <div class="clearfix">
                        <button type="submit" class="signupbtn">Sign In</button>
                    </div>
                </div>
            </div>
        </form>

    </body>
</html>
