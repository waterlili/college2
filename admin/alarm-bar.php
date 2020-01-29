
                    
                    <!-- inbox dropdown start-->
                     <?php
                    
                    $nums =mysqli_query($_SESSION['connect'],"SELECT * FROM `contact` WHERE `status`=0");
                    if($nums){
                      $rowcount=mysqli_num_rows($nums);
                      
                      
                    }
                    ?>
                    <li id="header_inbox_bar" class="dropdown">
                        <a  class="dropdown-toggle" href="contact.php">
                            <i class="icon-envelope-alt"></i>
                            <span class="badge bg-important"><?php print $rowcount; ?></span>
                        </a>
                    </li>
                    <!-- inbox dropdown end -->
                   
                    