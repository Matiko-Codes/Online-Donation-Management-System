<?php
session_start();
require 'database.php';

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit_details'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $donation_type = mysqli_real_escape_string($conn, $_POST['donation_type']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $query = "INSERT INTO donations (name, mobile, donation_type, address, message) VALUES ('$name', '$mobile', '$donation_type', '$address', '$message')";

        $query_run = mysqli_query($conn, $query);
        if ($query_run) {
            echo "<script>alert('Details submitted successfully.');</script>";
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Failed to submit details.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>This Is Me Organisation
    </title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="fixed-top">

        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <a class="navbar-brand" href="#home">This Is Me Organization</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#donation">Donations</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#mission-id">Missions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <div class="cont-sec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Contact No : <a href="tel: +2541124***81">+2541124***81</a></p>
                    </div>
                    <div class="col-lg-6">
                        <div class="social">
                            <a href="#"><img src="img/icons/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="img/icons/instagram.png" alt="inatagram"></a>
                            <a href="#"><img src="img/icons/youtube.png" alt="youtube"></a>
                            <a href="#"><img src="img/icons/linkedin.png" alt="linkedin"></a>
                            <a href="#"><img src="img/icons/gmail.png" alt="gmail"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <section class="home-sec" id="home">
        <div class="container">
            <div class="home-content">
                <div class="row">
                    <div class="col-lg-6 align-item-center">
                        <div class="home-info">
                            <h1>Alone we can do little, together we can do so much</h1>
                            <h2>We <span>This Is Me Organization</span> carry out community outreach projects for the marginalised in the society.</h2>
                            <p>Our Mantra is <span> We give love, then recieve love and then give it back</span>.</p>
                            <div class="buttons">
                                <a href="#contact" class="btn1">Donate now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-first order-lg-last">
                        <div class="img-sec">
                            <img src="img/img-1.png" alt="home-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="don-sec" id="donation">
        <div class="container">
            <div class="heading">
                <h2>What you can donate..</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/clothing.png" alt="img">
                        <h3>Clothes</h3>
                        <p>Any clothing items you may have old or new that is still in good conditons.</p>
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/sneakers.png" alt="img">
                        <h3>Footware</h3>
                        <p>Shoes, sandals and crocs.</p>
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/salary.png" alt="img">
                        <h3>Fund</h3>
                        <p>For any monetary fund, please donate here.</p>
                        <a href="https://www.mchanga.africa/fundraiser/57241#donatenow" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/gadgets.png" alt="img">
                        <h3>Gadgets</h3>
                        <p>We also take your old gadgets, playstations, gameboys etc to help put a smile on a child's face.</p>
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/book.png" alt="img">
                        <h3>Stationary</h3>
                        <p>For all reading and writing materials, please donate here.</p>
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="don-box">
                        <img src="img/don/shopping-bag.png" alt="img">
                        <h3>Food</h3>
                        <p>Dry foods like cereals should be directed here.</p>
                        <a href="#contact" class="btn1">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mission" id="mission-id">
        <div class="container">
            <div class="heading">
                <h2>Our Missions</h2>
                <p>We have delivered <span>Donations</span> to the marginalisedin our community through our outreach programs</p>
            </div>
            <div class="gallery-sec">
                <div class="container">
                    <div class="image-container">
                        <div class="image"><img src="img/miss/1.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/2.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/3.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/4.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/5.jpg" alt="img"></div>
                        <div class="image"><img src="img/miss/6.jpg" alt="img"></div>
                    </div>
                </div>
                <div class="pop-image">
                    <span>&times;</span>
                    <img src="img/gallery/1.jpg" alt="gallery-img">
                </div>
                </di v>
            </div>
    </section>

    <section class="about-sec" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 about-img">
                    <img src="img/img-2.jpeg" alt="about">
                </div>
                <div class="col-lg-8 order-first order-lg-last">
                    <div class="heading">
                        <h2>What We Do & Why We Do</h2>
                    </div>
                    <p>We are a Community Challenging the way we exist by finding ways to leverage humanity for good and achieve the Sustainable Development Goals ♻️ </p>
                    <p>To work towards restoring human dignity & spreading good vibes and love.</p>
                </div>
            </div>
        </div>
    </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
        <div class="container">
            <div class="heading">
                <h2>Connect With Us</h2>
                <p>Fill this form, our team will collect your <span>Donation</span> from your place.</p>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <form class="contact-form" method="post" action="">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                                             </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Mobile No." name="mobile" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <select name="donation_type" id="donation">
                                                    <option value="">Donation</option>
                                                    <option value="food">Food</option>
                                                    <option value="clothes">Clothes</option>
                                                    <option value="footware">Footware</option>
                                                    <option value="books">Books</option>
                                                    <option value="fund">Fund</option>
                                                    <option value="gadget">Electroncs/Gadgets</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Address" name="address" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="" cols="30" rows="10" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button type="submit" class="btn1 mt-5" name="submit_details" id="submitBtn">Submit Details</button>
                                    </div>
                                    <div style="margin-top: 40px;"></div>
                                    <div class="container">
                                        <a href="logout.php" class="btn btn-warning">Logout</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-lg-4">
                    <div class="col-one">
                        <h4>This Is Me Organisation</h4>
                        <p>Address : Nairobi Kenya </p>
                        <p>Contact No : <a href="tel: +2541124***81">+2541124***81</a></p>
                        <p>Email : <a href="mailto:thisimeorg@gmail.com">thisimeorg@gmail.com</a></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-two">
                        <h4>Important Links</h4>
                        <ul>
                            <li><a href="#home">Home</a></li>
                            <li><a href="#donation">Donations</a></li>
                            <li><a href="#mission-id">Missions</a></li>
                            <li><a href="#about">About us</a></li>
                            <li><a href="#contact">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-one">
                        <h4>Social Media</h4>
                        <div class="social">
                            <a href="#"><img src="img/icons/facebook.png" alt="facebook"></a>
                            <a href="#"><img src="img/icons/instagram.png" alt="instagram"></a>
                            <a href="#"><img src="img/icons/youtube.png" alt="youtube"></a>
                            <a href="#"><img src="img/icons/linkedin.png" alt="linkedin"></a>
                            <a href="#"><img src="img/icons/gmail.png" alt="gmail"></a>
                        </div>
                        <p>Copyright &copy; 2023 | All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>