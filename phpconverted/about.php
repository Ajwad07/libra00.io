<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Library</title>
    <!-- <link rel="stylesheet" type="text/css" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
            padding: 0px;
        }

        /* footer {
  margin-top: 170px;
  font-size: 20px;
  font-family: Arial, Helvetica, sans-serif;
  color: rgb(246, 241, 241);
  font-weight: bold;
  letter-spacing: 1.5px;
  background-color: rgb(2, 1, 9);
  border: 2px solid rgb(red, green, blue);
  padding: 25px;
  font-style: normal;
  text-align: center;
} */
        .top {
            background-image: url(https://cdn.pixabay.com/photo/2017/07/02/09/03/books-2463779_960_720.jpg);
            height: 350px;
            position: relative;
        }

        .name {
            background-color: #003f5c;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            background: rgba(255, 255, 255, .89);
            box-shadow: 2px 2px 24px 0 rgba(0, 0, 0, .1);
            padding: 30px 40px 30px 60px;
            position: absolute;
            top: 50%;
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
        }

        .name h1 {
            color: #0e271b;
        }

        .about {
            margin: 20px;
            /* background-color: #003f5c; */
            /* backdrop-filter: blur(1px); */
            background: #FFF;
            box-shadow: 2px 2px 24px 0 rgba(0, 0, 0, 1.1);
            display: inline-block;
            margin: 0 auto;
            margin-top: 50px;
            padding: 13px 105px 0;
            text-align: left;
            margin-left: 126px;
            margin-right: 30px;
            text-align: left;
            width: 75%;
            margin-bottom: 30px;

        }

        .about h2 {
            color: #006699;
        }

        .about p {
            text-align: justify;
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

        .about {
            animation: appear 0.5s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="top">
        <div class="name">
            <h1>CUET Library</h1>
        </div>
    </div>
    <div class="about">
        <h2>About The Library</h2>
        <p>
            The central library, CUET is one of the most essential organs of Chittagong University of Engineering and Technology ( CUET ). It plays a core activity as part of centre of excellence serving the time worthy library services in engineering education in Bangladesh.
        </p>
        <P>
            Now, keeping pace with the most resent tech. based library system, it is providing a numerous library services to the students, faculties, researches and scholars with its most up to date automated library system and services. The library is providing its on going services with the world famous library automated software koha. Apart from this, it has built its institutional repository with Dspace in where all the digital contents produced by CUET scholars and researchers are preserved here to be used as reference in future research activities.
        </P>
        <p>
            The central Library belongs a high powered committee to takes a necessary advice to develop itself time to time, which is consisted of 7 members in where the honorable vice-chancellor takes chair as the president and 5 faculty deans take chair as the members and Librarian takes chair as member secretary of the committee.
        </p>
        <p>
            The central library, CUET contains a large number of collection designed with national & international published books, hard copy journals, online journals and e-books, CD, DVD, thesis paper, dissertation, proceeding and so on. At present it belongs more than 52 thousand hard copy books, 1429 hardcopy journals, more than 2200 online journals and e-books, 890 CDs and DVDs on different collections.
        </p>
        <p>
            The central library provides services not only in the engineering education but also in country's socio economic, history and cultural development taking a special segment in the name of Bangabandhu, Liberation war & Independence of Bangladesh corner which contains a vast number books, rare videos, films and photos regarding our national great leader Bangabandhu Sheikh Mujibur Rahman and liberation war of Bangladesh.
        </p>
        <p>
            The central Library, CUET operates its services from two individual buildings placed as general section in old building and reference section, Bangabandhu and Liberation War & Independence of Bangladesh corner in new building. To operate the overall library services the new building belongs Librarian's and Deputy Librarian's office in new building and to operate the general section properly in old building, it belongs the Assistant Librarian's Office at old building also.
        </p>
        <p>
            The central library is kept functional and remained open from 9 A.M to 7 P.M. The general section is closed at 5 P.M. and reference section remains open under its going on services up to 7 P.M. The schedule is activated only in working days excluding all the weekly and govt. holidays declared by CUET authority.
        </p>
    </div>
    <!-- <footer>
        <p>All Copyright reserved by &copy; CUET Library
        </p>
    </footer> -->
</body>

</html>
<?php
include("footer.php");
?>
