<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Checked</title>
</head>
<body>
    <?php
    
    $host= "localhost";
    $username = "bruv";
    $passwort = "123";
    $dbname = "server";
    
    $mysqli = new mysqli($host, $username, $passwort,$dbname);
    
    if ($mysqli->connect_error) {
      die("Connection failed: " . $mysqli->connect_error);
    }
    echo "Connected successfully";
    
    ?>

<header>
    <a href="Projekt.php" class="Überschrift"><h1>NickelCloud</h1></a>
    <nav>    
        <ul id="navigleiste">
            <a href="Projekt.php" class="liste"><li><h2>Home</h2></li></a>
        </ul>
    </nav>
</header>

<?php    
        if(!empty($_POST['vmname']) && !empty($_POST['CPU']) && !empty($_POST['RAM']) && !empty($_POST['SSD'])){
            $vmname = $_POST['vmname'];
            $cpu = $_POST['CPU'];
            $ram = $_POST['RAM'];
            $ssd = $_POST['SSD'];
            $query = "INSERT INTO `small` ( `name`, `cpu-cores`, `ram-in-mb`, `ssd-in-gb`) VALUES (?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            if (!$stmt) {
                echo "fehler bei Prepare";
             }
             
            $stmt->bind_param("siii", $vmname, $cpu, $ram, $ssd);
            $stmt->execute();
    
            if($stmt){
                echo "From submitted successfullly";
            }
            else {
                echo "Form not submitted";
            }
        }
?>

<?php

?>

</body>
</html>