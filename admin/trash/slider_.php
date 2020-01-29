<?php include 'form-master/jquery.form.js'; ?>
<form action="process.php" method="post" enctype="multipart/form-data" id="upload_form">
<input name="image_file" type="file" required="true" />
<input type="submit" value="Upload" id="submit-btn" />
<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
</form>
<div id="output"></div>
