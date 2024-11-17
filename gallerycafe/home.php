<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("location: singin.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/logo1.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/styless.css">
  <script>
        function showAlert() {
            alert("Booking confirmed!");
        }

        window.onload = function() {
            <?php if (isset($_SESSION['booking_confirmed'])): ?>
                showAlert();
                <?php unset($_SESSION['booking_confirmed']); // Clear the session variable after showing the alert ?>
            <?php endif; ?>
        };
    </script>
</head>

<body>
  <div class="preloader">
    <div class="wrapper-triangle">
    </div>
  </div>
  <div class="page">
    <!-- Page Header-->
    <header class="section page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px"
          data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-inner-outer">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand" href="home.php"><img class="brand-logo-dark" /></a></div>
              </div>
              <div class="rd-navbar-right rd-navbar-nav-wrap">
                <div class="rd-navbar-aside">
                  <ul class="rd-navbar-contacts-2">

                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left">
                          <i class="fa fa-user"></i>
                        </div>

                        <div class="unit-body"><a class="account" href=""><?php

                        $sakib = $_SESSION['email'];
                        include 'dpconnec.php';
                        $sql = "Select * from userinfo where email='$sakib'";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                          echo " ";

                          echo $row['fastname'];
                          echo " ";
                          echo $row['lastname'];
                          $myid = $row['userid'];

                        }
                        ?>
                          </a></div>
                      </div>
                    </li>
                    <?php
                    $number = 0;
                    $db = mysqli_connect("localhost", "root", "", "food");
                    $sql = "SELECT * FROM `cart` where userid='$myid'";
                    $result = mysqli_query($db, $sql);

                    while ($row = mysqli_fetch_array($result)) {

                      $number++;
                    }
                    ?>
                    <li>
                      <div class="unit unit-spacing-xs">
                        <div class="unit-left"><span class="fa-solid fa-phone"></span></div>
                        <div class="unit-body"><a class="phone" href="tel:#">0772569800</a></div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="rd-navbar-main">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="home.php">Home</a></li>
                    <li class="rd-nav-item "><a class="rd-nav-link" href="new.php"><span
                          class="fas fa-shopping-cart"></span><sup><?php echo $number; ?></sup> </a></li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.php">Contacts</a>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="userorder.php">Order</a>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="index.php">Logout</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- Swiper-->
    <section class="section swiper-container swiper-slider swiper-slider-2 swiper-slider-3" data-loop="true"
      data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
      <div class="swiper-wrapper text-sm-left">
        <div class="swiper-slide context-dark" data-slide-bg="images/bo.jpg">
          <div class="swiper-slide-caption section-md">
            <div class="container">
              <div class="row">
                <div class="col-sm-9 col-md-8 col-lg-7 col-xl-7 offset-lg-1 offset-xxl-0">
                  <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInUp"
                      data-caption-delay="0">Perfect pizza</span></h1>
                  <p class="big swiper-text" data-caption-animate="fadeInLeft" data-caption-delay="300">Experience the
                    taste of a perfect pizza at PizzaHouse, one of the best restaurants!</p><a
                    class="button button-lg button-primary button-winona button-shadow-2" href="#Ourmenu"
                    data-caption-animate="fadeInUp" data-caption-delay="300">View our menu</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-slide context-dark" data-slide-bg="images/foofbn2.jpg">
          <div class="swiper-slide-caption section-md">
            <div class="container">
              <div class="row">
                <div class="col-sm-8 col-lg-7 offset-lg-1 offset-xxl-0">
                  <h1 class="oh swiper-title"><span class="d-inline-block" data-caption-animate="slideInDown"
                      data-caption-delay="0">Quality ingredients</span></h1>
                  <p class="big swiper-text" data-caption-animate="fadeInRight" data-caption-delay="300">We use only the
                    best ingredients to make one-of-a-kind pizzas for our customers.</p>
                  <div class="button-wrap oh"><a class="button button-lg button-primary button-winona button-shadow-2"
                      href="" data-caption-animate="slideInUp" data-caption-delay="0">View our menu</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Swiper Pagination-->
      <div class="swiper-pagination" data-bullet-custom="true"></div>
      <!-- Swiper Navigation-->
      <div class="swiper-button-prev">
        <div class="preview">
          <div class="preview__img"></div>
        </div>
        <div class="swiper-button-arrow"></div>
      </div>
      <div class="swiper-button-next">
        <div class="swiper-button-arrow"></div>
        <div class="preview">
          <div class="preview__img"></div>
        </div>
      </div>
    </section>
    <!-- Search Functionality -->
    <section class="section section-md bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Search Menu</span></h3>
        <form method="GET" action="">
          <div class="row row-20 gutters-20">
            <div class="col-md-8">
              <input class="form-input" type="text" name="search"
                placeholder="Search by cuisine type (Sri Lankan, Chinese, Italian, etc.)" required>
            </div>
            <div class="col-md-4">
              <button class="button button-lg button-primary button-winona" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- Display Search Results -->
    <section class="section section-lg bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Search Results</span></h3>
        <div class="row row-lg row-30">
          <?php
          if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $db = mysqli_connect("localhost", "root", "", "food");
            $sql = "SELECT * FROM items WHERE cuisine LIKE '%$search%'";
            $res = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($res)) {
              $id = $row['id'];
              echo "
                            <div class='col-sm-6 col-lg-4 col-xl-3'>
                                <article class='product wow fadeInLeft' data-wow-delay='.15s'>
                                    <div class='product-figure'><img src='{$row['img']}' alt='' width='161' height='162'/></div>
                                    <div class='product-rating'><span class='mdi mdi-star'></span><span class='mdi mdi-star'></span><span class='mdi mdi-star'></span><span class='mdi mdi-star'></span><span class='mdi mdi-star text-gray-13'></span></div>
                                    <h3 class='product-title'>{$row['titel']}</h3>
                                    <h6 class='product-title'>{$row['details']}</h6>
                                    <div class='product-price-wrap'>
                                        <div class='product-price'>{$row['price']}/=</div>
                                    </div>
                                    <div class='product-button'>
                                        <div class='button-wrap'><a class='button button-xs button-primary button-winona' href='cart1.php?id=$id'>Add to cart</a></div>
                                    </div>
                                </article>
                            </div>";
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!-- What We Offer-->
    <section class="section section-md bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInDown">Our Menu</span></h3>
        <div class="row row-md row-30">
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInUp">
                <div class="services-terri-figure"><img src="images/salad.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-leaf"></span>
                  <h5 class="services-terri-title"><a href="#">Salads</a></h5>
                </div>
              </article>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInDown">
                <div class="services-terri-figure"><img src="images/gallery_01.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-pizza"></span>
                  <h5 class="services-terri-title"><a href="#">Pizzas</a></h5>
                </div>
              </article>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInUp">
                <div class="services-terri-figure"><img src="images/menu9.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-hamburger"></span>
                  <h5 class="services-terri-title"><a href="#">Burgers</a></h5>
                </div>
              </article>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInDown">
                <div class="services-terri-figure"><img src="images/foodbn.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-ice-cream"></span>
                  <h5 class="services-terri-title"><a href="#">Desserts</a></h5>
                </div>
              </article>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInUp">
                <div class="services-terri-figure"><img src="images/Drinks.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-coffee-cup"></span>
                  <h5 class="services-terri-title"><a href="#">Drinks</a></h5>
                </div>
              </article>
            </div>
          </div>
          <div class="col-sm-6 col-lg-4">
            <div class="oh-desktop">
              <!-- Services Terri-->
              <article class="services-terri wow slideInDown">
                <div class="services-terri-figure"><img src="images/Seafood.jpg" alt="" width="370" height="278" />
                </div>
                <div class="services-terri-caption"><span class="services-terri-icon linearicons-steak"></span>
                  <h5 class="services-terri-title"><a href="#">Seafood</a></h5>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Shop-->
    <section class="section section-lg bg-default">
      <div class="container">
        <h3 class="oh-desktop"><span class="d-inline-block wow slideInUp">Our Food Menu</span></h3>
        <div class="row row-lg row-30">
          <div class="col-sm-6 col-lg-4 col-xl-3">
            <!-- Product-->
            <?php
            $db = mysqli_connect("localhost", "root", "", "food");
            $sql = "select * from items";
            $res = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($res)) {
              $id = $row['id'];
              ?>
              <article class="product wow fadeInLeft" data-wow-delay=".15s">
                <div class="product-figure"><img src="<?php echo $row['img']; ?>" alt="" width="161" height="162" />
                </div>
                <div class="product-rating"><span class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                    class="mdi mdi-star"></span><span class="mdi mdi-star"></span><span
                    class="mdi mdi-star text-gray-13"></span>
                </div>
                <h3 class="product-title"><?php echo $row['titel']; ?></h3>
                <h6 class="product-title"><?php echo $row['details']; ?></h6>
                <div class="product-price-wrap">
                  <div class="product-price"><?php echo $row['price']; ?>/=</div>
                </div>
                <div class="product-button">
                  <?php echo " <div class='button-wrap'><a class='button button-xs button-primary button-winona' href='cart1.php?id=$id'>Add to cart</a></div>" ?>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 col-xl-3">
            <?php }
            ?>
    </section>
    <!-- What We Offer-->
    <section class="section section-xl bg-default">
      <div class="container">
        <h3 class="wow fadeInLeft">What People Say</h3>
      </div>
      <div class="container container-style-1">
        <div class="owl-carousel owl-style-12" data-items="1" data-sm-items="2" data-lg-items="3" data-margin="30"
          data-xl-margin="45" data-autoplay="true" data-nav="true" data-center="true" data-smart-speed="400">
          <!-- Quote Tara-->
          <article class="quote-tara">
            <div class="quote-tara-caption">
              <div class="quote-tara-text">
                <p class="q">PizzaHouse is the longest lasting pizza place in the city and is well run and staffed.
                  Prices are great and allow me to keep coming back.</p>
              </div>
              <div class="quote-tara-figure"><img src="images/user1.jpg" alt="" width="115" height="115" />
              </div>
            </div>
            <h6 class="quote-tara-author">Kanchana Samaraweera</h6>
            <div class="quote-tara-status">Client</div>
          </article>
          <!-- Quote Tara-->
          <article class="quote-tara">
            <div class="quote-tara-caption">
              <div class="quote-tara-text">
                <p class="q">I am a real pizza addict, and even when I’m home I prefer your pizzas to all others. They
                  taste awesome and are very affordable.</p>
              </div>
              <div class="quote-tara-figure"><img src="images/user2.jpeg" alt="" width="115" height="115" />
              </div>
            </div>
            <h6 class="quote-tara-author">Kalani Rajapksha </h6>
            <div class="quote-tara-status">Client</div>
          </article>
          <!-- Quote Tara-->
          <article class="quote-tara">
            <div class="quote-tara-caption">
              <div class="quote-tara-text">
                <p class="q">PizzaHouse has amazing pizza. Not only do you get served with a great attitude, you also
                  get delicious pizza at a great price!</p>
              </div>
              <div class="quote-tara-figure"><img src="images/user3.jpg" alt="" width="115" height="115" />
              </div>
            </div>
            <h6 class="quote-tara-author">Kamal Kathnayaka</h6>
            <div class="quote-tara-status">Client</div>
          </article>
          <!-- Quote Tara-->
          <article class="quote-tara">
            <div class="quote-tara-caption">
              <div class="quote-tara-text">
                <p class="q">PizzaHouse has great pizza. Not only do you get served with a great attitude and delivered
                  delicious pizza, you get a great price.</p>
              </div>
              <div class="quote-tara-figure"><img src="images/user4.jpg" alt="" width="115" height="115" />
              </div>
            </div>
            <h6 class="quote-tara-author">Nimal Wijekoon</h6>
            <div class="quote-tara-status">Client</div>
          </article>
        </div>
      </div>
    </section>
    <!-- Tell -->
    <section class="section section-sm section-first bg-default">
      <div class="container">
        <h3 class="heading-3">Book your Table</h3>
        <form id="booking-form" class="rd-form rd-mailform form-style-1" data-form-output="form-output-global"
          data-form-type="contact" method="POST" action="get_location.php">
          <div class="row row-20 gutters-20">
            <div class="col-md-6 col-lg-4 oh-desktop">
              <div class="form-wrap wow slideInDown">
                <input id="contact-your-name" class="form-input" type="text" name="name" data-constraints="@Required">
                <label class="form-label" for="contact-your-name">Your Name*</label>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 oh-desktop">
              <div class="form-wrap wow slideInUp">
                <input id="contact-email" class="form-input" type="email" name="email"
                  data-constraints="@Email @Required">
                <label class="form-label" for="contact-email">Your E-mail*</label>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 oh-desktop">
              <div class="form-wrap wow slideInUp">
                <input id="contact-date" class="form-input" type="date" name="date" data-constraints="@Date @Required">
              </div>
            </div>
            <div class="col-lg-4 oh-desktop">
              <div class="form-wrap wow slideInDown">
                <select id="booking-select" class="form-input" name="booking" data-minimum-results-for-search="Infinity"
                  data-constraints="@Required">
                  <option value="1">Select a Service</option>
                  <option value="lunch">Lunch</option>
                  <option value="breakfast">Breakfast</option>
                  <option value="dinner">Dinner</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap wow fadeIn">
                <label class="form-label" for="contact-message">Message</label>
                <textarea id="contact-message" class="form-input textarea-lg" name="message"
                  data-constraints="@Required"></textarea>
              </div>
            </div>
          </div>
          <div class="group-custom-1 group-middle oh-desktop">
            <button class="button button-lg button-primary button-winona wow fadeInRight" type="submit">Send
              Message
            </button>
          </div>
        </form>
        <div id="success-message" style="display: none; color: green;">Your booking has been successfully submitted!
        </div>
      </div>
    </section>

    <script>
      document.getElementById('booking-form').addEventListener('submit', function (event) {
        event.preventDefault();

        // Form validation
        var name = document.getElementById('contact-your-name').value.trim();
        var email = document.getElementById('contact-email').value.trim();
        var date = document.getElementById('contact-date').value.trim();
        var booking = document.getElementById('booking-select').value.trim();
        var message = document.getElementById('contact-message').value.trim();
        var errorMessage = '';

        if (name === '') {
          errorMessage += 'Name is required.\n';
        }
        if (email === '') {
          errorMessage += 'Email is required.\n';
        }
        if (date === '') {
          errorMessage += 'Date is required.\n';
        }
        if (booking === '' || booking === '1') {
          errorMessage += 'Please select a service.\n';
        }
        if (message === '') {
          errorMessage += 'Message is required.\n';
        }

        if (errorMessage !== '') {
          alert(errorMessage);
          return false; // Prevent form submission if there are errors
        }

        // If validation passes, allow the form to submit normally
        this.submit();
      });
    </script>

    <!-- Page Footer-->
    <footer class="section footer-modern context-dark footer-modern-2">
      <div class="footer-modern-line">
        <div class="container">
          <div class="row row-50">
            <div class="col-md-6 col-lg-4">
              <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">What We
                  Offer</span></h5>
              <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                <li><a href="#">Pizzas</a></li>
                <li><a href="#">Burgers</a></li>
                <li><a href="#">Salads</a></li>
                <li><a href="#">Drinks</a></li>
                <li><a href="#">Seafood</a></li>
                <li><a href="#">Drinks</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
              <h5 class="footer-modern-title oh-desktop"><span class="d-inline-block wow slideInLeft">Information</span>
              </h5>
              <ul class="footer-modern-list d-inline-block d-sm-block wow fadeInUp">
                <li><a href="about-us.html">About us</a></li>
                <li><a href="#">Latest News</a></li>
                <li><a href="#">Our Menu</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="contacts.php">Contact Us</a></li>
              </ul>
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  </footer>
  </div>
  <!-- Global Mailform Output-->
  <div class="snackbars" id="form-output-global"></div>
  <!-- Javascript-->
  <script src="js/core.min.js"></script>
  <script src="js/script.js"></script>
  <!-- coded by Himic-->
</body>

</html>