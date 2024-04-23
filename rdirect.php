redirect.php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db";

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $req_type = '$_GET';
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $req_type = '$_POST';
}

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
    die("Connection Failed: ". $conn->connect_error);
}


if(isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $contactnum = $_POST['contactnum'];

    $sql = "INSERT INTO person(person_fname,person_mname,person_lname,person_age,person_gender,person_email,person_address,person_contactnum) VALUES('$fname', '$mname', '$lname','$age','$gender','$email','$address','$contactnum')";

    if($conn->query($sql) === TRUE) {
        $isSuccess = true;
    } else {
        echo $sql." ".$conn->error;
    }

}

?>

<?php include './layout/head.php'; ?>
    
    <?php if($isSuccess ): ?>
        <h3>Record Successfully Inserted to Database</h3>
    <?php endif; ?>

    <table>
        <tr>
            <td width="120">First Name:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['fname'] : $_POST['fname']; ?>
            </td>
        </tr>
        <tr>
            <td>Middle Name:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['mname'] : $_POST['mname']; ?>
            </td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['lname'] : $_POST['lname'];?>
            </td>
        </tr>
        <tr>
            <td>Age:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['age'] : $_POST['age'];?>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['gender'] : $_POST['gender'];?>
            </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['email'] : $_POST['email'];?>
            </td>
        </tr>
        <tr>
            <td>Address:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['address'] : $_POST['address'];?>
            </td>
        </tr>
        <tr>
            <td>Contact Number:</td>
            <td style="text-decoration: underline">
                <!-- Use ternary operator to check if the request type is GET or POST -->
                <?php echo ($req_type == '$_GET') ? $_GET['contactnum'] : $_POST['contactnum'];?>
            </td>
        </tr>
    </table>
    <br>
    <a href="./">Back to Main Form</a>
<?php include './layout/foot.php'; ?>