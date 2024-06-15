<?php
session_start();

function isActive($page)
{
    $current_page = basename($_SERVER['PHP_SELF']);
    return $current_page === $page ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complimentary Navigation Bar</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="header.css">
    
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navigation-clean-button sticky-top header">
        <div class="container-fluid ">
            <a class="navbar-brand mr-5" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/CUET_Vector_ogo.svg/330px-CUET_Vector_ogo.svg.png" style="height: 66px; width: 51px;" alt="">
                Library
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('index.php'); ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('about.php'); ?>" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('all-catagory.php'); ?>" href="all-catagory.php">Categories</a>
                    </li>
                    <?php
                    if (isset($_SESSION['u_name'])) {
                        echo '<li class="nav-item">
                                    <a class="nav-link ' . isActive('logout.php') . '" href="logout.php">Logout</a>
                                  </li>';
                    } else {
                        echo '<li class="nav-item">
                                    <a class="nav-link ' . isActive('login.php') . '" href="login.php">Login</a>
                                  </li>';
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('contact.php'); ?>" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-2 <?php echo isActive('more.php'); ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item <?php echo isActive('signup.php'); ?>" href="signup.php">Sign-up &nbsp; &nbsp;&nbsp; &nbsp;</a>
                            <a class="dropdown-item <?php echo isActive('notices.php'); ?>" href="notices.php">All notices &nbsp;&nbsp; &nbsp;</a>
                            <div class="dropdown-divider"></div>
                            <?php
                            if (isset($_SESSION['email']) && strpos($_SESSION['email'], '@lib.com') !== false) {
                                echo '<a class="dropdown-item ' . isActive('/phpconverted/admin/count.php') . '" href="/phpconverted/admin/count.php">Admin panel &nbsp &nbsp</a>';
                            } else {
                                echo '<a class="dropdown-item ' . isActive('user-dashboard.php') . '" href="user-dashboard.php">User dashboard</a>';
                            }
                            ?>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search.." aria-label="Search" name="search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>