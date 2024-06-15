<?php
include("header.php");
include 'connect-w-book-list.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library.com</title>
  <link rel="stylesheet" href="index1.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Ubuntu', sans-serif;
      width: 100%;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    h1 {
      width: 100%;
      height: 100vh;
      line-height: 80vh;
      text-align: center;
      display: block;
      font-size: 60px;
    }

    .view {
      width: 100%;
      display: flex;
      align-items: center;
      flex-wrap: wrap;
    }

    .block {
      height: 200px;
      width: 300px;
      margin: 50px;
      border: 0.5mm solid black;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
      opacity: 0;
      transform: translateY(50px);
      animation: appear 1s ease-out forwards;
      animation-delay: var(--delay, 0s);
    }

    @keyframes appear {
      from {
        opacity: 0;
        transform: translateY(50px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .category-box {
      opacity: 0;
      transform: translateY(50px);
      animation: appear 1s ease-out forwards;
      animation-delay: var(--delay, 0s);
    }

    .category-box:nth-child(1) {
      --delay: 0s;
    }

    .category-box:nth-child(2) {
      --delay: 0.2s;
    }

    /* ... (mandatory CSS styles) ... */

    .recent-notices {
      margin-top: 50px;
      text-align: center;
      margin-right: 0px;
    }

    .recent-notices h2 {
      margin-bottom: 20px;
      color: #ffffff;
      /* White text color */
      font-weight: 700;
      /* Normal font weight */
      font-size: 24px;
      /* Larger font size for better visibility */
      text-shadow: 0 3px 3px rgba(0, 0, 0, 26.2);
      /* Add a text shadow for better visibility */
      /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); Add a box shadow for better visibility */
    }

    .notice-box {
      display: inline-block;
      width: 300px;
      margin: 20px;
      padding: 20px;
      background-color: #f5f5f5;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      text-align: left;
      border: 1px solid #ccc;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .notice-box h3 {
      margin-top: 0;
      font-weight: bold;
      color: #333;
    }

    /* .recent-notices>a {

      text-decoration: none;
    }

    .recent-notices>a:hover {

      text-decoration: none;
    } */

    .notice-box p {
      margin-bottom: 10px;
      font-size: 16px;
      color: #666;
    }

    .notice-box img {
      width: 100px;
      height: 100px;
      margin: 10px;
      border-radius: 5px;
    }

    .see-all-btn {
      display: inline-block;
      margin-top: -20px;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }

    .see-all-btn:hover {
      background-color: #fff;
      color: #007bff;
      text-decoration: none;
    }

    .table-container {
      margin: 50px auto;
      text-align: center;
      width: 80%;
      margin-left: 10%;
      margin-right: 10%;
    }


    .table {
      width: 80%;
      margin: 0 auto;
      border-collapse: collapse;
      background-color: #a7c2bbc4;
      border: 1px solid #343a40;
      /* margin-right: 0px; */
    }

    .table th,
    .table td {
      padding: 10px;
      border: 1px solid #343a40;
    }
    .table td a{
    text-decoration: none;
    color: black;
    }
    .table th {
      background-color: #343a40;
      color: #ffffff;

    }

    .table tbody tr:nth-child(even) {
      background-color: #e9ecef;
    }
  </style>
</head>

<body>
  <div class="recent-notices">
    <h2>Recent Notices</h2>
    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Image</th>
            <th scope="col">Date Posted</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `notices`";
          $result = mysqli_query($con, $sql);

          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $title = $row['title'];
              $content = $row['content'];
              $date_posted = $row['date_posted'];
              $image = $row['image'];
              $id = $row['id']; // Get the ID of the notice

              echo '<tr>
        <td><a href="notice.php?SID=' . $id . '">' . $title . '</a></td>
        <td>' . $content . '</td>
        <td><img src="' . $image . '" alt="Notice Image" style="max-width: 100px;height:100px;"></td>
        <td>' . $date_posted . '</td>
      </tr>';
            }
          }
          ?>

        </tbody>
      </table>
    </div>
    <a href="notices.php" class="see-all-btn">See All Notices</a>
  </div>
  <div class="middle">
    <div class="container">
      <a href="cat.php?SID=ACA" class="category-box">
        <h2 style="color:black">Academic</h2>
        <p style="color:black">Click to visit academic section</p>
      </a>
      <a href="cat.php?SID=NCA" class="category-box">
        <h2 style="color:black">Non-Academic</h2>
        <p style="color:black">Click to visit Non-academic section</p>
      </a>
    </div>
  </div>

  <?php include("footer.php"); ?>
</body>

</html>