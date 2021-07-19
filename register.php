<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Velvet</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">

  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/templatemo-style.css" rel="stylesheet">
  <link rel="stylesheet" href="register.css">
  <link rel="shortcut icon" href="https://img.icons8.com/fluent/48/ffffff/reading.png" type="image/x-icon" />

  
    <style>
      .error{
        color: red;
      }
    </style>
  </head>
  <body>
    <!-- Preloader -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Preloader -->
    <div class="tm-top-header">
      <div class="container">
        <div class="row">
          <div class="tm-top-header-inner">
            <div class="tm-logo-container">
                <img src="https://img.icons8.com/fluent/48/ffffff/reading.png" alt="Logo" class="tm-site-logo">
              <h1 class="tm-site-name tm-handwriting-font">Book Velvet</h1>
            </div>
            <div class="mobile-menu-icon">
              <i class="fa fa-bars"></i>
            </div>
            <nav class="tm-nav">
              <ul>
              <li><a href="index.html" >Home</a></li>
              <li><a href="collection.html" >Collection</a></li>
              <li><a href="register.php" class="active">Join us</a></li>
              <li><a href="contactus.html">Contact us</a></li>
              
              </ul>
            </nav>   
          </div>           
        </div>    
      </div>
    </div>
<?php
$nameErr=$customerErr=$emailErr=$passwordErr=$ageErr="";
$name=$customer=$email=$password=$age="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } 
  else{
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["customer"])) {
    $customerErr = "Customer ID is required";
  }
  else
  {
    $customer = test_input($_POST["customer"]);
    // check if name only contains letters and whitespace
    if(!preg_match('/^[a-zA-Z0-9]{5,}$/', $customer)) { // for english chars + numbers only
      // valid username, alphanumeric & longer than or equals 5 chars
      $customerErr="Customer Id must contain alphabets numbers and longer than or equal to 5 chars";
  }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email ID is required";
  }
  else{
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if(!empty($_POST["password"])) {
    $password = test_input($_POST["password"]);
   
    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$password)) {
        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
} else {
     $passwordErr = "Please enter password   ";
}

  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  }


  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
?>
    
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
        <h1 class="tm-site-name2 tm-handwriting-font" style="text-align: center;">Sign Up</h1>
        
        <fieldset>
        <p><span class="error">* required field</span></p>
          <legend><span class="number">1</span>Your basic info</legend>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name">
          <span class="error">* <?php echo $nameErr;?></span>
          <label for="name">Customer ID:</label>
          <input type="text" id="name" name="customer">
          <span class="error">* <?php echo $customerErr;?></span>
          <label for="mail">Email:</label>
          <input type="email" id="mail" name="email">
          <span class="error">* <?php echo $emailErr;?></span>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password">
          <span class="error">* <?php echo $passwordErr;?></span>
          <label>Age:</label>
          <input type="radio" id="under_13" value="under_13" name="age"><label for="under_13" class="light">Under 13</label><br>
          <input type="radio" id="over_13" value="over_13" name="age"><label for="over_13" class="light">13 or older</label>
          <span class="error">* <?php echo $ageErr;?></span>
        </fieldset>
        
        <fieldset>
          <legend><span class="number">2</span>Your profile</legend>
          <label for="bio">Address:</label>
          <textarea id="bio" name="user_bio"></textarea>
        </fieldset>
        <fieldset>
        <label for="job">Designation:</label>
        <select id="job" name="user_job">
          <optgroup label="Web">
            <option value="frontend_developer">Student</option>
            <option value="frontend_developer">Front-End Developer</option>
            <option value="php_developor">PHP Developer</option>
            <option value="python_developer">Python Developer</option>
            <option value="rails_developer"> Rails Developer</option>
            <option value="web_designer">Web Designer</option>
            <option value="WordPress_developer">WordPress Developer</option>
          </optgroup>
          <optgroup label="Mobile">
            <option value="Android_developer">Androild Developer</option>
            <option value="iOS_developer">iOS Developer</option>
            <option value="mobile_designer">Mobile Designer</option>
          </optgroup>
          <optgroup label="Business">
            <option value="business_owner">Business Owner</option>
            <option value="freelancer">Freelancer</option>
          </optgroup>
          <optgroup label="Other">
            <option value="secretary">Secretary</option>
            <option value="maintenance">Maintenance</option>
          </optgroup>
        </select>
        
          <label>Interests:</label>
          <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="light" for="development">Development</label><br>
            <input type="checkbox" id="design" value="interest_design" name="user_interest"><label class="light" for="design">Design</label><br>
          <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="light" for="business">Business</label><br>
          <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="light" for="business">Engineering</label><br>
          <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="light" for="business">Computer Science</label><br>
          <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="light" for="business">Chemical Engineering</label>
        </fieldset>
        <button type="submit"><h4 class="signup">Sign Up</h4></button>
        <br>
        <hr>
        Already have an account? &nbsp;&nbsp;
        <a href="login.php">Login</a>

      </form>
      
   

    <footer>
      <div class="tm-black-bg">
        <div class="container">
          <div class="row margin-bottom-60">
            <nav class="col-lg-3 col-md-3 tm-footer-nav tm-footer-div">
              <h3 class="tm-footer-div-title">Main Menu</h3>
              <ul>
              <li><a href="index.html">Home</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="Students.xml">Disclaimer</a></li>
              <li><a href="collection.html">Our Collections</a></li>
              </ul>
            </nav>
            <div class="col-lg-5 col-md-5 tm-footer-div">
              <h3 class="tm-footer-div-title">About Us</h3>
              <p class="margin-top-15">Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
              <p class="margin-top-15">Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.</p>
            </div>
            <div class="col-lg-4 col-md-4 tm-footer-div">
              <h3 class="tm-footer-div-title">Get Social</h3>
              <p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante.</p>
              <div class="tm-social-icons-container">
                <a href="#" class="tm-social-icon"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-twitter"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-linkedin"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-youtube"></i></a>
                <a href="#" class="tm-social-icon"><i class="fa fa-behance"></i></a>
              </div>
            </div>
          </div> 
          <p class="col-lg-12 small copyright-text text-center">Copyright &copy; 2084 Book Velvet</p>
                  
        </div>  
      </div>      
      
   </footer> <!-- Footer content-->  
   <!-- JS -->
   <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
   <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
   <script src="register.js"></script>
 </body>
 </html>