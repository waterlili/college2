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
              <!--state overview start-->
              
              <!--state overview end-->
           <?php
              if(isset($_POST['submit'])){
                               session_start();
                               include '../core.php';
                               if($_POST['moarefi']==''&& $_POST['tozih']==''){
                                   echo'<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <strong>اخطار</strong> لطفا متن خود را واردنمایید.
                             
                                </div>';
                               }
                               else if($_POST['moarefi']!='' || $_POST['tozih']!=''){
                               $result =mysqli_query($_SESSION['connect'],"UPDATE aboutus SET moarefi='".$_POST['moarefi']."' , tozih='".$_POST['tozih']."'");
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
                                        درباره ی آموزشگاه                                     
                                 
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `aboutus`");
                                            if (mysqli_num_rows($result) > 0) {
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                            echo '<form action="aboutus.php" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">معرفی نامه</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="moarefi" rows="6">'.$row['moarefi'].'</textarea>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-sm-2">توضیحات بیشتر</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="tozih" rows="6">'.$row['tozih'].'</textarea>
                                                    </div>
                                                </div>
                                                 <input type="submit" value="ثبت" class="btn btn-shadow btn-success" name="submit" style="float:left;">
                                            </form>';
                                             }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
              
             
             

          </section>
      </section>
      <!--main content end-->
  </section>

    <?php include 'end.php'; ?>
  </body>
</html>
