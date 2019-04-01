<?php
include('connection.php');

$query = "SELECT * FROM instructors";
$instData = mysqli_query($connection, $query);

if (isset($_POST["submit"]))
{
    $courseName = $_POST["courseName"];
    $courseCode = $_POST["courseCode"];
    $instructorId = $_POST["instructorId"];
    $term = $_POST["term"];
    $credit = $_POST["credit"];
    $period = $_POST["period"];
    $prereq = $_POST["prereq"];
    $book = $_POST["book"];
    $day = $_POST["day"];
    $time = $_POST["time"];

    $sql = "INSERT INTO courses (courseName,courseCode,instructorId,term,credit,period,prereq,book,day,time)
VALUES ( '$courseName','$courseCode','$instructorId' ,'$term' ,'$credit','$period','$prereq','$book','$day','$time')";

    $result = mysqli_query($connection, $sql);

    if($result){
        header('Location:  courses.php');
        exit();
    }
}

?>
<?php
session_start();
include('connection.php');

 ?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

</style>
<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-right">Logo</span>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="img/user.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <?php
      if($_SESSION["username"])
      {
          $instName = $_SESSION["username"];?>
          <span>Welcome, <strong><?php echo  $instName?></strong></span><br>
          <?php
      }else{
          header('Location:  AdminLogin.php');
      }
       ?>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Manage Admins</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="addAdmins.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Add Admin</a>
    <a href="dashboard.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>  Dashboard</a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <form class="" action="addCourses.php" method="post">
    <div class="container">
    <p><input type="text" name="courseName" placeholder="Course Name"></p>
    <p><input type="text" name="courseCode" placeholder="Course Code"></p>
    <p>
      <select class="" name="instructorId">
        <option value="">Assign Instructor</option>
        <?php
          if($instData->num_rows > 0)
          {
            while($row = $instData->fetch_assoc())
            {
              ?>
              <option value="<?php echo $row["InstructorId"] ?>"><?php echo $row["firstName"] ." ". $row["lastName"]; ?></option>

            <?php
            }
          }
         ?>
      </select>
    </p>
    <p><input type="text" name="term" placeholder="Term"></p>
    <p><input type="text" name="credit" placeholder="Credit"></p>
    <p><input type="text" name="period" placeholder="Period"></p>
    <p><input type="text" name="prereq" placeholder="Prerequesites"></p>
    <p><input type="text" name="book" placeholder="TextBook"></p>
    <p><input type="text" name="day" placeholder="Day"></p>
    <p><input type="text" name="time" placeholder="Time"></p>
    <button type="submit" name="submit">Add Course</button>
  </div>
  </form>

</div>

<!-- Footer -->
<footer class="w3-container w3-padding-16 w3-light-grey">
  <h4>FOOTER</h4>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
      mySidebar.style.display = 'none';
      overlayBg.style.display = "none";
  } else {
      mySidebar.style.display = 'block';
      overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}
</script>

</body>
</html>
