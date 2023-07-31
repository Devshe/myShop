<?php
include('connect.php');
if(isset($_POST['newClient'])){
    $title=$_POST['title'];
    $first_name=$_POST['first_name'];
    $middle_name=$_POST['middle_name'];
    $last_name=$_POST['last_name'];
    $contact_no=$_POST['contact_no'];
    $district=$_POST['district'];

    //checking empty conditions
    if($title=='' or $first_name=='' or $middle_name=='' or $last_name=='' or $contact_no=='' or $district==''){
        echo"<script>alert('Please fill all the available fields')</script>";
        exit();
    }
    else{
        //insert query
        $create_client="insert into `customer` (title, first_name, middle_name, last_name, contact_no, district) 
        values ('$title','$first_name','$middle_name','$last_name','$contact_no','$district')";
        $insert_query=mysqli_query($con,$create_client);
        if($insert_query){
            echo"<script>alert('Successfully inserted client data')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Client</title>
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
        <h1 class = "text-center"> Insert Client </h1>
        <!-- form -->
        <form action="" method="post">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="title" class="form-label">Title</label>
                <select name="title" class="form-control"> 
                    <option value="Mr">Mr.</option>
                    <option value="Mrs">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Dr">Dr.</option>
                </select>
            </div>
            <!-- first name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" autocomplete="off" required="required">
            </div>
            <!-- middle name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" name="middle_name" id="middle_name" class="form-control" autocomplete="off" required="required">
            </div>
            <!-- last name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="off" required="required">
            </div>
            <!-- contact number -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="contact_no" class="form-label">Contact Number</label>
                <input type="tel" name="contact_no" id="contact_no" class="form-control" autocomplete="off" required="required">
            </div>
            <!-- district -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="district" class="form-label">District</label>
                <select name="district" id="" class="form-select">
                    <option value =""> Select District</option>
                    <?php
                    $select_query="SELECT * from `district`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $district=$row['district'];
                        $id=$row['id'];
                        echo"<option value='$id'>$district</option>";
                    }
                    ?>
                </select>
            </div>

             <div class="form-outline mb-4 w-50 m-auto d-grid gap-2">
                <input type="submit" name="newClient" id="newClient" class="btn btn-success mb-3 px-3" value="Add Client">
            </div>
        </form>
    </div>
     <!-- Bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>