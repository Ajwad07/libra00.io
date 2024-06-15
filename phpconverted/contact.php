<?php
if (isset($_POST['btn-send'])) {
    include 'connect-w-book-list.php';
    
    $name = $_POST['Uname'];
    $email = $_POST['Email'];
    $message = $_POST['msg'];

    $sql = "INSERT INTO contactm (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>
        alert('Message Sent Successfully');
        window.location.href='contact.php';
        </script>";
    } else {
        echo "<script>
        alert('Error: " . mysqli_error($con) . "');
        window.location.href='contact.php';
        </script>";
    }
    mysqli_close($con);
}
?>

<?php
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial;
            background-image: url('cbg.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-size: 20px;
            color: white;
        }
        .container {
            margin-top: 80px;
        }
        .icon {
            padding: 15px;
            vertical-align: top;
            color: #01bdd4;
        }
        .contact-info-title {
            color: #01bdd4;
        }
        .form-container {
            background-color: white;
            color: #000;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 70px;
        }
        .form-field {
            width: 100%;
            border: none;
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
        }
        .send-btn {
            border: 0;
            padding: 12px 26px;
            background-color: #01bdd4;
            color: white;
        }
        .address-line {
            display: flex;
            align-items: center;
            margin-top: 40px;
        }
        .col-md-6 {
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Contact Us</h1>
            <p>Reach Out to Us: We're Here to Help You Explore and Learn</p>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="address-line">
                    <i class="fa fa-map-marker icon"></i>
                    <div class="contact-info">
                        <div class="contact-info-title">Address</div>
                        <div>1002 Lorem ipsum dolor sit.,</div>
                        <div>lorem, Lorem, ipsum.,</div>
                        <div>55060.</div>
                    </div>
                </div>
                <div class="address-line mt-4">
                    <i class="fa fa-phone icon"></i>
                    <div class="contact-info">
                        <div class="contact-info-title">Phone</div>
                        <div>12523-4566-8954-8956.</div>
                    </div>
                </div>
                <div class="address-line mt-4">
                    <i class="fa fa-envelope icon"></i>
                    <div class="contact-info">
                        <div class="contact-info-title">Email</div>
                        <div>contactemail@gmail.com</div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
                <div class="form-container">
                    <h2>Send Message</h2>
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="Uname" class="form-control form-field" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control form-field" required>
                        </div>
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="msg" class="form-control form-field" rows="4" required></textarea>
                        </div>
                        <button type="submit" name="btn-send" class="btn send-btn btn-info">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
include("footer.php");
?>