<?php include "../inc/dbinfo.inc"; ?>
<html>
<body>
<h1>Sample page</h1>
<?php

  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  VerifyEmployeesTable($connection, DB_DATABASE);

  VerifyDepartmentsTable($connection, DB_DATABASE);

  $employee_name = htmlentities($_POST['NAME']);
  $employee_address = htmlentities($_POST['ADDRESS']);

  if (strlen($employee_name) || strlen($employee_address)) {
    AddEmployee($connection, $employee_name, $employee_address);
  }

  $department_name = htmlentities($_POST['DEPARTMENT_NAME']);
  $department_location = htmlentities($_POST['LOCATION']);
  $department_number = htmlentities($_POST['NUM_EMPLOYEES']);
  $department_budget = htmlentities($_POST['BUDGET']);

  if (strlen($department_name) || strlen($department_location) || strlen($department_number) || strlen($department_budget)) {
    AddDepartment($connection, $department_name, $department_location, $department_number, $department_budget);
  }
?>

<h2>Add Employee</h2>
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>NAME</td>
      <td>ADDRESS</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="NAME" maxlength="45" size="30" />
      </td>
      <td>
        <input type="text" name="ADDRESS" maxlength="90" size="60" />
      </td>
      <td>
        <input type="submit" value="Add Employee" />
      </td>
    </tr>
  </table>
</form>

<h2>Add Department</h2>
<form action="<?PHP echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
  <table border="0">
    <tr>
      <td>DEPARTMENT NAME</td>
      <td>LOCATION</td>
      <td>NUM_EMPLOYEES</td>
      <td>BUDGET</td>
    </tr>
    <tr>
      <td>
        <input type="text" name="DEPARTMENT_NAME" maxlength="45" size="30" />
      </td>
      <td>
        <input type="text" name="LOCATION" maxlength="90" size="60" />
      </td>
      <td>
        <input type="number" name="NUM_EMPLOYEES" maxlength="11" size="30" />
      </td>
      <td>
        <input type="text" name="BUDGET" maxlength="15" size="30" />
      </td>
      <td>
        <input type="submit" value="Add Department" />
      </td>
    </tr>
  </table>
</form>

<?php

function AddEmployee($connection, $name, $address) {
   $n = mysqli_real_escape_string($connection, $name);
   $a = mysqli_real_escape_string($connection, $address);

   $query = "INSERT INTO EMPLOYEES (NAME, ADDRESS) VALUES ('$n', '$a');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding employee data.</p>");
}

function AddDepartment($connection, $department_name, $location, $num_employees, $budget) {
    $dn = mysqli_real_escape_string($connection, $department_name);
    $loc = mysqli_real_escape_string($connection, $location);
    $num = mysqli_real_escape_string($connection, $num_employees);
    $bud = mysqli_real_escape_string($connection, $budget);
    
    $query = "INSERT INTO DEPARTMENTS (DEPARTMENT_NAME, LOCATION, NUM_EMPLOYEES, BUDGET) VALUES ('$dn', '$loc', '$num', '$bud');";
    
    if(!mysqli_query($connection, $query)) echo("<p>Error adding department data.</p>");
}

function VerifyDepartmentsTable($connection, $dbName) {
    if(!TableExists("DEPARTMENTS", $connection, $dbName))
    {
        $query = "CREATE TABLE DEPARTMENTS (
            ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            DEPARTMENT_NAME VARCHAR(45),
            LOCATION VARCHAR(90),
            NUM_EMPLOYEES INT,
            BUDGET DECIMAL(15,2)
        )";
        
        if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
    }
}

function VerifyEmployeesTable($connection, $dbName) {
  if(!TableExists("EMPLOYEES", $connection, $dbName))
  {
     $query = "CREATE TABLE EMPLOYEES (
         ID int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         NAME VARCHAR(45),
         ADDRESS VARCHAR(90)
       )";

     if(!mysqli_query($connection, $query)) echo("<p>Error creating table.</p>");
  }
}

function TableExists($tableName, $connection, $dbName) {
  $t = mysqli_real_escape_string($connection, $tableName);
  $d = mysqli_real_escape_string($connection, $dbName);

  $checktable = mysqli_query($connection,
      "SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = '$t' AND TABLE_SCHEMA = '$d'");

  if(mysqli_num_rows($checktable) > 0) return true;

  return false;
}
?>
</body>
</html>
