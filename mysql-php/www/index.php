<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

   <title>Gym Database</title>
	<?php require_once('header.php'); ?>


    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <!-- Preloader Start -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- Preloader End -->


    <!--  Header Area Start -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="index.html" class="logo"><em>Gym</em></a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#features">Programs</a></li>
                            <li class="scroll-to-section"><a href="#our-halls">Our halls</a></li>
                            <li class="scroll-to-section"><a href="#schedule">Schedules</a></li>
                            <li class="scroll-to-section"><a href="#trainers">Trainers</a></li>
                            <li class="scroll-to-section"><a href="#testimonials">Testimonials</a></li>
                            <li class="scroll-to-section"><a href="#price">Price</a></li>
                            <li class="scroll-to-section main-button"><a href="#contact-us">Contact</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <div class="main-banner" id="top">
        <div class="img-overlay header-text">
            <div class="caption">
                <h6>work harder, get stronger</h6>
                <h2>easy with our <em>gym</em></h2>
                <div class="main-button scroll-to-section">
   <!--  TODO: need to change it so if the button become member is clicked then it will prompt them to sign in or sign up -->
                    <a href="#features">Become a member</a>
                    <a>Login In 
                    <!-- ?php require_once('connection.php'); ?> -->
                    </a>
                 
                </div>
            </div>
        </div>
    </div>
    
<div class="container-fluid mt-3 mb-3">
    <ul>
<li><a href="classes.php">Basic information about classes</a></li>  
<li><a href="member.php">Information about members</a></li>    
  
    </ul>
