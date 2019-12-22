
				<div class="col-md-4 col-lg-3">
                        <div class="sidebar2 p-t-80 p-b-80 p-l-20 p-l-0-md p-t-0-md">
                            <!-- Search , not dynamique !!!! -->
                            <div class="search-sidebar2 size12 bo2 pos-relative">
                                <input class="input-search-sidebar2 txt10 p-l-20 p-r-55" type="text" name="search" placeholder="Search">
                                <button class="btn-search-sidebar2 flex-c-m ti-search trans-0-4"></button>
                            </div>

                            <?php
                                if(isset($_SESSION['usersis_BDE']) AND ($_SESSION['usersis_BDE'] == 1 OR $_SESSION['usersis_admin'] == 1)) {
                                    echo '<div class="button_cont" align="center" style="margin-top:50px"><a class="b_addEvent" href="newEvent.php" target="_blank" rel="nofollow"><span>New Event</a></div>';
                                }                     
                            ?>


                            <!-- Categories -->
                            <div class="categories">
                                <h4 class="txt33 bo5-b p-b-35 p-t-58">
                                    Categories
                                </h4>
    
                                <ul>
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="#" class="txt27">
                                            stickers
                                        </a>
                                    </li>
    
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="#" class="txt27">
                                            goodies
                                        </a>
                                    </li>
    
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="#" class="txt27">
                                            formations
                                        </a>
                                    </li>
    
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="#" class="txt27">
                                            figures
                                        </a>
                                    </li>
    
                                    <li class="bo5-b p-t-8 p-b-8">
                                        <a href="#" class="txt27">
                                            other
                                        </a>
                                    </li>
                                </ul>
                            </div>
    
                        </div>
                    </div>