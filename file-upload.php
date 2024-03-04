<?php

for($i=0;$i<count($_FILES["userfile"]["name"]);$i++)
{
    if($_FILES["userfile"]["name"][$i] != "")
    {
        if(move_uploaded_file($_FILES["userfile"]["tmp_name"][$i],"uploaddir/".$_FILES["userfile"]["name"][$i]))
        {
            echo $i . " อัพโหลดไฟล์<br>";
        }
    }
}