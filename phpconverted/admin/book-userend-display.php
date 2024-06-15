<?php
include 'connect-w-book-list.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library - Books</title>
    <link rel="stylesheet" href="/header.css">
    <link rel="stylesheet" href="/footer.css">
    <link rel="stylesheet" href="nextpagenav.css">
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

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('libbg.jpg');
            background-size: cover;
            background-attachment: fixed;
        }

        .background {
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            backdrop-filter: blur(5px);
        }

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
    </style>
</head>

<body>
    <div class="background">
        <header>
            <div class="header">
                <div class="left_header"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/9/9a/CUET_Vector_ogo.svg/330px-CUET_Vector_ogo.svg.png" alt=""><a href="/index.html">Library</a>
                </div>
                <div class="right_header">
                    <div class="nav"><a href="/about.html">About</a></div>
                    <div class="nav"><a href="/catagories/all-catagory.html">Catagories</a></div>
                    <div class="nav"><a href="/login.html">Log-in</a></div>
                    <div class="nav"><a href="#">contact</a></div>
                </div>
                <div class="sbutton"><input type="text" placeholder="Search.." name="search"><button type="submit" value="search">Go</button></div>
            </div>
    </div>
    </header>

    <div class="container">
        <h2>Catagory book list</h2>
        <?php // php for displaying data in table rowwise
        $cat='scifi';
                $sql = "Select * from `booklist` where Catagory='$cat'";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        //  $idx= $row['Ix'];
                        $title = $row['Title'];
                        $author = $row['Author'];
                        $cat = $row['Catagory'];
                        $cover=$row['cover'];
                        echo'
                        <ul class="book-list">
            <li class="book-item">
                <img src="' . $cover . '" alt="Book 1"style="max-width: 100px;height:100px;>
                <div class="book-details">
                    <a href="google.com?id='.$title.'">
                        <div class="book-title">'.$title.'</div>
                        <div class="book-author">'.$author.'</div>
                        <!-- <div class="book-description">Description of the book goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
                        <div class="book-category">'.$cat.'</div>
                    </a>
                </div>
            </li>
            </ul>';
            // <!-- <li class="book-item">
            //     <img src="https://th.bing.com/th/id/OIP.nEpZPN13US56BTsZ9yelygHaHa?rs=1&pid=ImgDetMain" alt="Book 2">
            //     <div class="book-details">
            //         <div class="book-title">Book Title 2</div>
            //         <div class="book-author">Author Name</div> -->
            //         <!-- <div class="book-description">Description of the book goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
            //         <!-- <div class="book-category">Non-Fiction</div>
            //     </div>
            // </li> -->
            // <!-- <li class="book-item">
            //     <img src="https://th.bing.com/th/id/OIP.nEpZPN13US56BTsZ9yelygHaHa?rs=1&pid=ImgDetMain" alt="Book 2">
            //     <div class="book-details">
            //         <div class="book-title">Book Title 2</div>
            //         <div class="book-author">Author Name</div>
            //         <div class="book-description">Description of the book goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div> -->
            //         <!-- <div class="book-category">Non-Fiction</div>
            //     </div>
            // </li> -->
            // <!-- Add more books as needed -->
                        }    }
        ?>
    </div>
    <div class="next-page-nav">
        <a href="#" class="box">Previous Page</a>
        <span>|</span>
        <a href="#" class="box">Next Page</a>
    </div>

    <footer>
        <div class="footer">
            <p>&copy; 2024 Your Library. All rights reserved.</p>
            <p>Address: 123 Library Street, City, Country</p>
            <p>Email: info@yourlibrary.com | Phone: +123-456-7890</p>
        </div>
    </footer>
    </div>
</body>
</html>