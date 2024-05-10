<!DOCTYPE html>
<html lang="en">

<head>
    <title>Visit Reed's</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e2ebeb5a47.js" crossorigin="anonymous"></script>
    <script src="../js/showNav.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <ul class="navbar" id="top-navbar">
        <a href="javascript:void(0);" class="icon" onclick="showNav()">
            <i class="fa fa-bars"></i>
        </a>
        <a class="navItem active" href="#">Booking</a>
        <a class="navItem" href="../activities#">Activities</a>
        <a class="navItem" href="../lodging#">Lodging</a>
        <a class="navItem" href="../packages#">Packages</a>
        <a class="navItem" href="../menu#">Menu</a>
        <a class="navItem" href="../events#">Events</a>
        <a class="navItem" href="../#">Home</a>
        <a href="../index.html" class="logo">
            <img src="../img/ThinLogo1.svg">
        </a>
    </ul>

    <section class="header">
        <img src="../img/booking-header.jpg" alt="Header Image">
        <h1>Start your adventure!</h1>
    </section>

    <div id="toastBox"></div>

    <section class="booking-content">
        <div class="container">
            <div class="content-split">
                <div class="row-left">
                    <div class="cabin-selection">
                        <h3>Select your cabin</h3>
                        <div class="dropdown">
                            <select name="cabin" id="enterCabin">
                                <option> </option>
                                <option value="13230">Dreamcatcher</option>
                                <option value="13256">Rising Sun</option>
                                <option value="13378">Magnolia</option>
                                <option value="13567">Rockpath</option>
                            </select>
                        </div>
                        <img src="https://columbiawoodlands.com/assets/images/Dreamcatcher8.png" id="dreamcatcherImage" class="cabin-image">
                        <img src="../img/lodging-risingsun.jpg" id="risingSunImage" class="cabin-image">
                        <img src="../img/lodging-magnolia.png" id="magnoliaImage" class="cabin-image">
                        <img src="https://th.bing.com/th/id/R.b76360be6aa800366d1254faec23aed4?rik=l0uGFjIQiUopRQ&pid=ImgRaw&r=0" id="rockpathImage" class="cabin-image">
                        <br>


                        <h3>Select your event package</h3>
                        <div class="dropdown">
                            <select name="event" id="enterPackage">
                                <option> </option>
                                <option value="33333">Reed Romance</option>
                                <option value="33337">Adventure Haven</option>
                                <option value="33340">Tranquil Oasis</option>
                            </select>
                        </div>
                        <br>
                        <span class="total" id="total"></span>
                    </div>
                </div>

                <div class="row-right">
                    <span>
                        <h3>Booking information</h3>
                        <form action="index.php" method="post">
                            <input type="text" name="name" placeholder="Name">
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="phone" placeholder="Phone">
                            <input type="date" name="start_date" id="start_date" placeholder="Start Date">
                            <input type="date" name="end_date" id="end_date" placeholder="End Date">
                            <input type="number" name="guest_count" step="1" min="1" max="10" placeholder="Guest Count">
                            <input type="hidden" name="cabin_id" id="cabin_id">
                            <input type="hidden" name="package_id" id="package_id">
                            <input type="hidden" name="total_price" id="total_price">
                            <br>
                            <button type="submit" class="lodging-button">Submit</button>
                        </form>
                    </span>
                    <div id="booking-status"></div>
                    <?php

                        include 'database.php';

                        $min_customer_id = 100; // Assuming a minimum starting ID
                        $max_customer_id = 999999; // Assuming a maximum ID range
                        $customer_id = rand($min_customer_id, $max_customer_id);
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $start_date = $_POST['start_date'];
                        $end_date = $_POST['end_date'];
                        $cabin_id = $_POST['cabin_id'];
                        $event_id = $_POST['package_id'];
                        $guest_count = $_POST['guest_count'];
                        $total_price = $_POST['total_price'];

                        $sqlstatement = $conn->prepare("INSERT INTO customer_booking values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $sqlstatement->bind_param("isssssiiii", $customer_id, $name, $email, $phone, $start_date, $end_date, $event_id, $cabin_id, $guest_count, $total_price);

                        if ($sqlstatement->execute()) {
                            echo "<script>document.getElementById('booking-status').innerHTML = 'Booking successfully submitted!';</script>";
                        } else {
                            //echo "<script>document.getElementById('booking-status').innerHTML = 'Error: " . $conn->error . "';</script>";
                            echo "<script>document.getElementById('booking-status').innerHTML = 'An error has occurred""';</script>";
                        }

                        $sqlstatement->close();
                    ?>
                </div>
            </div>
            <div class="content-split">
                <div class="row-left">
                    <h3>Take me there!</h3>
                    <a href="https://www.google.com/maps/dir//Columbia+Woodlands+6593+Mckracken+Dr+NW+Dover,+OH+44622/@40.5779503,-81.5086791,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x8836e2f8f686ae35:0xb85ee71ad401a3dc!2m2!1d-81.5086791!2d40.5779503?entry=ttu"
                        target="_blank">
                        <button class="lodging-button">Directions</button>
                    </a>
                </div>
                <div class="row-right">
                    <h3>Check out our socials!</h3>
                    <div class="socials">
                        <a href="https://www.instagram.com/" target="_blank" class="fa-brands fa-instagram"></a>
                        <a href="https://www.facebook.com/" target="_blank" class="fa-brands fa-facebook"></a>
                        <a href="https://www.twitter.com/" target="_blank" class="fa-brands fa-x-twitter"></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="footer">
        <h2><a href="../booking#">© Reed's Retreat - (330) 131 1542</a></h2>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="../js/bookingImages.js"></script>
</body>

</html>
