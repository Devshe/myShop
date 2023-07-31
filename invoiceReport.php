<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div class="card mt-5">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label> From </label>
                                <input type="date" name="from_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label> To </label>
                                <input type="date" name="to_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <button type = "submit" class="btn btn-secondary">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>invoice_no </th>
                    <th>date </th>
                    <th>customer </th>
                    <th>district </th>
                    <th>item_count </th>
                    <th>amount </th>
                </tr>
            </thead>
            <tbody>
                <?php

                    include('connect.php');
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

                    if(isset($_GET['from_date']) && isset($_GET['to_date']))
                    {
                        $from_date=$_GET['from_date'];
                        $to_date=$_GET['to_date'];
                        $sql = "SELECT a.invoice_no,a.date,concat(c.first_name,' ',c.last_name) 
                        as customer, d.district as district, a.item_count,a.amount
                        FROM invoice a inner join customer c on a.customer=c.id left join district d on c.district=d.id 
                        WHERE a.date BETWEEN '$from_date' and '$to_date'";
                        $result = $conn->query($sql);
    
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                            <td>$row[invoice_no]</td>
                            <td>$row[date]</td>
                            <td>$row[customer]</td>
                            <td>$row[district]</td>
                            <td>$row[item_count]</td>
                            <td>$row[amount]</td>
                            </tr>
                            ";
                        }
                        } else {
                        echo "0 results";
                        }
                    }
                    $conn->close();
                    ?>
            </tbody>
        </table>
    
    </div>
    <!-- Bootsrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>
</html>
