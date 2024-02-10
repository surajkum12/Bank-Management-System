 <?php 
    include ("connection.php");

    if(isset($_POST['submit']))
{
    $from = $_GET['accn'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from banking where accountno=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from banking where accountno=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);



    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['balance'] - $amount;
                $sql = "UPDATE banking set balance=$newbalance where accountno=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['balance'] + $amount;
                $sql = "UPDATE banking set balance=$newbalance where accountno=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['fname'];
                $receiver = $sql2['fname'];
                $sql = "INSERT INTO `transaction`(`sender`, `reciever`, `amount`) VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                if($query){
                     echo "<script> alert('Hurray! Transaction is Successful');
                                     window.location='transactions.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>financial Instutation/transfer</title>
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
        <h1>Transfer</h1>
</div>
<?php
                include 'connection.php';
                $accno=$_GET['accn'];
                $sql = "SELECT * FROM  banking where accountno=$accno";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
<div class="container-sm">

<form method="post" name="tcredit" class="tabletext" >

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

        <?php 

            $query = "SELECT * FROM banking WHERE accountno = $accno";
            $data = mysqli_query($conn,$query);

            while($result=mysqli_fetch_assoc($data))
            {
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
            
        
        ?>
   
    </table>
    <br><br>

    <label style="color : red;"><b>Transfer To:</b></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose account</option>

            <?php
                include 'connection.php';
                $accno = $_GET['accn'];
                $sql = "SELECT * FROM banking where accountno!=$accno";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['accountno'];?>" >
                
                    <?php echo $rows['fname'] ;?> (Balance: 
                    <?php echo $rows['balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
        <div>
        </select>
        <br>
        <br>
            <label style="color : red;"><b>Amount:</b></label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn" >Transfer Money</button>
            </div>
              </form>
          
    </div>


    
     <!-- Footer -->
 <footer class="page-footer font-small pt-4">
    <div class="container">
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <a href="customer.php" class="btn btn-outline-white btn-rounded">Back to Customer detail</a>
        </li>
      </ul>

    </div>
    <div class="footer-copyright text-center py-3">Satyam Choudhary © 2021 Copyright:
      <a href="#"> sparkfoundation project</a></div>

  </footer>
    
</body>
</html>