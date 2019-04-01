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

    $sql = "INSERT INTO courses (courseName,courseCode,instructorId,term,credit,period,prereq,book)
VALUES ( '$courseName','$courseCode','$instructorId' ,'$term' ,'$credit','$period','$prereq','$book')";

    $result = mysqli_query($connection, $sql);

    if($result){
        header('Location:  courses.php');
        exit();
    }
}

?>





<html>
<head>
<!--<script>
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
     var y = document.forms["myForm"]["password"].value;
    var z = document.forms["myForm"]["gender"].value;
    var h = document.forms["myForm"]["date"].value;
        var e = document.forms["myForm"]["email"].value;
       var d= document.forms["myForm"]["email"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    else if(y== "")
        {
             alert(" Password must be filled out");
        return false;
        }
    else if(z== "")
        {
             alert(" gender must be filled out");
        return false;
        }
    else if(h== "")
        {
             alert(" Date must be filled out");
        return false;
        }
    else if(e== "")
        {
             alert(" Email must be filled out");
        return false;
        }
    else if(d== "")
        {
             alert(" Department must be filled out");
        return false;
        }
}
</script>
    -->


    <style>

    ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: none;
    border-top: 2.5px solid #bbb;
      border-bottom: 1px solid #bbb;
}

li {
    float: left;
    border-right:1px solid #bbb;

}

li:last-child {
    border-right: E4E4E4;

}

li a {
    display: block;
    color:#c2c2d6 ;
    text-align: center;
    padding:  14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: 4CAF50;
}



    </style>
</head>
<body>
    <div>
<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="News.html">News</a></li>
  <li><a href="Contact.html">Contact</a></li>
  <li><a href="Login.html">Login</a></li>
  <li style="float:right"><a href="About.html">About</a></li>
</ul>
</div>


 <div style="text-align: center; margin-top: 180px ; background-color: beige">
<form name="myForm" action"courses.php" method="post">
    CourseName: &nbsp; &nbsp; &nbsp;<input type="text" name="courseName"></br> </br>

Course Code: &nbsp&nbsp&nbsp&nbsp <input type="text" name="courseCode"></br> </br>

 instructor Id: &nbsp; &nbsp; &nbsp;
<select class="" name="">
    <option value="instructorId">istructornamr</option>
    <option value=""></option>
    <option value=""></option>
</select>
 <input type="text" name="instructorId"></br> </br>
Term: &nbsp&nbsp&nbsp&nbsp<input type="text" name="term" ></br> </br>
Credit: &nbsp&nbsp&nbsp&nbsp<input type="text" name="credit" ></br> </br>
period: &nbsp&nbsp&nbsp&nbsp<input type="text" name="period" ></br> </br>
 Prerequesite: &nbsp; &nbsp; &nbsp;<input type="text" name="prereq"></br> </br>
TextBook: &nbsp&nbsp&nbsp&nbsp<input type="text" name="book"></br> </br>
</br>
<input type="submit" value="Create Courses" name="submit">





</form>
</div>

</body>
</html>
