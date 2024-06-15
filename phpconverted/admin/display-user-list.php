<?php
include 'connect-w-book-list.php'; // Include the database connection for user list
?>
<?php
include 'admin panel.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('cbg.jpg');
        }

        .container a {
        text-decoration: none;
    
    }
    .container a:hover{
        text-decoration: none;
    }
        /* custom.css */
        .table {
            background-color: #f8f9fa;
            /* Light gray background color */
            border: 1px solid #343a40;
            /* Dark gray border color */
        }

        .table th,
        .table td {
            border: 1px solid #343a40;
            /* Dark gray border color for table cells */
        }

        .table th {
            background-color: #343a40;
            /* Dark gray background for header */
            color: #ffffff;
            /* White text color for header */
        }

        .table tbody tr:nth-child(even) {
            background-color: #e9ecef;
            /* Light gray background for even rows */
        }
    </style>
</head>

<body>
    <div class="ml-5 mr-5">
        <div class="container">
            <button class="btn btn-primary my-5"><a href="add-user.php" class="text-light">Add User</a></button>

            <?php // Search form for users
            echo '
        <form class="d-flex mb-5">
            <input class="form-control me-2" type="search" placeholder="Search users by username" name="sid" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        ';
            // Handle search functionality
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sid'])) {
                $SID = $_GET['sid'];
                echo '<script>window.location.href = "singledisplay-user-list.php?searchID=' . $SID . '";</script>';
            }
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // PHP code to fetch and display user data
                    $sql = "SELECT * FROM `userlist`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $u_id = $row['u_id'];
                            $name = $row['name'];
                            $email = $row['email'];
                            $u_name = $row['u_name'];
                            echo '<tr>
                                <th scope="row">' . $u_id . '</th>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td><a href="reservation-list.php?sid=' . $u_name . '" class="text-dark">' . $u_name . '</a></td>
                                <td>
                                    
                                    <button class="btn btn-danger mt-1"><a href="delete-user-list.php?deleteid=' . $u_id . '" class="text-light">Delete</a></button>
                                </td>
                            </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<!-- // <button class="btn btn-success mt-1"><a href="update-user-list.php?updateid=' . $u_id . '" class="text-light">Update</a></button> -->