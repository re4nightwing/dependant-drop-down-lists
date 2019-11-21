<?php
    require 'connect.php';
    $output = '';
    $query ="SELECT * FROM sub_category WHERE Main_cate_val = '".$_POST['maincate']."' ORDER BY subCateValue ASC";
    $result = mysqli_query($conn,$query);
    $output .= '<option value="" disabled selected>-Select Sub Category-</option>';
    while($row=mysqli_fetch_array($result)){
        $output .='<option value = "'.$row["subCateValue"].'">'.$row["subCateName"].'</option>';
    }
    echo $output;
?>