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
                               if($_POST['topic']==''&& $_POST['desc']==''){
                                   echo'<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <strong>اخطار</strong> لطفا متن خود را واردنمایید.
                             
                                </div>';
                               }
                               else if(($_POST['topic']!='' || $_POST['desc']!='') && $_POST['id']==1){
                                
                               $res =mysqli_query($_SESSION['connect'],"UPDATE `courses` SET `c-topic`='".$_POST['topic']."',`c-desc`='".$_POST['desc']."' WHERE `c-id`=1");
                                          if($res){
                                            
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
                               else if(($_POST['topic']!='' || $_POST['desc']!='') && $_POST['id']==2){
                                
                               $res =mysqli_query($_SESSION['connect'],"UPDATE `courses` SET `c-topic`='".$_POST['topic']."',`c-desc`='".$_POST['desc']."' WHERE `c-id`=2");
                                          if($res){
                                            
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
                                else if(($_POST['topic']!='' || $_POST['desc']!='') && $_POST['id']==3){
                                
                               $res =mysqli_query($_SESSION['connect'],"UPDATE `courses` SET `c-topic`='".$_POST['topic']."',`c-desc`='".$_POST['desc']."' WHERE `c-id`=3");
                                          if($res){
                                            
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
                               else if(($_POST['topic']!='' || $_POST['desc']!='') && $_POST['id']==4){
                                
                               $res =mysqli_query($_SESSION['connect'],"UPDATE `courses` SET `c-topic`='".$_POST['topic']."',`c-desc`='".$_POST['desc']."' WHERE `c-id`=4");
                                          if($res){
                                            
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
دوره ی طراحی                                 
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='1'");
                                            if (mysqli_num_rows($result) > 0) {
                                          
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                            echo '<form action="lists.php" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <input class="form-control round-input"  name="id" type="hidden" value="'.$row['c-id'].'">
                                                    <label class="control-label col-sm-2">موضوع/عنوان</label>
                                                    <div class="col-sm-10" style="margin-bottom:11px;">
                                                        <input class="form-control round-input" type="text" name="topic" value="'.$row['c-topic'].'">
                                                    </div>
                                                    <label class="control-label col-sm-2">شرح دوره</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="desc" rows="6">'.$row['c-desc'].'</textarea>
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
             
             <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
تکنیک ها                                    
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='2'");
                                            if (mysqli_num_rows($result) > 0) {
                                          
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                            echo '<form action="lists.php" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <input class="form-control round-input" name="id" type="hidden" value="'.$row['c-id'].'">
                                                    <label class="control-label col-sm-2">موضوع/عنوان</label>
                                                    <div class="col-sm-10" style="margin-bottom:11px;">
                                                        <input class="form-control round-input" type="text" name="topic" value="'.$row['c-topic'].'">
                                                    </div>
                                                    <label class="control-label col-sm-2">شرح دوره</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="desc" rows="6">'.$row['c-desc'].'</textarea>
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
             <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
مبانی هنرهای تجسمی                                        
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='3'");
                                            if (mysqli_num_rows($result) > 0) {
                                          
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                            echo '<form action="lists.php" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <input class="form-control round-input" name="id" type="hidden" value="'.$row['c-id'].'">
                                                    <label class="control-label col-sm-2">موضوع/عنوان</label>
                                                    <div class="col-sm-10" style="margin-bottom:11px;">
                                                        <input class="form-control round-input" type="text" name="topic" value="'.$row['c-topic'].'">
                                                    </div>
                                                    <label class="control-label col-sm-2">شرح دوره</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="desc" rows="6">'.$row['c-desc'].'</textarea>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
کودکان                                     
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            <?php
                                            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='4'");
                                            if (mysqli_num_rows($result) > 0) {
                                          
                                           $row = mysqli_fetch_assoc($result);
                                           if($row!=''){
                                            echo '<form action="lists.php" method="post" class="form-horizontal">
                                                <div class="form-group">
                                                    <input class="form-control round-input" name="id" type="hidden" value="'.$row['c-id'].'">
                                                    <label class="control-label col-sm-2">موضوع/عنوان</label>
                                                    <div class="col-sm-10" style="margin-bottom:11px;">
                                                        <input class="form-control round-input" type="text" name="topic" value="'.$row['c-topic'].'">
                                                    </div>
                                                    <label class="control-label col-sm-2">شرح دوره</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="desc" rows="6">'.$row['c-desc'].'</textarea>
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
