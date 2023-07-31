<?php
include('connect.php');
if(isset($_POST['newItem'])){
    $item_code=$_POST['item_code'];
    $item_category=$_POST['item_category'];
    $item_subcategory=$_POST['item_subcategory'];
    $item_name=$_POST['item_name'];
    $quantity=$_POST['quantity'];
    $unit_price=$_POST['unit_price'];

    //checking empty conditions
    if($item_code=='' or $item_category=='' or $item_subcategory=='' or $item_name=='' or $quantity=='' or $unit_price==''){
        echo"<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        //insert query
        $create_client="insert into `item` (item_code, item_category, item_subcategory, item_name, quantity, unit_price) 
        values ('$item_code','$item_category','$item_subcategory','$item_name','$quantity','$unit_price')";
        $insert_query=mysqli_query($con,$create_client);
        if($insert_query){
            echo"<script>alert('Successfully inserted item data')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insert Item</title>
        <!-- Bootstap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css file -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="bg-light">
    <!-- navbar -->
    <div class = "container-fluid p-0">
         <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img src="./images/logo.png" alt="logo" class="logo"> </img>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="createClient.php">New Client</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createItem.php">New Item</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invoiceReport.php">Invoice Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="invoiceItemReport.php">Invoice Item Report</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Item Report</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>

        <div class="container mt-3">
            <h1 class = "text-center"> Insert Item </h1>
            <!-- form -->
            <form action="" method="post">
                <!-- item_code -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="item_code" class="form-label">Item Code</label>
                    <input type="text" name="item_code" id="item_code" class="form-control"
                    autocomplete="off" required="required">
                </div>
                <!-- item_category-->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="item_category" class="form-label">Item Category</label>
                    <select name="item_category" id="" class="form-select">
                        <option value =""> Select Item Category</option>
                        <?php
                        $select_query="SELECT * from `item_category`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category=$row['category'];
                            $id=$row['id'];
                            echo"<option value='$id'>$category</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- item_subcategory -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="item_subcategory" class="form-label">Item Sub-category</label>
                    <select name="item_subcategory" id="" class="form-select">
                        <option value =""> Select Sub-Category</option>
                        <?php
                        $select_query="SELECT * from `item_subcategory`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $sub_category=$row['sub_category'];
                            $id=$row['id'];
                            echo"<option value='$id'>$sub_category</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-- item_name -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="item_name" class="form-label">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="form-control" autocomplete="off" required="required">
                </div>
                <!-- quantity -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" autocomplete="off" required="required">
                </div>
                <!-- unit_price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="number" name="unit_price" id="unit_price" class="form-control" autocomplete="off" required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto d-grid gap-2">
                    <input type="submit" name="newItem" id="newItem" class="btn btn-success mb-3 px-3" value="Add Item">
                </div>

            </form>
        </div>
        <!-- Bootsrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>