<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .body{
            margin:0px;
            padding:0px ;
        }
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #e9e4e4; /* White background */
  color: #000000; /* Black text */
  background-image: url('catbgnd.png');
  background-size: contain;
}

.container {
    margin-top: 38px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap; 
  height: 100vh;
}
.container>a{
  color: black;
  text-decoration: none;
}
.container>a:hover{
  color: black;
  text-decoration: none;
}
.category-box>a:hover{
  color: black;
  text-decoration: none;
}
.category-box {
  text-align: center;
  padding: 20px;
  margin: 20px;
  width: 290px; /* Set width to 300px */
  height: 250px; /* Set height to 300px */
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow */
  transition: box-shadow 0.3s ease; /* Smooth transition */
  text-decoration: none; /* Remove underline from links */
  color: #000000; /* Black text */
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: white;
}

.category-box h2,
.category-box p {
  margin: 0;
}

.category-box:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); /* Larger box shadow on hover */
}

@keyframes appear {
  from {
    opacity: 0;
    transform: translateY(100%);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.category-box {
  animation: appear 0.5s ease-in-out;
}

    </style>
</head>
<body>
  
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Library Categories</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
  <a href="cat.php? SID=CE" class="category-box">
    <h2>CIVIL ENGINEERING</h2>
    <p>Click to visit dedicated section.</p>
  </a>
  <a href="cat.php? SID=ME" class="category-box">
    <h2>MECHANICAL ENGINEERING</h2>
    <p>Click to visit dedicated section.</p>
  </a>
  <a href="cat.php? SID=ECE" class="category-box">
    <h2>ELECTRICAL & COMPUTER ENG.</h2>
    <p>Click to visit dedicated section.</p>
  </a>
    <a href="cat.php? SID=AP" class="category-box">
      <h2>ARCHITECTURE & PLANNING</h2>
      <p>Click to visit dedicated section.</p>
  </a>
   <a href="cat.php? SID=ET" class="category-box">
    <h2>ENGINEERING & TECHNOLOGY</h2>
    <p>Click to visit dedicated section.</p>
  </a> 
  <a href="cat.php? SID=NCA" class="category-box">
    <h2>Non-academic</h2>
    <p>Click to visit dedicated section.</p>
  </a> 
</div>
</body>
</html>

</body>
</html>
<?php
include("footer.php");
?>
