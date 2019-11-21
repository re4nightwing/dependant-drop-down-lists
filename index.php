<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#main_cate').change(function(){
                var cate_id=$(this).val();
                $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:{maincate:cate_id},
                    dataType:"text",
                    success:function(data){
                        $('#sub_cate').html(data);
                    }
                });
            });
        });
    </script>
    <title>Dependant-DropDown</title>
</head>
<body class="bg-info">
<?php
if(isset($_POST['submit'])){
    echo $_POST['main_cate']."<br>";
    echo $_POST['sub_cate'];
}
?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 bg-light mt-5 p-4 rounded">
                <form action="index.php" method="POST" >
                    <div class="form-group">
                        <h2>Select your Main-Category:</h2><br>
                        <select id="main_cate" name="main_cate" class="form-control form-control-lg">
                            <option value="" disabled selected>-Select Main Category-</option>
                            <?php
                                require_once 'connect.php';
                                $query = "SELECT * FROM category ORDER BY categoryValue ASC";
                                $result = mysqli_query($conn,$query);

                                while($row=mysqli_fetch_array($result)){
                            ?>
                            <option value="<?= $row['categoryValue'] ?>" ><?= $row['categoryName'] ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h2>Select your Sub-Category:</h2><br>
                        <select id="sub_cate" name="sub_cate" class="form-control form-control-lg">
                            <option value="" disabled selected>-Select Sub Category-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="SUBMIT" name="submit" class="btn btn-danger btn-block btn-lg">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>