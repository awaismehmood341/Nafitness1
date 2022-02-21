<?php
$fullname = $_POST['fullname'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$age =$_POST['age'];
$course =$_POST['course'];
$create_password =$_POST['create_password'];
$repeat_password =$_POST['repeat_password'];
if (!empty($fullname)||!empty($email)|| !empty($phone)|| !empty($create_password) || !empty($repeat_password))
{
    $host="localhost";
    $dbUsername ="root";
    $dbPassword ="";
    $dbname ="nafitness";

    $conn = new mysqli($host,$dbUsername,$dbPassword,$dbname);
    if(mysqli_connect_error())
    {
        die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else
    {
        $SELECT = "SELECT email from registration where email = ? LIMIT 1";
        $INSERT = "INSERT Into registration (fullname, email,phone, course, create_password,repeat_password) values(?,?,?,?,?) ";
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum=$stmt->num_rows;
        if($rnum==0)
        {
            $stmt->close();

            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssiss",$fullname, $email,$phone,$create_password,$repeat_password);
            $stmt->execute();
            echo"NEW RECORD INSERTED SUCCESSFULLY";
        }
        else
        {
            echo"EMAIL ALREADY TAKEN";

        }
        $stmt->close();
        $conn->close();

    }

}
else
{
    echo"All fields are required";
    die();

}