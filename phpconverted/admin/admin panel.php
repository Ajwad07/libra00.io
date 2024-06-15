<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        header {
            position: fixed;
            background: #22242a;
            padding: 10px 20px;
            width: 100%;
            height: 65px;
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .left-side h3 {
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            font-size: 22px;
            font-weight: 900;
            display: inline-block;
        }

        .side-nav {
            background: #2f323a;
            position: fixed;
            top: 60px;
            left: 0;
            width: 250px;
            height: calc(100% - 60px);
            transition: 0.5s;
            overflow-y: auto;
            z-index: 10;
        }

        .side-nav a {
            color: #fff;
            line-height: 60px;
            display: flex;
            align-items: center;
            text-decoration: none;
            padding: 0 20px;
            transition: 0.5s;
        }

        .side-nav a:hover {
            background: #0a7e96;
            text-decoration: none;
            color: white;
        }

        .side-nav .fa {
            margin-right: 10px;
        }

        #side-nav_btn {
            z-index: 1;
            position: fixed;
            color: #fff;
            cursor: pointer;
            left: 87px;
            font-size: 20px;
            transition: 0.5s;
        }

        #side-nav_btn:hover {
            color: #19B3D3;
        }

        #check:checked~.side-nav {
            width: 60px;

        }

        #check:checked~.side-nav a span {
            display: none;
        }

        #check:checked~.side-nav a {
            padding-left: 15px;
            justify-content: center;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .banner {
            margin-left: 250px;
            transition: 0.5s;
            height: 10vh;
            width: 20px;
        }

        #check:checked~.banner {
            margin-left: 60px;
        }

        #check {
            display: none;
        }

        #check:checked~#side-nav_btn {
            left: 70px;
        }

        .side-nav .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }

        .side-nav .logo img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            z-index: 1000;
        }

        i.fa fa-exchange {
            display: inline-block;
        }
    </style>
</head>

<body>
    <input type="checkbox" id="check" checked>
    <header class="container-fluid">

        <div class="left-side">
            <h3>Admin Panel</h3>
        </div>
        <label for="check">
            <i class="fa fa-exchange" id="side-nav_btn"></i>
        </label>
    </header>

    <div class="side-nav">
        <div class="logo">
            <a href="\phpconverted\index.php">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/CUET_Vector_ogo.svg/330px-CUET_Vector_ogo.svg.png" style="height: 66px; width: 51px;" alt="logo">
            </a>
        </div>
        <a href="count.php"><i class="fa fa-desktop"></i><span>Dashboard</span></a>
        <a href="#"><i class="fa fa-table"></i><span>Reservations</span></a>
        <a href="display-notice-list.php"><i class="fa fa-newspaper-o"></i><span>Notices</span></a>
        <a href="display-book-list.php"><i class="fa fa-leanpub"></i><span>Add/Update Books</span></a>
        <a href="display-user-list.php"><i class="fa fa-user-plus"></i><span>Users</span></a>
        <a href="\phpconverted\logout.php"><i class="fa fa-sign-out"></i><span>Log-out</span></a>
    </div>

    <div class="banner">
        <!-- Your content here -->
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>