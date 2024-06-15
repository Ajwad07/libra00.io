<?php
include 'connect-w-book-list.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="DELETE from `notices` WHERE id= '$id'";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>
                alert('Delete success');
                window.location.href='display-notice-list.php';
            </script> ";
        // header('location:display-notices.php');
        // echo 'delete success';
    }
    else{
        die(mysqli_error($con));
    }
}

?>
