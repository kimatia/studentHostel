<?php 
if(!empty($_POST))
{
    //database settings
    include "conn.php";
    foreach($_POST as $block => $val)
    {
        //clean post values
        $field_userid = strip_tags(trim($block));
        $val = strip_tags(trim(mysqli_real_escape_string($val)));

        //from the fieldname:user_id we need to get user_id
        $split_data = explode(':', $field_userid);
        $blockid = $split_data[1];
        $block = $split_data[0];
        if(!empty($blockid) && !empty($block) && !empty($val))
        {
            //update the values
            mysqli_query("UPDATE block SET $block = '$val' WHERE id = $blockid") or mysqli_connect_error();
            echo "Updated";
        } else {
            echo "Invalid Requests";
        }
    }
} else {
    echo "Invalid Requests";
}
?>