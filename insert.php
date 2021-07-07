<?php

$name=$_POST['name'];
$email=$_POST['email'];
$assword=$_POST['password'];
$contact=$_POST['contact'];

if(!empty($name) || !empty($email) || !empty($password) || !empty($contact))
{
    $host="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbname="silverthreadud";

    //create a connection
    $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

    if(mysqli_connect_error())
    {
        die('Connect error('.mysqli_connect_errno().')'.mysqli_connect_error());

    }
    else
    {
    $SELECT="SELECT email From user_dataa Where email=? Limit 1";
    $INSERT="INSERT Into user_dataa (name, email, password, contact) values (?,?,?,?)";
    
    //prepare the connection
    $stmt=$conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum=$stmt->id;
    
    if($rnum=0)
    {
        $stmt->close();

        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("sssi", $name,$email,$password,$contact );
        $stmt->execute();
        echo("Registration succsessfull.");
    }
    else
    {
        echo("Email already used.");
        
    }

    $stmt->close();
    $conn->close();
    

    }
}
else
{
    echo "All field are required";
    die();
}

?>


