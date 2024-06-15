<!-- <?php
        // include'extraworks/smheader.php';
        // 
        ?> -->
<?php
include 'connect-w-book-list.php';
?>
<?php
include 'admin panel.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-image: url('cbg.jpg');
    }
    .container{
        padding-left: 30px;
        padding-right: 1px;
        /* padding-top: 50px; */

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
    .ml-5{
        margin-left: 10px;
    }
</style>

<body>
    <div class="ml-5 mr-5">
        <div class="container ml-5">
            <button class="btn btn-primary my-5"><a href="add-book.php" class="text-light">add book</a></button>

            <?php // for search php
            echo '
        <form class="d-flex mb-5">
            <input class="form-control me-2" type="search" placeholder="Search books by title" name="sid" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        ';
            // include 'connect.php';

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['sid'])) {
                $SID = $_GET['sid'];
                echo '<script>window.location.href = "singledisplay-book-list.php?searchID=' . $SID . '";</script>';
            }
            
            ?>

            <table class="table">
                <thead>
                    <tr>
                        <!-- <th scope="col">Sl no</th> -->

                        <th scope="col">Title</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Author</th>
                        <th scope="col">Catagory</th>
                        <th scope="col">Total copy</th>
                        <th scope="col">Available copy</th>
                        <th scope="col">Update/delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php // php for displaying data in table rowwise
                    $sql = "Select * from `booklist`";
                    $result = mysqli_query($con, $sql);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            //  $idx= $row['Ix'];
                            $title = $row['Title'];
                            $author = $row['Author'];
                            $cat = $row['Catagory'];
                            $tcopy = $row['Total_copy'];
                            $acopy = $row['Available_copy'];
                            $cover = $row['cover'];
                            echo '<tr>
                     <th scope="row">' . $title . '</th>
                 
                    <td><img src="' . $cover . '" alt="Book Cover" style="max-width: 100px;height:100px;"></td>
                     <td>' . $author . '</td>
                     <td>' . $cat . '</td>
                     <td>' . $tcopy . '</td>
                     <td>' . $acopy . '</td>
                     <td>
                     <button class
                     ="btn btn-success mt-1" ><a href="update-book-list.php? updateid=' . $title . '"class
                     ="text-light">update</a></button>
                     <button class
                     ="btn btn-danger mt-1" ><a href="delete-book-list.php? deleteid=' . $title . '"class
                     ="text-light">delete</a></button>
                 </td>
                   </tr>
                     ';
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>

    </script>
</body>

</html>