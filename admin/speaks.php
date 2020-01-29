<?php
session_start();
include '../core.php';
echo $_SESSION['image'];
if($_SESSION['login_user']==''){
  header('location:your-custom-404.php');}
ob_start();

?>
<!DOCTYPE html>
<?php include 'starter.php'; ?>
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
              <!--state overview end-->
                <?php if($_SESSION["tip"]!=''){
                  echo '<div class="alert alert-success alert-block fade in">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="icon-remove"></i>
                                        </button>
                                        <h4>
                                            <i class="icon-ok-sign"></i>
                                         تغییرات با موفقیت اعمال شد.
                                        </h4>
                                        
                                      </div>';}?>
             <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
سخنان هنرمندان                                 
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            
                                           <?php if($_GET['id']==''){
                                            echo '<form action="bozorgan/speaks.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">عکس هنرمند</label>
                                                  <div class="col-sm-10">
                                                  <input type="file" id="exampleInputFile" name="picture">
                                                  <p class="help-block">عکس هنرمند موردنظر خود را انتخاب کنید</p>
                                                  </div>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام هنرمند</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nam">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">پیشه</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="pishe">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">شرح سخن</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="tip" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                 <input type="hidden" value="'.$_GET['id'].'" name="id">
                                                 <input type="submit" value="ثبت" class="btn btn-shadow btn-success" name="submit" style="float:left;">
                                            </form>';}
                                            else if($_GET['id']!=''){
                                                   
                                                  $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `bozorgan` WHERE id='".$_GET['id']."'");
                                                  if (mysqli_num_rows($result) > 0) {
                                                 $row = mysqli_fetch_assoc($result);
                                                 if($row!=''){
                                              echo '
                                                 <form action="bozorgan/speaks.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">عکس هنرمند</label>
                                                  <div class="col-sm-10">
                                                  <input type="file" id="exampleInputFile" name="picture" >
                                                  <p class="help-block">عکس هنرمند موردنظر خود را انتخاب کنید</p>
                                                  </div>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام هنرمند</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nam" value='.$row['name'].'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">پیشه</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="pishe" value='.$row['pishe'].'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">شرح سخن</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="tip" rows="6">'.$row['tip'].'</textarea>
                                                    </div>
                                                </div>
                                                 <input type="hidden" value="'.$_GET['id'].'" name="id">
                                                 <input type="submit" value="ویرایش" class="btn btn-shadow btn-warning" name="submit" style="float:left;">
                                            </form>';
                                                 }
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

   <?php include 'end.php'; $_SESSION["tip"]='';?>
  </body>
</html>
