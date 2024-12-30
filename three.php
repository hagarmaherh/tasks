<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: red;}
</style>
</head>
<body>

<?php
$nameErr = $emailErr = $coursesErr = $genderErr = $agreeErr = $groupErr = "";
$name = $email = $gender = $courses = $class_details = $group = $agree = "";

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    
    if (empty($_POST["group"])) {
        $groupErr = "Group is required";
    } else {
        $group = test_input($_POST["group"]);
    }
    
    $class_details = isset($_POST["class_details"]) ? test_input($_POST["class_details"]) : "";
    
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }
    
    if (empty($_POST["course"])) {
        $coursesErr = "Choose at least one course";
    } else {
        $courses = implode(", ", $_POST["course"]);
    }
    
    if (empty($_POST["agree"])) {
        $agreeErr = "You must agree to proceed";
    } else {
        $agree = "Yes";
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
  Name: 
  <input type="text" name="name" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr; ?></span>
  <br><br>
  
  E-mail:
  <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>
  
  Group:
  <input type="text" name="group" value="<?php echo $group; ?>">
  <span class="error">* <?php echo $groupErr; ?></span>
  <br><br>
  
  Class details:
  <textarea name="class_details" rows="5" cols="40"><?php echo $class_details; ?></textarea>
  <br><br>
  
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male
  <span class="error">* <?php echo $genderErr; ?></span>
  <br><br>
  
  Select courses:
  <select multiple name="course[]">
    <option value="php" <?php if (strpos($courses, "php") !== false) echo "selected"; ?>>PHP</option>
    <option value="sql" <?php if (strpos($courses, "sql") !== false) echo "selected"; ?>>SQL</option>
    <option value="css" <?php if (strpos($courses, "css") !== false) echo "selected"; ?>>CSS</option>
    <option value="html" <?php if (strpos($courses, "html") !== false) echo "selected"; ?>>HTML</option>
  </select>
  <span class="error">* <?php echo $coursesErr; ?></span>
  <br><br>
  
  Agree:
  <input type="checkbox" name="agree" value="yes" <?php if ($agree == "Yes") echo "checked"; ?>>
  <span class="error">* <?php echo $agreeErr; ?></span>
  <br><br>
  
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// Display the outputs

    echo "<h2>Your Input:</h2>";
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Group: " . $group . "<br>";
    echo "Class Details: " . $class_details . "<br>";
    echo "Courses: " . $courses . "<br>";
    echo "Gender: " . $gender . "<br>";
    

?>

</body>
</html>
