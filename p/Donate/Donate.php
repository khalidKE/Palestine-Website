<!DOCTYPE html>
<html>
<head>
  <title>Donate to Palestine</title>
  <link rel="stylesheet"  href="Donate.css">
  <script src="Donate.js"></script>
  
</head>
<body>

  
  <form action="Donate.php" method="post">
    <h3>Donation</h3>
    <input type="text"  name="Name"   placeholder="Name" required>
    <input type="email"  name="email" placeholder="Gmail"required>
   
    <h5 style="color: black; font-weight: 600;">Choosing Payment Method</h5>
    <div>
      
      <img src="visa_method_icon.png"   style="width: 50px; height: 40px; object-fit: contain;">
    <input type="radio" id="payment-visa" name="payment-method" onclick="showPaymentDetails('visa')" required>
    <img src="vcash_method_icon.png"   style="width: 50px; height: 40px; object-fit: contain;">
    <input type="radio" id="payment-vodafone-cash" name="payment-method" onclick="showPaymentDetails('vodafone-cash')"required>
  </div>
    
    <div id="visa-details">

      <input type="text" name="card" placeholder=" Card Number">
      <input type="text" name="expiry" placeholder=" Expiry Date ">
      <input type="text" name="cVV" placeholder="CVV">
    </div>

    <div id="vodafone-cash-details" >
      <input type="text" name="cash" placeholder="Vodafone Cash Number ">
      <input type="text" name="amount" placeholder="Donation Amount">
    </div>
    <button type="submit" name="Donate">Donate <img  src="fqc10x7g.png" width="10px" ></button>
  </form>
 
  <?php

 if(isset($_POST['Donate'])){
   // Assuming 'connect.php' contains your database connection code

  include 'connect.php';
    $name = $_POST['Name'];
    $email = $_POST['email'];
    $Card = $_POST['card'] ;
    $Expdate = $_POST['expiry'];
    $CVV =$_POST['cVV'];
    $Cash =$_POST['cash'];
    $Amount = $_POST['amount'];
    
  
    $cr7 = "INSERT INTO  user (`Name`, `Gmail`, `card number`, `Expiry Date`, `CVV`, `Vodafone Cash Number`, `Donation Amount`) 
     values ('$name', '$email', '$Card', '$Expdate', '$CVV', '$Cash', '$Amount')";

     
    // Execute the query
    $x=mysqli_query($conn,$cr7);
    if($x){
      echo "new user inserted ";
    }
    else {
        echo "is  not inserted  ";
    }
 
  }

?>


 
 
</body>
</html>