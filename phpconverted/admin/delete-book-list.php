<?php
include 'connect-w-book-list.php';
if(isset($_GET['deleteid'])){
    $title=$_GET['deleteid'];

    $sql="DELETE from `booklist` WHERE Title= '$title'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>
                alert('Delete success');
                window.location.href='display-book-list.php';
            </script> ";
        // header('location:display-book-list.php');
        // echo 'delete success';
    }
    else{
        die(mysqli_error($con));
    }
}

?>