 <?php

session_start();
include '../core.php';
?>
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li class="active">
                      <a class="" href="../index.php">
                          <i class="icon-dashboard"></i>
                          <span>صفحه اصلی</span>
                      </a>
                  </li>
                  <!--<li>
                      <a class="loveit" href="image-upload/index.php">
                          <i class="icon-picture"></i>
                          <span>1اسلایدر</span>
                      </a>
                  </li>-->
                  <li>
                      <a  href="slider.php">
                          <i class="icon-picture"></i>
                          <span>اسلایدر</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="javascript:;">
                          <i class="icon-picture"></i>
                          <span>مدیریت تصاویر</span>
                          <span class="arrow"></span>
                      </a>
                  <ul class="sub">
                   <li>
                      <a href="my-tasks.php">
                         
                          <span>کارهای من</span>
                      </a>
                  </li>
                  <li>
                      <a  href="technic.php">
                          
                          <span>تکنیک های هنرجویان</span>
                      </a>
                  </li>
                   <li>
                      <a  href="tarahi.php">
                          
                          <span>طراحی</span>
                      </a>
                  </li>
                    <li>
                      <a  href="tajasomi.php">
                         
                          <span>کلاس هنرهای تجسمی</span>
                      </a>
                  </li>
                   <li>
                      <a  href="koodakan.php">
                          
                          <span>کلاس کودکان</span>
                      </a>
                  </li>
                   <li>
                      <a  href="sier.php">
                          
                          <span>آثار متفرقه</span>
                      </a>
                  </li>
                  </ul>
                  </li>
                    <li>
                      <a  href="books.php">
                          <i class="icon-book"></i>
                          <span>معرفی کتاب</span>
                      </a>
                  </li>
                     <li>
                      <a  href="aboutus.php">
                          <i class="icon-text-width"></i>
                          <span>درباره ی ما</span>
                      </a>
                     </li>
                     <li>
                      <a  href="socialnet.php">
                          <i class="icon-link"></i>
                          <span>شبکه های اجتماعی</span>
                      </a>
                     </li>
                     <li>
                      <a  href="lists.php">
                          <i class="icon-list"></i>
                          <span>لیست دوره ها</span>
                      </a>
                     </li>
                     <li class="sub-menu">
                      <a  href="javascript:;">
                          <i class="icon-comments"></i>
                          <span>سخنان بزرگان</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="speaks.php">افزودن سخن</a></li>
                          <li><a class="" href="mangspeaks.php">مدیریت سخنان</a></li>
                          
                      </ul>
                          
                     </li>
                     <!--<li class="sub-menu">
                      <a  href="javascript:;">
                          <i class="icon-comments"></i>
                          <span>لیست دوره ها</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="speaks.php">طراحی</a></li>
                          <li><a class="" href="mangspeaks.php">تکنیک</a></li>
                          <li><a class="" href="speaks.php">مبانی هنرهای تجسمی</a></li>
                          <li><a class="" href="mangspeaks.php">کودکان</a></li>
                          
                      </ul>
                          
                     </li>
                  
                  
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-book"></i>
                          <span>عناصر صفحه</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="general.html">عمومی</a></li>
                          <li><a class="" href="buttons.html">دکمه ها</a></li>
                          <li><a class="" href="widget.html">ویجت ها</a></li>
                          <li><a class="" href="slider.html">اسلایدر ها</a></li>
                          <li><a class="" href="font_awesome.html">فونت های شکل دار</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-cogs"></i>
                          <span>کامنت ها</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="grids.html">گرید</a></li>
                          <li><a class="" href="calendar.html">تقویم</a></li>
                          <li><a class="" href="charts.html">چارت</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-tasks"></i>
                          <span>ابزارهای فرم</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="form_component.html">کامنت فرم</a></li>
                          <li><a class="" href="form_wizard.html">فرم Wizard</a></li>
                          <li><a class="" href="form_validation.html">ارزیابی فرم</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-th"></i>
                          <span>اطلاعات جدول</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="basic_table.html">جدول ساده</a></li>
                          <li><a class="" href="dynamic_table.html">جدول داینامیک</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="inbox.html">
                          <i class="icon-envelope"></i>
                          <span>ایمیل </span>
                          <span class="label label-danger pull-right mail-info">2</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon-glass"></i>
                          <span>عناصر اضافی</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="blank.html">صفحه خالی</a></li>
                          <li><a class="" href="profile.html">پروفایل</a></li>
                          <li><a class="" href="invoice.html">فاکتور</a></li>
                          <li><a class="" href="404.html">404 Error</a></li>
                          <li><a class="" href="500.html">500 Error</a></li>
                      </ul>
                  </li>
                  <li>
                      <a class="" href="login.html">
                          <i class="icon-user"></i>
                          <span>صفحه ورود به سایت</span>
                      </a>
                  </li>-->
              </ul>
              <!-- sidebar menu end-->
          
