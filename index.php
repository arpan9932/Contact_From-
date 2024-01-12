<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactForm</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="Feedback">
   <h1 class="title">Feedback</h1>
   <form class="contact-form row"  action="/arpan/Contactform/index.php" method="post">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required name="name">
         <label class="label" for="name">Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" type="email" required name="email">
         <label class="label" for="email">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="address" class="input-text js-input" type="text" required name="address">
         <label class="label" for="address">Address</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" type="number" required name="phone" maxlength="10">
         <label class="label" for="phone">Contact Number</label>
      </div>
      <div class="form-field col-lg-12">
         <input id="message" class="input-text js-input" type="text" required name="message">
         <label class="label" for="message">Message</label>
      </div>
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
   <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $add = $_POST['address'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "contact";

    // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          echo("Sorry we failed to connect");
      }
      else{ 
        // Submit these to a database
        // Sql query to be executed 
        $sql = "INSERT INTO `get_in_touch` (`Name`, `E-mail`, `Address`, `Contact Number`, `Message`) VALUES ('$name', '$email', '$add', '$phone', '$message')";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> Your entry has been submitted successfully!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }
        else{
            // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>';
        }

      }

    }
    ?>
</section>
</body>
</html>