</div>

    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Choose <em>Program</em></h2>
                        <p>Mega Gym is a template for gyms and fitness centers. You can use this layout for your
                            business website.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon1.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>Basic Fitness</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon2.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>New Gym Training</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon3.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>Basic Muscle Course</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon4.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>Advanced Muscle Course</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon5.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>Yoga Training</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/features-first-icon6.png" alt="program">
                            </div>
                            <div class="right-content">
                                <h4>Body Building Course</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat commodi quos autem
                                    illum illo quam.</p>
                                <a href="#" class="text-button">More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don’t <em>think</em>, begin <em>today</em>!</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet ex in consequatur voluptatem
                            distinctio atque, incidunt eum omnis, perspiciatis odit excepturi error itaque alias? Magnam
                            soluta quos nobis odio qui.</p>
                        <div class="main-button scroll-to-section">
                            <a href="#our-classes">Become a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="our-halls">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Sports Halls</em></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur culpa labore vel dolorem
                            ad perferendis illum nesciunt fugiat modi numquam.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
                <div class="col-lg-4 mb-5">
                    <ul>
                        <li>
                            <a href='#tabs-1'><img src="assets/images/tabs-first-icon.png" alt="classes">First hall</a>
                        </li>
                        <li>
                            <a href='#tabs-2'><img src="assets/images/tabs-first-icon.png" alt="classes">Second
                                hall</a>
                        </li>
                        <li>
                            <a href='#tabs-3'><img src="assets/images/tabs-first-icon.png" alt="classes">Third
                                hall</a>
                        </li>
                        <li>
                            <a href='#tabs-4'><img src="assets/images/tabs-first-icon.png" alt="classes">Fourth
                                hall</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-8">
                    <section class='tabs-content'>
                        <article id='tabs-1'>
                            <img src="assets/images/halls/halls-1.jpg" alt="First hall">
                            <h4>Basic Fitness</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex animi corrupti eaque
                                facilis? Sunt maxime dolorum fuga, officiis sit inventore doloribus soluta quos,
                                repellat quis ratione animi aut earum ad nemo error odit mollitia? Non repellat
                                voluptatem porro consequatur totam distinctio, facilis unde aliquam dignissimos suscipit
                                ex id quis a.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-2'>
                            <img src="assets/images/halls/halls-2.jpg" alt="Second hall">
                            <h4>Advanced Muscle Course</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex animi corrupti eaque
                                facilis? Sunt maxime dolorum fuga, officiis sit inventore doloribus soluta quos,
                                repellat quis ratione animi aut earum ad nemo error odit mollitia? Non repellat
                                voluptatem porro consequatur totam distinctio, facilis unde aliquam dignissimos suscipit
                                ex id quis a.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-3'>
                            <img src="assets/images/halls/halls-3.jpg" alt="Third hall">
                            <h4>Yoga Training</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex animi corrupti eaque
                                facilis? Sunt maxime dolorum fuga, officiis sit inventore doloribus soluta quos,
                                repellat quis ratione animi aut earum ad nemo error odit mollitia? Non repellat
                                voluptatem porro consequatur totam distinctio, facilis unde aliquam dignissimos suscipit
                                ex id quis a.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                        <article id='tabs-4'>
                            <img src="assets/images/halls/halls-4.jpg" alt="Fourth hall">
                            <h4>Body Building Course</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex animi corrupti eaque
                                facilis? Sunt maxime dolorum fuga, officiis sit inventore doloribus soluta quos,
                                repellat quis ratione animi aut earum ad nemo error odit mollitia? Non repellat
                                voluptatem porro consequatur totam distinctio, facilis unde aliquam dignissimos suscipit
                                ex id quis a.</p>
                            <div class="main-button">
                                <a href="#schedule">View Schedule</a>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Classes <em>Schedule</em></h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt deleniti est fugit itaque
                            repellendus. Animi molestias quod in officiis molestiae aperiam, nihil est maxime similique
                            voluptatem culpa inventore fugit deserunt.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters">
                        <ul class="schedule-filter">
                            <li class="active" data-tsfilter="monday">Monday</li>
                            <li data-tsfilter="tuesday">Tuesday</li>
                            <li data-tsfilter="wednesday">Wednesday</li>
                            <li data-tsfilter="thursday">Thursday</li>
                            <li data-tsfilter="friday">Friday</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time">Fitness Class</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                    <td>William G. Stewart</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Muscle Training</td>
                                    <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="thursday">
                                        2:00PM - 3:30PM</td>
                                    <td>Paul D. Newman</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Body Building</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                    <td>Boyd C. Harris</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga Training Class</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Hector T. Daigle</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Advanced Training</td>
                                    <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                    <td>Bret D. Bowers</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mb-5" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our <em>Trainers</em></h2>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum iure quasi consequatur
                            doloremque natus iusto labore laborum laboriosam odit veritatis alias fugit possimus
                            voluptatem maxime, suscipit tempora? Tempore, hic. Molestiae!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/trainer.jpg" alt="trainers">
                        </div>
                        <div class="down-content">
                            <span>Strength Trainer</span>
                            <h4>Bret D. Bowers</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatibus, deleniti
                                quidem ipsa sunt qui. Ex quasi ut error non.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/trainer.jpg" alt="trainers">
                        </div>
                        <div class="down-content">
                            <span>Muscle Trainer</span>
                            <h4>Hector T. Daigl</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatibus, deleniti
                                quidem ipsa sunt qui. Ex quasi ut error non.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/trainer.jpg" alt="trainers">
                        </div>
                        <div class="down-content">
                            <span>Power Trainer</span>
                            <h4>Paul D. Newman</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate voluptatibus, deleniti
                                quidem ipsa sunt qui. Ex quasi ut error non.</p>
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="section-testimonial" id="testimonials">
        <div class="col-lg-6 offset-lg-3">
            <div class="section-heading">
                <h2><em>Testimonials</em></h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum iure quasi consequatur
                    doloremque natus iusto labore laborum laboriosam odit veritatis alias fugit possimus
                    voluptatem maxime, suscipit tempora? Tempore, hic. Molestiae!</p>
            </div>
        </div>
        <div class="karusetulava">
            <div>
                <figure class="testimonial">
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos provident eligendi ex.
                        Quae velit vitae quos iure laborum accusantium error, labore incidunt asperiores quaerat sit
                        libero vel porro nulla, aliquid obcaecati quo optio qui illo pariatur fugit molestias nisi
                        nobis. Totam eius voluptatum beatae sed, quibusdam libero eos magnam impedit.
                    </blockquote>
                    <img src="assets/images/testimonials/testimonial-avatar-1.jpg" alt="testimonial">
                    <div class="peopl">
                        <h3>John Smith</h3>
                        <p class="indentity">Program participant</p>
                    </div>
                </figure>
            </div>
            <div>
                <figure class="testimonial">
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos provident eligendi ex.
                        Quae velit vitae quos iure laborum accusantium error, labore incidunt asperiores quaerat sit
                        libero vel porro nulla, aliquid obcaecati quo optio qui illo pariatur fugit molestias nisi
                        nobis. Totam eius voluptatum beatae sed, quibusdam libero eos magnam impedit.
                    </blockquote>
                    <img src="assets/images/testimonials/testimonial-avatar-2.jpg" alt="testimonial">
                    <div class="peopl">
                        <h3>John Smith</h3>
                        <p class="indentity">Program participant</p>
                    </div>
                </figure>
            </div>
            <div>
                <figure class="testimonial">
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos provident eligendi ex.
                        Quae velit vitae quos iure laborum accusantium error, labore incidunt asperiores quaerat sit
                        libero vel porro nulla, aliquid obcaecati quo optio qui illo pariatur fugit molestias nisi
                        nobis. Totam eius voluptatum beatae sed, quibusdam libero eos magnam impedit.
                    </blockquote>
                    <img src="assets/images/testimonials/testimonial-avatar-3.jpg" alt="testimonial">
                    <div class="peopl">
                        <h3>John Smith</h3>
                        <p class="indentity">Program participant</p>
                    </div>
                </figure>
            </div>
            <div>
                <figure class="testimonial">
                    <blockquote>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos provident eligendi ex.
                        Quae velit vitae quos iure laborum accusantium error, labore incidunt asperiores quaerat sit
                        libero vel porro nulla, aliquid obcaecati quo optio qui illo pariatur fugit molestias nisi
                        nobis. Totam eius voluptatum beatae sed, quibusdam libero eos magnam impedit.
                    </blockquote>
                    <img src="assets/images/testimonials/testimonial-avatar-4.jpg" alt="testimonial">
                    <div class="peopl">
                        <h3>John Smith</h3>
                        <p class="indentity">Program participant</p>
                    </div>
                </figure>
            </div>
        </div>
    </div>

    <div class="pricing pricing--yama pb-5 row" id="price">
        <div class="col-lg-12">
            <div class="section-heading">
                <h2>Price</h2>
                <p class="text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum iure quasi
                    consequatur
                    doloremque natus iusto labore laborum laboriosam odit veritatis alias fugit possimus
                    voluptatem maxime, suscipit tempora? Tempore, hic. Molestiae!</p>
            </div>
        </div>
        <div class="pricing__item col-lg-3 col-md-6 col-sm-12">
            <h3 class="pricing__title">Basic</h3>
            <div class="pricing__price"><span class="pricing__currency">$</span>199<span
                    class="pricing__period">/month</span></div>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
            </ul>
            <a href="#" class="pricing__action">Choose plan</a>
        </div>
        <div class="pricing__item col-lg-3 col-md-6 col-sm-12">
            <h3 class="pricing__title">Standart</h3>
            <div class="pricing__price"><span class="pricing__currency">$</span>350<span
                    class="pricing__period">/month</span></div>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
            </ul>
            <a href="#" class="pricing__action">Choose plan</a>
        </div>
        <div class="pricing__item col-lg-3 col-md-6 col-sm-12">
            <h3 class="pricing__title">Popular</h3>
            <div class="pricing__price"><span class="pricing__currency">$</span>450<span
                    class="pricing__period">/month</span></div>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
            </ul>
            <a href="#" class="pricing__action">Choose plan</a>
        </div>
        <div class="pricing__item col-lg-3 col-md-6 col-sm-12">
            <h3 class="pricing__title">Premium</h3>
            <div class="pricing__price"><span class="pricing__currency">$</span>899<span
                    class="pricing__period">/month</span>
            </div>
            <ul class="pricing__feature-list">
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
                <li class="pricing__feature">Lorem, ipsum dolor.</li>
            </ul>
            <a href="#" class="pricing__action">Choose plan</a>
        </div>
    </div>

    <section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 w-100 p-0">
                    <div class="note"></div>
                    <div class="contact-form fields">
                        <h2 class="text-center text-white mb-5">Get in Touch</h2>
                        <form class="contact ajax-contact-form" action="">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input name="name" type="text" id="name" placeholder="Name" required>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="Email" required>
                                </div>
                                <div class="col-lg-12 w-100">
                                    <textarea name="message" rows="6" id="message" placeholder="Message"
                                        required></textarea>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="submit" class="main-button">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <h3 class="footer-logo">Gym</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti natus, reiciendis, inventore
                        placeat sapiente dolor incidunt et quo voluptates, officiis eaque. Reprehenderit, officia
                        laborum. Quae modi praesentium dolorem quibusdam nobis!</p>
                    <ul class="list-unstyled socila-list">
                        <li><a href="#"><img src="assets/images/social/facebook.png" alt="facebook"></a></li>
                        <li><a href="#"><img src="assets/images/social/twitter.png" alt="twitter"></a></li>
                        <li><a href="#"><img src="assets/images/social/youtube.png" alt="youtube"></a></li>
                        <li><a href="#"><img src="assets/images/social/instagram.png" alt="instagram"></a></li>
                        <li><a href="#"><img src="assets/images/social/linkedin.png" alt="linkedin"></a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h3>Latest news</h3>
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="assets/images/last-news.png" alt="" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Basic Fitness</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="assets/images/last-news.png" alt="" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Yoga Training</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="media">
                        <a href="#" class="pull-left">
                            <img src="assets/images/last-news.png" alt="" class="media-object">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Body Building</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3>Our Partners</h3>
                    <img class="img-thumbnail" src="assets/images/our-partners.jpg" alt="partners">
                    <img class="img-thumbnail" src="assets/images/our-partners.jpg" alt="partners">
                    <img class="img-thumbnail" src="assets/images/our-partners.jpg" alt="partners">
                    <img class="img-thumbnail" src="assets/images/our-partners.jpg" alt="partners">
                </div>
            </div>
        </div>
        <div class="copyright text-center text-white">
            Copyright © 2021
        </div>
    </footer>

    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/contactform.js"></script>
    <script src='https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js'></script>

</body>

</html>