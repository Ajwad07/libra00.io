<?php
include("header.php");
include 'connect-w-book-list.php';

$searchTerm = '';
if (isset($_GET['search'])) {
    $searchTerm = htmlspecialchars($_GET['search']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('catbgnd.png');
            color: white;
        }
.container {
    margin-bottom: 70px;
        }
        .container>h1 {
            color: white;
        }
    

        .table tbody tr {
            cursor: pointer;
            color: white;
            font-weight: 700;
            
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var rows = document.querySelectorAll(".table tbody tr");
            rows.forEach(function(row) {
                row.addEventListener("click", function() {
                    var id = this.getAttribute('data-id');
                    window.location.href = 'reserve-book.php?SID=' + id;
                });
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Search Results for '<?php echo $searchTerm; ?>'</h1>
        <?php
        // Check if the search term is empty
        if (empty($searchTerm)) {
            echo '<p>Please enter a search term.</p>';
        } else {
            // Your database connection code goes here

            // Prepare the SQL query to search for books
            $query = "SELECT * FROM booklist WHERE author LIKE '%$searchTerm%' OR title LIKE '%$searchTerm%'";

            // Execute the query and fetch the results
            $result = mysqli_query($con, $query);

            // Check if any results were found
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="table">';
                echo '<thead class="thead-light"><tr><th>Title</th><th>Author</th><th>Cover</th></tr></thead>';
                echo '<tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr data-id="' . $row['id'] . '">';
                    echo '<td>' . $row['Title'] . '</td>';
                    echo '<td>' . $row['Author'] . '</td>';
                    echo '<td><img src="' . $row['cover'] . '" alt="Cover" width="50" height="auto" min-height="100"></td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No results found.</p>';
            }

            // Close the database connection
            mysqli_close($con);
        }
        ?>
    </div>
</body>

</html>
<?php
include("footer.php");
?>