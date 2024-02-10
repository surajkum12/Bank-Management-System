<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <title>financial Instutation/Balance Inquiry</title>
  <link rel="shortcut icon" href="./img/favicon.png">
  <!--customer.php styling-->
  <style>
    .heading {
      background-color: brown;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }

    .heading h1 {
      color: white;
    }

    .container-sm {
      margin: 30px auto;
      padding: 20px;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;

    }

    
    form button{
      margin:20px;
      padding: 06px 20px;
      overflow: hidden;
    }
    .accn,
    .bal{
      margin: 30px auto;
      padding: 20px;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px,
        rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }
    @media screen and (max-width: 991px) {
        .container-sm{
           display: block; 
        }
  </style>
  <!-- javascript file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php 
    error_reporting(0);
      include("connection.php");
  ?>

  <div class="heading">
    <h1>Balance Inquiry</h1>
  </div>
  <div class="container-sm">
    <div class="accn">
      <h3>Enter Account no.</h3>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
        <input type="text" name="accountno" placeholder='Enter Account no.'>
        <button type="submit" name="submit">Submit</button>
      </form>
  </div>
<div class="bal">
<!-- table -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Account No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Balance</th>
          </tr>
        </thead>

<!-- php -->
        <?php

        $sender=$_SESSION['accountno'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $accountno = test_input($_POST["accountno"]);
        }
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      
        if($accountno==1001){
          $query = "SELECT * FROM banking WHERE accountno=1001";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1002){
          $query = "SELECT * FROM banking WHERE accountno=1002";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1003){
          $query = "SELECT * FROM banking WHERE accountno=1003";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1004){
          $query = "SELECT * FROM banking WHERE accountno=1004";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1005){
          $query = "SELECT * FROM banking WHERE accountno=1005";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1006){
          $query = "SELECT * FROM banking WHERE accountno=1006";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1007){
          $query = "SELECT * FROM banking WHERE accountno=1007";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1008){
          $query = "SELECT * FROM banking WHERE accountno=1008";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1009){
          $query = "SELECT * FROM banking WHERE accountno=1009";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
        if($accountno==1010){
          $query = "SELECT * FROM banking WHERE accountno=1010";
          $data = mysqli_query($conn,$query);
          while($result=mysqli_fetch_assoc($data)){
            echo "
            <tbody>
                <tr>
                <td>".$result['accountno']."</td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['email']."</td>
                <td>₹".$result['balance']."</td>
                </tr>
            </tbody>
            ";
          }
        }
           
          ?>
      </table>

    </div>
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
      <a href="#"> sparkfoundation project</a>
    </div>

  </footer>

</body>

</html>