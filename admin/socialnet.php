<?php
session_start();
include '../core.php';
echo $_SESSION['image'];
if($_SESSION['login_user']==''){
  header('location:your-custom-404.php');}
?>
<!DOCTYPE html>
<?php include 'starter.php'; ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                  <?php
                      if(isset($_POST['submit'])){
                
                               session_start();
                               include '../core.php';
                               if($_POST['instagram']=='' && $_POST['telegram']=='' && $_POST['facebook']==''){
                                   echo'<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <strong>اخطار</strong> لطفا متن خود را واردنمایید.
                             
                                </div>';
                               }
                               else if($_POST['instagram']!='' && $_POST['telegram']!='' && $_POST['facebook']!=''){
                               
                               $result =mysqli_query($_SESSION['connect'],"UPDATE `networks` SET n_ins='".$_POST['instagram']."' , n_tel='".$_POST['telegram']."' , n_fa='".$_POST['facebook']."'");
                                          if($result){
                                            echo '<div class="alert alert-success alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4>
                                                          <i class="icon-ok-sign"></i>
                                                                      تغییرات با موفقیت اعمال شد.
                                                      </h4>
                                                      
                                                    </div>';
                                                            }
                                                 }
                                          }
                             ?>
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                افزودن لینک شبکه های اجتماعی                            
                         
                            </header>
                          
                            <div class="panel-body">
                                <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" id="signupForm" method="post" action="socialnet.php">
                                       <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `networks`");
                                            if (mysqli_num_rows($result) > 0) {
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                        echo
                                        '<div class="form-group ">
                                            <label for="firstname" class="control-label col-lg-2"><i class="icon-instagram"></i>&nbsp; اینستاگرام</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  name="instagram" type="text" value='.$row['n_ins'].'/>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="lastname" class="control-label col-lg-2"><i class="icon-tel"></i>&nbsp; تلگرام</label>
                                            <div class="col-lg-10">
                                                <input class=" form-control"  name="telegram" type="text" value='.$row['n_tel'].'/>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="username" class="control-label col-lg-2"><i class="icon-facebook"></i>&nbsp; فیس بوک</label>
                                            <div class="col-lg-10">
                                                <input class="form-control "  name="facebook" type="text" value='.$row['n_fa'].' />
                                            </div>
                                        </div>';}
                                            }?>
                                        <!--<div class="form-group ">
                                            <label for="password" class="control-label col-lg-2">Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="password" name="password" type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="confirm_password" class="control-label col-lg-2">Confirm Password</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="confirm_password" name="confirm_password" type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="email" class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-10">
                                                <input class="form-control " id="email" name="email" type="email" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="agree" class="control-label col-lg-2 col-sm-3">Agree to Our Policy</label>
                                            <div class="col-lg-10 col-sm-9">
                                                <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="agree" />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="newsletter" class="control-label col-lg-2 col-sm-3">Receive the Newsletter</label>
                                            <div class="col-lg-10 col-sm-9">
                                                <input type="checkbox" style="width: 20px" class="checkbox form-control" id="newsletter" name="newsletter" />
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-success pull-left" type="submit" name="submit">ذخیره</button>
                                                <!--<button class="btn btn-default" type="button">Cancel</button>-->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>
<?php include 'end.php'; ?>
  </body>
</html>
