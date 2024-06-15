<?php
include 'connect-w-book-list.php';
include 'admin panel.php';
$searchID = $_GET['sid'];

// Fetch user reservation details
$sql = "SELECT * FROM `bookreservation` WHERE `name` = '$searchID'";
$result = mysqli_query($con, $sql);
$reservation = mysqli_fetch_assoc($result);

if (!$reservation) {
    echo '<script>
        alert("No reservations found for this user.");
        window.location.href = "display-user-list.php";
    </script>';
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reservations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('cbg.jpg');
            background-size: cover;
        }

        .table {
            background-color: #f8f9fa;
            border: 1px solid #343a40;
        }

        .table th,
        .table td {
            border: 1px solid #343a40;
        }

        .table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9ecef;
        }

        .ml-5 {
            margin-left: 10px;
        }

        .btn-action {
            margin-top: 10px;
        }
    </style>
    <script>
        function markAsReturned(title) {
            console.log('markAsReturned called with title:', title); // Debugging line
            if (title === 'N/A') {
                alert("No books to mark as return.");
                return;
            }
            if (confirm("Are you sure you want to mark this book as returned?")) {
                window.location.href = 'update_reservation.php?action=return&title=' + encodeURIComponent(title) + '&user=' + encodeURIComponent('<?php echo $searchID; ?>');
            }
        }

        function updateReservation(title) {
            console.log('updateReservation called with title:', title); // Debugging line
            if (title === 'N/A') {
                alert("No books to reserve.");
                return;
            }
            if (confirm("Are you sure you want to reserve this book?")) {
                window.location.href = 'update_reservation.php?action=reserve&title=' + encodeURIComponent(title) + '&user=' + encodeURIComponent('<?php echo $searchID; ?>');
            }
        }
    </script>
</head>

<body>
    <div class="container my-5">
        <h2 class="text-white">User Reservations for <?php echo htmlspecialchars($searchID); ?></h2>
        <div class="ml-5 mr-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Reservation Status</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        $title = htmlspecialchars($reservation["title$i"]);
                        $res = htmlspecialchars($reservation["title" . $i . "_res"]);
                        $ret = htmlspecialchars($reservation["ret$i"]);
                        echo '<tr>
                            <td>' . $title . '</td>
                            <td>' . $res . '</td>
                            <td>' . $ret . '</td>
                            <td>';
                        if ($res === 'N') {
                            echo '<button class="btn btn-primary btn-action" onclick="updateReservation(\'' . addslashes($title) . '\')">Reserve</button>';
                        } else {
                            echo '<button class="btn btn-success btn-action" onclick="markAsReturned(\'' . addslashes($title) . '\')">Mark as Returned</button>';
                        }
                        echo '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
</body>

</html>
