
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ajax Image Upload and Resize (Simple)</title>

<link href="css/styleup.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="upload-wrapper">
    <div align="center">
        <h3>آپلود تصاویر اسلایدر</h3>
        <form action="image-upload/process.php" method="post" enctype="multipart/form-data" id="upload_form">
        <input name="image_file" type="file" required="true" />
        <input type="submit" value="آپلود" id="submit-btn" name="submit"/>
        <img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
        </form>
        <div id="output"></div>
    </div>
</div>


<script type="text/javascript" src="js-form/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js-form/jquery.form.min.js"></script>

<script type="text/javascript">
//customize values to suit your needs.
var max_file_size 		= 8048576; //maximum allowed file size
var allowed_file_types 	= ['image/png', 'image/gif', 'image/jpeg', 'image/pjpeg']; //allowed file types
var message_output_el 	= 'output'; //ID of an element for response output
var loadin_image_el 	= 'loading-img'; //ID of an loading Image element

//You may edit below this line but not necessarily
var options = { 
	//dataType:  'json', //expected content type
	target: '#' + message_output_el,   // target element(s) to be updated with server response 
	beforeSubmit: before_submit,  // pre-submit callback 
	success: after_success,  // post-submit callback 
	resetForm: true        // reset the form after successful submit 
}; 

$('#upload_form').submit(function(){
	$(this).ajaxSubmit(options); //trigger ajax submit
	return false; //return false to prevent standard browser submit
}); 

function before_submit(formData, jqForm, options){
	var proceed = true;
	var error = [];	
	/* validation ##iterate though each input field
	if you add extra text or email fields just add "required=true" attribute for validation. */
	$(formData).each(function(){ 
		
		//check any empty required file input
		if(this.type == "file" && this.required == true && !$.trim(this.value)){ //check empty text fields if available
			error.push( this.name + " is empty!");
			proceed = false;
		}
		
		//check any empty required text input
		if(this.type == "text" && this.required == true && !$.trim(this.value)){ //check empty text fields if available
			error.push( this.name + " is empty!");
			proceed = false;
		}
		
		//check any invalid email field
		var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
		if(this.type == "email" && !email_reg.test($.trim(this.value))){ 
			error.push( this.name + " contains invalid email!");
			proceed = false;          
		}
		
		//check invalid file types and maximum size of a file
		if(this.type == "file"){
			if(window.File && window.FileReader && window.FileList && window.Blob){
				if(this.value !== ""){
					if(allowed_file_types.indexOf(this.value.type) === -1){
						error.push( "<b>"+ this.value.type + "</b> is unsupported file type!");
						proceed = false;
					}
	
					//allowed file size. (1 MB = 1048576)
					if(this.value.size > max_file_size){ 
						error.push( "<b>"+ bytes_to_size(this.value.size) + "</b> is too big! Allowed size is " + bytes_to_size(max_file_size));
						proceed = false;
					}
				}
			}else{
				error.push( "Please upgrade your browser, because your current browser lacks some new features we need!");
				proceed = false;
			}
		}
		
	});	
	
	$(error).each(function(i){ //output any error to element
		$('#' + message_output_el).html('<div class="error">'+error[i]+"</div>");
	});	
	
	if(!proceed){
		return false;
	}
	
	$('#' + loadin_image_el).show();
}

//Callback function after success
function after_success(data){
	$('#' + message_output_el).html(data);
	$('#' + loadin_image_el).hide();
}

//Callback function to format bites bit.ly/19yoIPO
function bytes_to_size(bytes){
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
</script>

</body>
</html>