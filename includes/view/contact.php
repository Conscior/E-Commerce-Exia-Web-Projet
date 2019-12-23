<?php session_start(); ?>
    <!DOCTYPE html>
    <head>
   <?php 
        include '../model/head.php';
   ?>
   <title>contacts </title>
    </head>
    <body class="animsition">
    
    

    <?php
        include '../model/navbar.php' ;
    ?>
 

 <!-- Title Page -->
      <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(../../assets/white-walls-1764702.jpg);">
        <h2 class="tit6 t-center">
            Contact
        </h2>
    </section>



    <!-- Contact form -->
    <section class="section-contact bg1-pattern p-t-90 p-b-113">
        <!-- Map -->
        <div class="container">
            <div class="map bo8 bo-rad-10 of-hidden">
                <!--data-pin="images/icons/icon-position-map.png" 
                
                class="contact-map size37" id="google_map" data-map-x="40.704644" data-map-y="-74.011987" data-scrollwhell="0" data-draggable="1"
            
            -->
                <div class="contact-map size37">
                    <iframe  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3198.312879334184!2d3.047367664682947!3d36.71504628018925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128fada4909aa095%3A0x3305a5234fd4d3b!2sBirkhadem%20centre-ville%2C%20Birkhadem!5e0!3m2!1sfr!2sdz!4v1571848449092!5m2!1sfr!2sdz" width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>

        <div class="container">
            <h3 class="tit7 t-center p-b-62 p-t-105">
                Send us a Message
            </h3>

            <form class="wrap-form-reservation size22 m-l-r-auto" method="POST" action="../processing/processing_contact_us.php" >
                <div class="row">
                    <div class="col-md-4">
                        <!-- Name -->
                        <span class="txt9">
                            Name
                        </span>

                        <div class="wrap-inputname size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name" required/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Email -->
                        <span class="txt9">
                            Email
                        </span>

                        <div class="wrap-inputemail size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="email" placeholder="Email" required/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Phone -->
                        <span class="txt9">
                            Phone (213-XXX-XXX-XX)
                        </span>

                        <div class="wrap-inputphone size12 bo2 bo-rad-10 m-t-3 m-b-23">
                            <input class="bo-rad-10 sizefull txt10 p-l-20" type="tel" name="phone" placeholder="Phone" 
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{2}" required/>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Message -->
                        <span class="txt9">
                            Message
                        </span>
                        <textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="message" placeholder="Message"></textarea>
                    </div>
                </div>

                <div class="wrap-btn-booking flex-c-m m-t-13">
                    <!-- Button3 -->
                    <button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4" name="contact-submit">
                        Submit
                    </button>
                </div>
            </form>

            
        </div>
    </section>


    <?php
        include '../model/footer.php' ;
    ?>

    <?php
        include '../model/injectionScript.php';
    ?>
    </body>
    </html>









