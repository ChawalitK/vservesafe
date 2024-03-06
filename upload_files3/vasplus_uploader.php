<?php
/***********************************************************************************************************
* Preview and upload multiple files using Jquery and PHP
* Written by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: vasplusblog@gmail.com or info@vasplus.info

**********************************Copyright Information*****************************************************
* This script has been released with the aim that it will be useful.
* Please, do not remove this copyright information from the top of this page.
* If you want the copyright info to be removed from the script then you have to buy this script.
* This script must not be sold.
* All Copy Rights Reserved by Vasplus Programming Blog
*************************************************************************************************************/

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	// Upload directory
	$vpb_upload_image_directory = "uploads/";
	
	// Allow file types
	$vpb_allowed_extensions = array("gif", "jpg", "jpeg", "png");
	$image = "";
	
	foreach($_FILES as $file)
	{
		/* Variables Declaration and Assignments */
		$vpb_image_filename = basename($file['name']);
		$vpb_image_tmp_name = $file['tmp_name'];;
		$vpb_file_extensions = pathinfo(strtolower($vpb_image_filename), PATHINFO_EXTENSION);

		
		//New file name
		$random_name_generated = time().rand(1234,9876).'.'.$vpb_file_extensions;
		
		if($vpb_image_filename == "") 
		{
			//Browse for a photo that you wish to use
		}
		else
		{
			if (in_array($vpb_file_extensions, $vpb_allowed_extensions)) 
			{
				if(move_uploaded_file($vpb_image_tmp_name, $vpb_upload_image_directory.$random_name_generated)) 
				 {
					 //Display Uploaded Files 
					 $image .= '
					 <div class="vpb_wrapper" style="padding:10px;">
					 <img src="'.$vpb_upload_image_directory.$random_name_generated.'" class="vpb_image_style" />
					 </div>';
					 
					 // You can display this one if you wish
					 //$image .= '<div class="vpb_wrapper" style="padding:10px; text-decoration:none;">'.$vpb_image_filename.' uploaded</div>';
				
				 }
			}
			else
			{
				// Do not upload files which are not in the allowed file array
			}
			
		}
	}
	//Display the files
	if($image != "") echo $image;
}
?>