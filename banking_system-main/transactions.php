<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>financial Instutation/customer detail</title>
    <link rel="shortcut icon" href="./img/favicon.png">
    <!--customer.php styling-->
    <style>
        .heading{
            background-color: brown;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }
        .heading h1{
            color: white;
        }
        .container-sm{
            height: 100vh;
            margin: 30px auto;
            padding: 20px;
            overflow: hidden;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, 
                        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, 
                        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

        }
    </style>
    <!-- javascript file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>
</head>
<body>
    <div class="heading">
        <h1>Transaction details</h1>
    </div>
    <div class="container-sm">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">SI. No.</th>
            <th scope="col">Sender Name</th>
            <th scope="col">reciever Name</th>
            <th scope="col">Amount</th>
            <th scope="col">Date</th>
            </tr>
        </thead> 

<?php
    error_reporting(0);
    include("connection.php");
    $query = "SELECT * FROM transaction";
    $data = mysqli_query($conn,$query);
    
    $total = mysqli_num_rows($data);
    
    
    //echo "$total";  

    if($total!=0)
    {
        while($result=mysqli_fetch_assoc($data))
        {
            echo "
            <tbody>
                <tr>
                <td>".$result['si']."</td>
                <td>".$result['sender']."</td>
                <td>".$result['reciever']."</td>
                <td>₹".$result['amount']."</td>
                <td>".$result['datetime']."</td>
                </tr>
            </tbody>
            ";
        }
    }
    else
    {
        echo "No record found";
    }
?>

</table>
</div>
 <!-- Footer -->
 <footer class="page-footer font-small pt-4">
    <div class="container">
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <a href="index.html" class="btn btn-outline-white btn-rounded">Back to Home page</a>
        </li>
      </ul>

    </div>
    <div class="footer-copyright text-center py-3">Satyam Choudhary © 2021 Copyright:
      <a href="#"> sparkfoundation project</a></div>

  </footer>
</body>
</html>