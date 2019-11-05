<!DOCTYPE html>
<?php require('db.php');?>
<html ng-app="submitApp">
<head>
    <meta charset="utf-8" />
    <title>Reservations</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="MegaTravelStyle.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>

    <script type="text/javascript">
        angular.module('submitApp', [])
        .controller('FormCtrl', function() {


        });
    </script>
</head>
<body>

    <div class="col-lg-12" style="border:solid black 2px;" id="page">
        <div class="row" id="header">
            <div class="col-lg-4" style="border:solid black 2px;">
                <img src="MegaTravelLogo.jpg" alt="" />
            </div>
            <div class="col-lg-8">
                <div class="navheader" style="border:solid black 2px;">
                    <a class="navheader" href="home.html">Home</a>
                    <a class="navheader" href="reservations.php">Reservations</a>
                    <a class="navheader" href="aboutus.html">About Us</a>
                </div>
            </div>
        </div>
    </div>
   <div>
    <?php
$nameErr = $emailErr = $locationErr = $phoneErr = $addressErr = $cityErr = $stateErr = $departureErr = $returnErr = "";
$name = $email = $location = $address = $phone = $city = $state = $departure = $return = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["phone"])) {
    $phone = "";
  } else {
    $phone = test_input($_POST["phone"]);
  }

  if (empty($_POST["address"])) {
    $address = "An Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }
  if (empty($_POST["city"])) {
    $city = "A City is required";
  } else {
    $city = test_input($_POST["city"]);
  }
  if (empty($_POST["state"])) {
    $state = "A State is required";
  } else {
    $state = test_input($_POST["state"]);
  }

  if (empty($_POST["location"])) {
    $locationErr = "The location is required";
  } else {
    $location = test_input($_POST["location"]);
  }

  if (empty($_POST["departure"])) {
    $departure = "A departure date is required";
  } else {
    $departure = test_input($_POST["departure"]);
  }
  if (empty($_POST["return"])) {
    $return = "A return date is required";
  } else {
    $return = test_input($_POST["return"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1>Mega Travel Submission Form</h1>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="saveTemplateData" ng-controller="FormCtrl">  

  Name: <input type="text" name="name" ng-model="name" placeholder="First & Last">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>

  E-mail: <input type="text" name="email" ng-model="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Phone Number: <input type="tel" name="phone" ng-model="phone" placeholder="(nnn) nnn-nnnn">
  <span class="error"><?php echo $phoneErr;?></span>
  <br><br>

  Address: <input type="text" name="address" ng-model="address" placeholder="123 Somewhere Ave">
  <span class="error">* <?php echo $addressErr;?></span>
  <br><br>
  City: <input type="text" name="city" ng-model="city">
  <span class="error">* <?php echo $cityErr;?></span>
  <br><br>
  State: <input type="text" name="state" ng-model="state">
  <span class="error">* <?php echo $stateErr;?></span>
  <br><br>

  Where would you like to go?*
  <br><br>
  <input type="radio" name="location" value="australia">Brisbane, Australia
  <br><br>
  <input type="radio" name="location" value="canada">Vancouver, Canada
  <br><br>
  <input type="radio" name="location" value="usa">New York City, USA
  <br><br>
  <input type="radio" name="location" value="germany">Berlin, Germany
  <br><br>
  <input type="radio" name="location" value="mexico">Cancun, Mexico
  <span class="error"> <?php echo $locationErr;?></span>
  <br><br>

  Departure Date: <input type="date" name="departure" ng-model="departure">
  <span class="error">* <?php echo $departureErr;?></span>
  Return Date: <input type="date" name="return" ng-model="return">
  <span class="error">* <?php echo $returnErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Submit" ngClick="Submit">
  <input type="reset" name="reset" value="Reset" ngClick="Reset" />  
</form>

    <?php
        echo "<h2>Your Input:</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $phone;
        echo "<br>";
        echo $address;
        echo "<br>";
        echo $city;
        echo "<br>";
        echo $state;
        echo "<br>";
        echo $location;
        echo "<br>";
        echo $departure;
        echo "<br>";
        echo $return;

    ?>
    <?php
    if(isset($_POST['Submit'])){
    $name = $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $address= $_POST['address'];
    $city= $_POST['city'];
    $state= $_POST['state'];
    $location= $_POST['location'];
    $departure= $_POST['departure'];
    $return= $_POST['return'];

    $query="insert into submission(name, email, phone, address, city, state, location, departuredate, returndate)

    values('$name','$email','$phone','$address','$city','$state','$location','$departure','$return')";
 
    mysqli_query($conn,$query) or die("Cannot Add");
  }
    ?>


    <!-- FooterBelow -->
    <div class="footer">
        <div class="row" id="footer">
            Student &#9830; Kansas City, MO &#9830; vincent125@live.missouristate.edu &#9830; (816)877-1417
        </div>

    </div>
</body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

</html>