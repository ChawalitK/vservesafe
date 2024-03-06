<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Preview and upload multiple files using Jquery and PHP</title>



<!-- Required header files -->
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!-- <script type="text/javascript" src="js/jquery_1.5.2.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="js/vasplus_uploader.js"></script>




</head>
<body>


<br clear="all">
<center><div style=" width:1000px; font-family:Verdana, Geneva, sans-serif; font-size:24px;">Preview and upload multiple files </div>
<br clear="all" /><br clear="all" />











<!-- Code Begins -->


<input style="display:none;" type="file" name="vpb-data-file" id="vpb-data-file" onchange="vpb_image_preview(this)" multiple="multiple" />

<div align="center" style="width:300px;">

<span class="vpb_browse_file" onclick="document.getElementById('vpb-data-file').click();"></span> <!-- Browse File Button -->
<span onClick="vpb_upload_previewed_files();" class="vpb_pagination_button_clicked">Start Upload</span> <!-- Upload File Button -->

</div>

<br clear="all" /><div style="width:710px; margin-top:50px;" align="center" id="vpb-display-preview"></div>



<!-- Code Begins -->







</center>
</body>
</html>