<!doctype html>
<html lang="en">
<head>
    <?php
    require("components/style.php");
    ?>
    <title>GLR Reisbureau - Contact</title>
</head>
<body>
<?php require("components/navbar.php"); ?>
<section class="container mt-5 mb-10 card card-body" id="contact">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Naam</label>
                        <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Email</label>
                        <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Telefoon Nummer</label>
                        <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Onderwerp</label>
                        <input class="form-control" id="subject" type="text" placeholder="Subject" required="required" data-validation-required-message="Please enter your Subject." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Bericht</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br />
                <div id="success"></div>
                <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMessageButton" type="submit">Versturen</button></div>
            </form>
        </div>
        <div class="col-md-3 mx-auto mt-5 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="icon fas fa-map-marker-alt fa-2x"></i>
                    <p>Heer Bokelweg 255</p>
                </li>

                <li><i class="icon fas fa-phone mt-4 fa-2x"></i>
                    <p>+31 06548892893</p>
                </li>

                <li><i class="icon fas fa-envelope mt-4 fa-2x"></i>
                    <p>84669@glr.nl</p>
                </li>

                <li>
                    <img class="img-thumbnail mt-4 fa-2x" width="102" src="uploads/simg/grafisch-lyceum-rotterdam.png" alt="glr">
                    <a style="color: #0d6efd;" href="https://glr.nl"><p>Check Het GLR</p></a>
                </li>
            </ul>
        </div>
    </div>
    </div>
</section>
<?php require("components/footer.php"); ?>
<?php require("components/scripts.php"); ?>
</body>
</html>