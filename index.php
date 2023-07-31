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
        <title>E commerce</title>
        <!-- Bootstap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
        <!-- font awesome link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- css file -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
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

        <div class="container my-5">
        <h2>List of Items </h2>
        <br>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>item_name </th>
                    <th>item_category </th>
                    <th>item_subcategory </th>
                    <th>quantity </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "myshop";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT distinct it.item_name,ic.category,it.item_subcategory,it.quantity 
                    FROM item it inner join item_category ic on ic.id=it.item_category;";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                        <td>$row[item_name]</td>
                        <td>$row[category]</td>
                        <td>$row[item_subcategory]</td>
                        <td>$row[quantity]</td>
                        </tr>
                        ";
                    }
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                    ?>
            </tbody>
        </table>
    
        </div>
       
        <!-- Bootsrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>