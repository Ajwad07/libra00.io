<?php
include 'connect-w-book-list.php';

$user = $_GET['user'];
$title = $_GET['title'];
$action = $_GET['action'];

// Fetch book details to check available copies
$bookSql = "SELECT * FROM booklist WHERE title = '$title'";
$bookResult = mysqli_query($con, $bookSql);
$book = mysqli_fetch_assoc($bookResult);

if ($action == 'reserve') {
    if ($book['Available_copy'] > 0) {
        $newDate = date('Y-m-d', strtotime('+30 days'));
        $sql = "
        UPDATE bookreservation
        SET 
            title1_res = IF(title1 = '$title', 'Y', title1_res),
            ret1 = IF(title1 = '$title', '$newDate', ret1),
            title2_res = IF(title2 = '$title', 'Y', title2_res),
            ret2 = IF(title2 = '$title', '$newDate', ret2),
            title3_res = IF(title3 = '$title', 'Y', title3_res),
            ret3 = IF(title3 = '$title', '$newDate', ret3)
        WHERE name = '$user'
        ";

        $updateResult = mysqli_query($con, $sql);
        if ($updateResult) {
            // Update available copies
            $updateBookSql = "UPDATE booklist SET Available_copy = Available_copy - 1 WHERE title = '$title'";
            mysqli_query($con, $updateBookSql);
            echo "<script>
                alert('Reservation updated successfully.');
                window.location.href='reservation-list.php?sid=$user';
            </script>";
        } else {
            echo "<script>
                alert('Failed to update reservation.');
                window.location.href='reservation-list.php?sid=$user';
            </script>";
        }
    } else {
        echo "<script>
            alert('No copies available for reservation.');
            window.location.href='reservation-list.php?sid=$user';
        </script>";
    }
} elseif ($action == 'return') {
    $sql = "
    UPDATE bookreservation
    SET 
        ret1 = IF(title1 = '$title', '0000-00-00', ret1),
        ret2 = IF(title2 = '$title', '0000-00-00', ret2),
        ret3 = IF(title3 = '$title', '0000-00-00', ret3),
        title1_res = IF(title1 = '$title', 'N', title1_res),
        title2_res = IF(title2 = '$title', 'N', title2_res),
        title3_res = IF(title3 = '$title', 'N', title3_res),
        title1 = IF(title1 = '$title', 'N/A', title1),
        title2 = IF(title2 = '$title', 'N/A', title2),
        title3 = IF(title3 = '$title', 'N/A', title3)
    WHERE name = '$user';
    ";

    $updateResult = mysqli_query($con, $sql);
    if ($updateResult) {
        // Update available copies
        $updateBookSql = "UPDATE booklist SET Available_copy = Available_copy + 1 WHERE title = '$title' AND Available_copy < Total_copy";
        mysqli_query($con, $updateBookSql);
        echo "<script>
            alert('Reservation updated successfully.');
            window.location.href='reservation-list.php?sid=$user';
        </script>";
    } else {
        echo "<script>
            alert('Failed to update reservation.');
            window.location.href='reservation-list.php?sid=$user';
        </script>";
    }
}
?>
