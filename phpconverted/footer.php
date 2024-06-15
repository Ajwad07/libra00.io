<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            margin: 0px;
        }

        .footer {
            background-color: black;
            color: wheat;
            padding: 60px;
            /* margin: 0px; */
            /* bottom: 0;
            left: 0; */
            /* position:sticky; */
            /* z-index: 10; */
        }

        .footer a {
            color: wheat;
        }

        .footer a:hover {
            color: #ccc;
            text-decoration: none;
        }

        .socio a {
            color: wheat;
            margin-right: 10px;
        }

        .text-center {
            text-align: center;
            color: wheat;
        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="container-fluid ml-5">
            <div class="row">
                <div class="col-md-4">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Contact Us</h3>
                    <p><i class="fa fa-phone"></i> : +880135048***</p>
                    <p><i class="fa fa-envelope"></i> : cuetlibrary@gmail.com</p>
                </div>
                <div class="col-md-4">
                    <h3>Social Links</h3>
                    <div class="socio">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 CUET Library. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>