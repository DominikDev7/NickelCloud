<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>NickelCloud</title>
    <?php
    
    $servername = "localhost";
    $username = "bruv";
    $passwort = "123";
    $dbname = "server";
    
    $verbindung = new mysqli($servername, $username, $passwort);
    
    if ($verbindung->connect_error) {
      die("Connection failed: " . $verbindung->connect_error);
    }
    echo "Connected successfully";
    
    ?>
</head>

<body>
<header>
    <a href="Projekt.php" class="überschrift"><h1>NickelCloud</h1></a>
    <nav>    
        <ul id="navigleiste">
            <a href="Projekt.php" class="liste"><li><h2>Home</h2></li></a>
        </ul>
    </nav>
</header>
    



<?php
$VMname = "";
$CPU= "";
$CPUerr = "";
$RAM= "";
$RAMerr= "";
$SSD= "";
$SSDerr= "";

if (empty($_POST["VM Name:"])) {
  $VMname = "";
} else {
  $VMname = test_input($_POST["VM Name:"]);
}
  if (empty($_POST["CPU"])) {
    $CPUerr = "Bite etwas auswählen!!";
  } 
  if (empty($_POST["RAM"])) {
    $RAMerr = "Bite etwas auswählen!!";
  } 
  if (empty($_POST["SSD"])) {
    $SSDerr = "Bite etwas auswählen!!";
  } 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form action="checked.php" method="post">
VMname: 
<textarea name="vmname" rows="1" cols="20"><?php echo $VMname;?></textarea>
<br><br>

Prozessoren (CPU): gewünschte Anzahl Cores (Anzahl):
  <input type="radio" name="CPU" checked <?php if (isset($CPU) && $CPU=="1") echo "CPU";?> value="1">1 (1 CHF)
  <input type="radio" name="CPU" checked <?php if (isset($CPU) && $CPU=="2") echo "CPU";?> value="2">2 (2 CHF)
  <input type="radio" name="CPU" checked <?php if (isset($CPU) && $CPU=="4") echo "CPU";?> value="4">4 (4 CHF)
  <input type="radio" name="CPU" checked <?php if (isset($CPU) && $CPU=="8") echo "CPU";?> value="8">8 (8 CHF)
  <input type="radio" name="CPU" checked <?php if (isset($CPU) && $CPU=="16") echo "CPU";?> value="16">16 (16 CHF)  
  <span class="error">* <?php echo $CPU;?></span>
  <br><br>

  Arbeitsspeicher RAM: gewünschte Grösse in (MB):
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="1") echo "RAM";?> value="512">512 (1 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="2") echo "RAM";?> value="1024">1024 (2 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="4") echo "RAM";?> value="2048">2048 (4 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="8") echo "RAM";?> value="4096">4096 (8 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="16") echo "RAM";?> value="8192">8192 (16 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="8") echo "RAM";?> value="16384">16384 (32 CHF)
  <input type="radio" name="RAM" checked <?php if (isset($RAM) && $RAM=="16") echo "RAM";?> value="32768">32768 (64 CHF)    
  <span class="error">* <?php echo $RAM;?></span>
  <br><br>
  
  Speicherplatz (SSD): gewünschte Grösse (GB):
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="1") echo "SSD";?> value="10">10 (1 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="2") echo "SSD";?> value="20">20 (2 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="4") echo "SSD";?> value="40">40 (3 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="8") echo "SSD";?> value="80">80 (4 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="16") echo "SSD";?> value="240">240 (5 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="8") echo "SSD";?> value="500">500 (6 CHF)
  <input type="radio" name="SSD" checked <?php if (isset($SSD) && $SSD=="16") echo "SSD";?> value="1000">1000 (8 CHF)    
  <span class="error">* <?php echo $SSD;?></span>
  <br><br>
  
  <input type="submit" name="Fertig" value="Fertig">  

</form>
</body>
</html>