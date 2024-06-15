<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Frequently Asked Questions</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            background-image: url(catbgnd.png);
        }
        @import url("https://fonts.googleapis.com/css2?family=Roboto&display=swap");

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Roboto", sans-serif;
        }

        .wrapper {
            max-width: 75%;
            margin: auto;
        }

        .wrapper>p,
        .wrapper>h1 {
            margin: 1.5rem 0;
            text-align: center;
        }

        .wrapper>h1 {
            letter-spacing: 3px;
            color: white;
        }

        .accordion {
            background-color: white;
            color: rgba(0, 0, 0, 0.8);
            cursor: pointer;
            font-size: 1.3rem;
            width: 100%;
            padding: 2rem 2.5rem;
            border: none;
            outline: none;
            transition: 0.4s;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        .accordion i {
            font-size: 1.6rem;
        }

        .active,
        .accordion:hover {
            background-color: #f1f7f5;
        }

        .pannel {
            padding: 0 2rem 2.5rem 2rem;
            background-color: white;
            overflow: hidden;
            background-color: #f1f7f5;
            display: none;
        }

        .pannel p {
            color: rgba(0, 0, 0, 0.7);
            font-size: 1.2rem;
            line-height: 1.4;
        }

        .faq {
            border: 1px solid rgba(0, 0, 0, 0.2);
            margin: 10px 0;
            text-align: justify;
            margin-bottom: 30px;
            margin-top: 30px;
        }

        .faq.active {
            border: none;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- <p>The Begninning of a New Asset class</p> -->
        <h1>Frequently Asked Questions</h1>

        <div class="faq">
            <button class="accordion">
                Lorem ipsum dolor sit.?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque necessitatibus reprehenderit repellendus, recusandae nesciunt excepturi!
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
            Lorem ipsum dolor sit amet. ?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ea hic culpa, dolorum reprehenderit veniam id voluptas illum ipsam eligendi
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
            Lorem ipsum dolor sit amet consectetur. ?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, ea itaque quis nihil corporis sunt? Dolores, recusandae a blanditiis similique praesentium officia sed cumque, rem placeat, quod libero voluptatum.
                </p>
            </div>
        </div>

        <div class="faq">
            <button class="accordion">
            Lorem ipsum dolor sit amet. ?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum sit quo nam fuga ut esse quia nesciunt, perferendis, necessitatibus repellendus enim deserunt consequatur fugit, quos saepe! Placeat asperiores cum error!
                </p>
            </div>
        </div>

        <!-- <div class="faq">
            <button class="accordion">
                How can I be a part of Krushi?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
                    saepe molestiae distinctio asperiores cupiditate consequuntur dolor
                    ullam, iure eligendi harum eaque hic corporis debitis porro
                    consectetur voluptate rem officiis architecto.
                </p>
            </div>
        </div> -->

        <!-- <div class="faq">
            <button class="accordion">
                How does it work?
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="pannel">
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis
                    saepe molestiae distinctio asperiores cupiditate consequuntur dolor
                    ullam, iure eligendi harum eaque hic corporis debitis porro
                    consectetur voluptate rem officiis architecto.
                </p>
            </div>
        </div> -->
    </div>

    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                this.parentElement.classList.toggle("active");

                var pannel = this.nextElementSibling;

                if (pannel.style.display === "block") {
                    pannel.style.display = "none";
                } else {
                    pannel.style.display = "block";
                }
            });
        }
    </script>
</body>

</html>
<?php
include("footer.php");
?>