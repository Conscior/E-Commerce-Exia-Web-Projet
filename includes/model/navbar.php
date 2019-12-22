<header>
            <!-- Header desktop   -->
            <div class="wrap-menu-header gradient1 trans-0-4">
                <div class="container h-full">
                    <div class="wrap_header  trans-0-3">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="../view/index.php">
                                <img src="../../assets/LOGO.png"  alt="IMG-LOGO" data-logofixed="../../assets/LOGO.png">
                            </a>
                        </div>
    
                        <!-- Menu -->
                        <div class="wrap_menu p-l-45 p-l-0-xl">
                            <nav class="menu">
                                <ul class="main_menu">
                                    <li>
                                        <a href="../view/index.php">HOME</a>
                                    </li>
    
    
                                
                                    <li>
                                        <a href="../view/events.php">EVENTS</a>
                                    </li>

                                    <li>
                                        <a href="../view/shopping.php">SHOP</a>
                                    </li>
                        
                                    <li>
                                        <a href="../view/blog.php">BLOG</a>
                                    </li>
    
                                    <li>
                                        <a href="../view/about.php">ABOUT US</a>
                                    </li>

                                    <li>
                                        <a href="../view/contact.php">CONTACT US</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
    
                        <!-- Social & panier -->
                        <div class="social flex-w flex-l-m p-r-20">
                        <?php if (isset($_SESSION['usersid'])) {
                            echo '<a href="../processing/processing_logout.php">
                      
                            <i class="m-r-30 Leboutton">
                                    LOGOUT
                            </i>
                        </a>';
                        }elseif (!isset($_SESSION['usersid'])) {
                            echo '<a href="login.php">
                             
                            <i class="m-r-30 Leboutton">
                                    LOGIN
                            </i>
                        </a>';
                        }
                        ?>
                            
                            <!--------------->
                            <a href="https://www.facebook.com/ExiaAlgerie/"><i class="fa fa-facebook m-l-21" style="font-size: 19px;" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/CESIingenieurs?lang=fr"><i class="fa fa-twitter m-l-21" style="font-size: 19px;" aria-hidden="true"></i></a>
                            <a href="../view/card.php"><i class="fa fa-cart-plus m-l-21" style="font-size: 25px;" aria-hidden="true"></i></a>
                  

    
                            <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                        </div>
                    </div>
                </div>
            </div>
</header>

   <!-- Sidebar -->
   <aside class="sidebar trans-0-4">
        <!-- Button Hide sidebar -->
        <button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

        <!-- - -->
        <ul class="menu-sidebar p-t-95 p-b-70">
        <?php if (isset($_SESSION['usersid'])) {
?>
        
             <li class="t-center m-b-13">
                <p>Welcome <?php echo $_SESSION['userslastname'] . ' ' .$_SESSION['usersfirstname'] ?></p>
            </li>
            <?php
        }
        ?>

            <li class="t-center m-b-13">
                <a href="index.php" class="txt18">HOME</a>
            </li>

            <li class="t-center m-b-13">
                <a href="blog.php" class="txt18">BLOG</a>
            </li>

            <li class="t-center m-b-13">
                <a href="events.php" class="txt18">EVENTS</a>
            </li>

            <li class="t-center m-b-13">
                <a href="shopping.php" class="txt18">SHOP</a>
            </li>
            
           <li class="t-center m-b-13">
                <a href="about.php" class="txt18">ABOUT US </a>
            </li>


            <li class="t-center m-b-13">
                <a href="contact.php" class="txt18">CONTACT US</a>
            </li>

        </ul>
       
         <!-- - -->
         <div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
            <!-- - -->
            <h4 class="txt18 m-b-33">
                TOP DES VENTES !!!
            </h4>

            <!-- Gallery -->
            <div class="wrap-gallery-sidebar flex-w">
                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/12.png" data-lightbox="gallery-footer">
                    <img src="../../assets/12.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/3.png" data-lightbox="gallery-footer">
                    <img src="../../assets/3.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/31.png" data-lightbox="gallery-footer">
                    <img src="../../assets/31.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/43.png" data-lightbox="gallery-footer">
                    <img src="../../assets/43.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/8.png" data-lightbox="gallery-footer">
                    <img src="../../assets/8.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/29.png" data-lightbox="gallery-footer">
                    <img src="../../assets/29.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/5.png" data-lightbox="gallery-footer">
                    <img src="../../assets/5.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/30.png" data-lightbox="gallery-footer">
                    <img src="../../assets/30.png" alt="GALLERY">
                </a>

                <a class="item-gallery-sidebar wrap-pic-w" href="../../assets/34.png" data-lightbox="gallery-footer">
                    <img src="../../assets/34.png" alt="GALLERY">
                </a>
            </div>
        </div>
    
    </aside>
 