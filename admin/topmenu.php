                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username"><?php echo $_SESSION['login_user'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout" style="right: 0px;">
                            <div class="log-arrow-up"></div>
                            <li><a></a></li>
                            <li><a href="profile.php"><i class="icon-suitcase"></i>پروفایل</a></li>
                            <li></li>
                            <!--<li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>-->
                            <li><a href="logout.php"><i class="icon-key"></i> خروج</a></li>
                        </ul>
                    </li>