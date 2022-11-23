<?php
include "connect.php";
function formatMoney($number, $fractional = false)
{
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_GET["pname"] ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        footer {
            position: absolute;
            bottom: -400;
            left: 0;
            right: 0;
            background-color: #242424;
            color: #ffffff;
            height: auto;
            width: 100vw;
            padding-top: 40px;
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .footer-content h3 {
            font-size: 1.8rem;
            font-weight: 400;
            text-transform: capitalize;
            line-height: 3rem;
        }

        .footer-content p {
            max-width: 500px;
            margin: 10px auto;
            line-height: 28px;
            font-size: 14px;
        }

        .footer-bottom {
            background-color: #000;
            width: 100vw;
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            font-size: 14px;
            word-spacing: 2px;
            text-transform: capitalize;
        }

        .footer-bottom span {
            text-transform: uppercase;
            opacity: .4;
            font-weight: 200;
        }

        body {
            margin: 0;
            font-family: 'Montserrat Alternates', sans-serif;
        }

        .headertop {
            overflow: hidden;
            padding-right: 15px;
            background-color: #ffffff;
        }
        .headertop {
            padding: 0 auto;
            position: fixed;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 9999;
            transition: all 300ms ease-in-out;
        }

        .headertop a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 13px;
            line-height: 10px;
            border: 1px solid black;
            margin: 10px 15px 15px 0px;
        }

        #home {
            color: #ffffff;
            background-color: #2f2f2f;
        }

        #home:hover {
            background-color: #000;
            color: #ffffff;
        }

        .headertop a:hover {
            background-color: #000;
            color: #ffffff;
        }

        .headertop-right {
            float: right;
        }

        /* The container */
        .container {
            display: block;
            position: relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default checkbox */
        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }

        /* Create a custom checkbox */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
        }

        /* On mouse-over, add a grey background color */
        .container:hover input~.checkmark {
            background-color: #ccc;
        }

        /* When the checkbox is checked, add a black background */
        .container input:checked~.checkmark {
            background-color: black;
        }

        /* Create the checkmark/indicator (hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the checkmark when checked */
        .container input:checked~.checkmark:after {
            display: block;
        }

        /* Style the checkmark/indicator */
        .container .checkmark:after {
            left: 9px;
            top: 5px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 3px 3px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
        }

        .button {
            background-color: white;
            border: 2px solid #555555;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1:hover {
            background-color: #555555;
            color: white;
        }

        .header .headertop {
            transition: all 200ms ease-in-out;
            border: 1px solid #eeeded;
        }
    </style>
</head>

<body>
    <header>
        <div class="headertop">
            <div class="headertop-right">
                <a href="home.php" id="home">Home</a>
                <a href="signin.php" id="cart">Cart</a>
            </div>
        </div>
    </header>
    <footer>
        <div class="footer-content">
            <h3>Nike</h3>
            <p>We champion continual progress for athletes and sport by taking action to help athletes reach their potential. Every job at NIKE, Inc. is grounded in a team-first mindset, cultivating a culture of innovation and a shared purpose to leave an enduring impact.</p>

        </div>
        <div class="footer-bottom">
            <p>&copy;2022 Sneakers</p>
        </div>
    </footer>

    <?php
    $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
    $stmt->bindParam(1, $_GET["pid"]);
    $stmt->execute();
    $row = $stmt->fetch();
    ?>
    <div style="display:flex">
        <div style="padding: 100px 10px 80px 80px">
            <img src='img/<?= $row["pid"] ?>.jpg' width='450'>
        </div>
        <div style="padding: 100px 80px 80px 10px">
            <img src='img/<?= $row["pid"] ?>-<?= $row["pid"] ?>.jpg' width='450'>
        </div>
        <div style="padding: 100px 50px 80px 5px">
            <h1><?= $row["pname"] ?></h1>
            <h2><?= $row["ptype"] ?></h2><br>
            <?= $row["pdetail"] ?><br><br>
            ราคา <?= formatMoney($row["price"]); ?> บาท
            <br><br>Size:<br><br>
            <form>
                <label class="container">US 8
                    <input type="radio" id="8" name="size" value="8">
                    <span class="checkmark"></span>
                </label>
                <label class="container">US 9
                    <input type="radio" id="9" name="size" value="9">
                    <span class="checkmark"></span>
                </label>
                <label class="container">US 10
                    <input type="radio" id="10" name="size" value="10">
                    <span class="checkmark"></span>
                </label>
                <label class="container">US 11
                    <input type="radio" id="11" name="size" value="11">
                    <span class="checkmark"></span>
                </label>
                <label class="container">US 12
                    <input type="radio" id="12" name="size" value="12">
                    <span class="checkmark"></span>
                </label><br>
                <input type="submit" class="button button1" value="เพิ่มสินค้าในตะกร้า">
            </form>
        </div>
    </div>
    <script>
        const body = document.body;
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            if (window.scrollY >= 50) {
                body.classList.add('header');
            } else {
                body.classList.remove('header');
            }
            console.log(window.scrollY);
        })
    </script>
</body>

</html>