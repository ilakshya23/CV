<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="./phpstyle.css">
</head>
<body>
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$project = $_POST['project'];

$conn = new mysqli('localhost','root','','CV');
if($conn->connect_error){
    die('Conection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into information(name, email, proect)
    values(?, ?, ?)");
    $stmt->bind_param("sss",$name,$email,$project);
    $stmt->execute();
    echo "registration successful...";
    $stmt->close();
    $conn->close();
}
?>
<br><br>
<a href="/index.html"><button type="button">Click Here To Go Back</button></a>
</body>
</html>

