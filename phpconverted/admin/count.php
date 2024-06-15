<?php
include 'admin panel.php';
?>
<?php
include 'connect-w-book-list.php';

// Count total books
$book_count_result = mysqli_query($con, "SELECT COUNT(*) FROM booklist");
$book_count = mysqli_fetch_assoc($book_count_result);
$book_count = $book_count['COUNT(*)'];

// Count total users
$user_count_result = mysqli_query($con, "SELECT COUNT(*) FROM userlist");
$user_count = mysqli_fetch_assoc($user_count_result);
$user_count = $user_count['COUNT(*)'];

// Count total notices
$notice_count_result = mysqli_query($con, "SELECT COUNT(*) FROM notices");
$notice_count = mysqli_fetch_assoc($notice_count_result);
$notice_count = $notice_count['COUNT(*)'];

// Calculate progress percentages (for demonstration purposes, assuming maximum values for now)
$book_progress = min(100, ($book_count / 100) * 100); // Assuming 100 as a max value for illustration
$user_progress = min(100, ($user_count / 100) * 100); // Assuming 100 as a max value for illustration
$notice_progress = min(100, ($notice_count / 100) * 100); // Assuming 100 as a max value for illustration
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        body {
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            background-image: url(cbg.jpg);
        }
        .row{
            margin-left: 60px;
            margin-right: 30px;
            z-index: -1;
        }
        .dashboard {
            margin-top: 60px;
            margin-left: 20px;
            margin-right: 20px;
            position: relative;
            z-index: 1;
        }
        .card {
            margin: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: -1;
        }
        .progress-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            height: 100%;
        }
        .progress {
            width: 150px;
            height: 150px;
            background: rgb(78, 91, 205);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        circle {
            fill: none;
        }
        svg {
            transform: rotate(-90deg);
        }
        circle:nth-child(1) {
            stroke-width: 12px;
        }
        circle:nth-child(2) {
            stroke-dasharray: 848;
            stroke-linecap: round;
            stroke-width: 16px;
            animation: progress 1s ease;
        }
        @keyframes progress {
            from {
                stroke-dashoffset: 848;
            }
        }
        .text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: Poppins, sans-serif;
            font-size: 24px;
            color: rgb(255, 201, 5);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .text span {
            margin-top: 30px;
            font-size: 14px;
            color: rgb(230, 230, 230);
        }
    </style>
</head>
<body>
    <div class="container dashboard">
        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <div class="progress-wrapper">
                            <div class="progress">
                                <svg class="progress-bar" width="150" height="150">
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: rgb(25, 26, 49);"></circle>
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: #ff6347; stroke-dashoffset: calc(848 - (848 * <?php echo $book_progress; ?>) / 100);"></circle>
                                </svg>
                                <div class="text">
                                    <?php echo $book_count; ?>
                                    <span>Books</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <div class="progress-wrapper">
                            <div class="progress">
                                <svg class="progress-bar" width="150" height="150">
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: rgb(25, 26, 49);"></circle>
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: #4682b4; stroke-dashoffset: calc(848 - (848 * <?php echo $user_progress; ?>) / 100);"></circle>
                                </svg>
                                <div class="text">
                                    <?php echo $user_count; ?>
                                    <span>Users</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Notices</h5>
                        <div class="progress-wrapper">
                            <div class="progress">
                                <svg class="progress-bar" width="150" height="150">
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: rgb(25, 26, 49);"></circle>
                                    <circle class="progress-circle" cx="75" cy="75" r="65" style="stroke: #32cd32; stroke-dashoffset: calc(848 - (848 * <?php echo $notice_progress; ?>) / 100);"></circle>
                                </svg>
                                <div class="text">
                                    <?php echo $notice_count; ?>
                                    <span>Notices</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
</body>
</html>
