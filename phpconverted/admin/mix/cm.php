<?php
include 'smheader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            /* Set background color */
        }

        .contact-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            background: linear-gradient(to right, #333, #555);
            /* Black and greyish gradient */
            color: #fff;
            /* Text color */
        }

        .branch {
            margin-top: 30px;
        }

        .branch h3 {
            margin-bottom: 20px;
            text-align: center;
            color: #fff;
            /* Heading color */
        }

        .branch-item {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .branch-item:hover {
            transform: translateY(-5px);
        }

        .branch-item h4 {
            margin-bottom: 10px;
            color: #fff;
            /* Heading color */
        }

        .branch-item p {
            color: #ccc;
            /* Paragraph color */
        }
    </style>
</head>

<body>
    <div class="container contact-container">
        <h2 class="text-center">Contact Us</h2>
        <div class="branch">
            <div class="branch-item">
                <h3>Phone Number</h3>
                <h4>123-456-7890</h4>
                <p>Feel free to call us during office hours.</p>
            </div>
            <div class="branch-item">
                <h3>Email</h3>
                <h4>info@example.com</h4>
                <p>Email us anytime, and we'll get back to you as soon as possible.</p>
            </div>
            <div class="branch-item">
                <h3>Donate</h3>
                <h4>Donate Now</h4>
                <p>Contact us for donation inquiries and support.</p>
            </div>
            <div class="branch-item">
                <h3>Visit Us</h3>
                <h4>123 Street Name, City</h4>
                <p>Visit us during our office hours for assistance.</p>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>