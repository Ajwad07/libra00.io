<?php
  include("header.php");
  include 'connect-w-book-list.php';

  if (isset($_GET['SID'])) {
    $SID = $_GET['SID'];

    // if ($SID == 'scifi') {
    //   $cat = 'Non Academic';
    // } 
   if ($SID == 'CE') {
      $cat = 'CIVIL ENGINEERING';
    } elseif ($SID == 'ME') {
      $cat = 'MECHANICAL ENGINEERING';
    } elseif ($SID == 'ECE') {
      $cat = 'ELECTRICAL AND COMPUTER ENGINEERING';
    } elseif ($SID == 'AP') {
      $cat = 'ARCHITECTURE AND PLANNING';
    } elseif ($SID == 'ET') {
      $cat = 'ENGINEERING AND TECHNOLOGY';
    }
    elseif ($SID == 'ACA') {
      $cat = 'ACADEMIC';
    }
    elseif ($SID == 'NCA') {
      $cat = 'NON-ACADEMIC';
    }  else {
      $cat = 'Non Academic';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library - Books</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #FFFFFF;
      /* White background */
      color: #000000;
      /* Black text */
      margin: 0;
      padding: 0;
    }
.container h2{
  margin-top: 30px;
  margin-bottom: 30px;
  color: white;
  font-weight: 400px;
}
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url('catbgnd.png');
      background-size: cover;
      background-attachment: fixed;
      /* backdrop-filter: blur(5px); */
    }
    a:hover{
      text-decoration: none;
    }
    /* .background {
      position: relative;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* backdrop-filter: blur(5px); */
    /* } */ */

    .container {
      width: 80%;
      max-width: 1000px;
      margin: 50px auto;
      padding: 20px;
    }

    h2 {
      text-align: center;
    }

    .book-list {
      list-style-type: none;
      padding: 0;
    }

    .book-item {
      display: flex;
      background: white;
      opacity: .8;
      margin-bottom: 20px;
      border: 1px solid #000000;
      /* Black border */
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Box shadow */
      transition: box-shadow 0.3s ease;
      /* Smooth transition */
    }

    .book-item:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
      /* Larger box shadow on hover */
    }

    .book-item img {
      width: 100px;
      height: auto;
      margin-left: 8px;
      margin-top: 5px;
      margin-bottom: 5px;
      margin-right: 20px;
      border-radius: 5px 0 0 5px;
    }

    .book-details {
      flex: 1;
      padding: 10px;
    }
    .book-details >a:hover{
      text-decoration: none;
      color:black;
      opacity: .7;
    }
    .book-title {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .book-author {
      font-style: italic;
      margin-bottom: 10px;
    }

    .book-description {
      margin-bottom: 10px;
    }

    .book-category {
      font-weight: bold;
    }

    .book-category::before {
      content: "Category: ";
    }

    .book-details>a {
      text-decoration: none;
      color: #000000;
    }

    @media (max-width: 600px) {
      .book-item {
        flex-direction: column;
      }

      .book-item img {
        margin-left: 9px;
        margin-bottom: 10px;
        border-radius: 5px 5px 0 0;
      }
    }

    /* .next-page-nav {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .next-page-nav a {
      text-decoration: none;
      color: black;
    } */

    .box {
      display: inline-block;
      padding: 10px 20px;
      margin: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .box:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.08);
    }
  </style>
</head>

<body>
  <div class="background">

    <div class="container">
      <h2><?php echo $cat; ?> books</h2>
      <ul class="book-list">
        <?php
       if ($SID == 'ACA') {
        $sql = "SELECT * FROM `booklist` WHERE `Catagory` LIKE '%CE%' OR `Catagory` LIKE '%ME%' OR `Catagory` LIKE '%ECE%' OR `Catagory` LIKE '%AP%' OR `Catagory` LIKE '%ET'";
      } elseif ($SID == 'NCA') {
        $sql = "SELECT * FROM `booklist` WHERE `Catagory` NOT LIKE '%CE%' AND `Catagory` NOT LIKE '%ME%' AND `Catagory` NOT LIKE '%ECE%' AND `Catagory` NOT LIKE '%AP%' AND `Catagory` NOT LIKE '%ET'";
      } else {
        // Regular SQL query
        $sql = "SELECT * FROM `booklist` WHERE `Catagory` LIKE '%$SID%'";
      }
        $result = mysqli_query($con, $sql);

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            // Retrieve data from the row
            $id=$row['id'];
            $title = $row['Title'];
            $author = $row['Author'];
            $cat = $row['Catagory'];
            $tcopy = $row['Total_copy'];
            $acopy = $row['Available_copy'];
            $cover = $row['cover'];
            echo '
    <li class="book-item">
      <img src="' . $cover . '" alt="Book">
      <div class="book-details">
        <a href="reserve-book.php?SID=' . $id . '">
        <div class="book-title">' . $title . '</div>
        <div class="book-author">' . $author . '</div>
         <!-- <div class="book-description">Description of the book goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
        <div class="book-category">' . $cat . '</div>
      </a>
      </div>
    </li>
';
          }
        } else {
          die("Error executing query: " . mysqli_error($con));
        }  ?>
        <!-- Add more books as needed -->
      </ul>

    </div>
    <!-- <div class="next-page-nav">
      <a href="#" class="box">Previous Page</a>
      <span>|</span>
      <a href="#" class="box">Next Page</a>
    </div> -->

    <!-- <footer>
      <div class="footer">
        <p>&copy; 2024 Your Library. All rights reserved.</p>
        <p>Address: 123 Library Street, City, Country</p>
        <p>Email: info@yourlibrary.com | Phone: +123-456-7890</p>
      </div>
    </footer> -->
    <?php
include("footer.php");
?>
  </div>
</body>

</html>
