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
</head>
<style>
    body {
        background-image: url('cbg.jpg');
        /* margin-top: 160px;
        margin-left: 20px; */
    }
    .container{
        padding-left: 60px;
        padding-right: 1px;
        padding-top: 30px;
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
    .ml-5{
        margin-left: 10px;
    }
</style>
<body>
    <div class="container my-5 ml-5 mr-5">
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
                $SID = $_GET['searchID'];

                // Update the SQL query to fetch user data
                $sql = "SELECT * FROM `userlist` WHERE `u_name` LIKE '%$SID%' OR `email` LIKE '%$SID%' OR `name` LIKE '%$SID%'";
                $result = mysqli_query($con, $sql);
                
                if ($result) {
                    // Corrected while loop to fetch a new row on each iteration
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Retrieve data from the row
                        $u_id = $row['u_id'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $u_name = $row['u_name'];
                
                        // Display data in table rows
                        echo '<tr>
                            <th scope="row">' . $u_id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $u_name . '</td>
                            <td>
                                
                                <button class="btn btn-danger mt-1">
                                    <a href="delete-user-list.php?deleteid=' . $u_id . '" class="text-light">Delete</a>
                                </button>
                            </td>
                        </tr>';
                    }
                } else {
                    die("Error executing query: " . mysqli_error($con));
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<!-- <button class="btn btn-success mt-1">
                                    <a href="update-user-list.php?updateid=' . $u_id . '" class="text-light">Update</a>
                                </button> -->