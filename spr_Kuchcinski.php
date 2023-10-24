<!-- Piotr Kuchciński -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="#" method="post">
<?php
$serwer="localhost";
$user="root";
$pass="";
$baza="samochody1";
$con=mysqli_connect($serwer, $user, $pass, $baza);
if($con)
echo "Połączono z bazą";
else
echo "Błąd" ;
$q1= "SELECT * FROM `ryby`";
$r1= mysqli_query($con, $q1);
echo '<table border = "2">';
echo '<tr><td>id</td>
<td>nazwa</td>
<td>wystepowanie</td>
<td>styl_zycia</td></tr>';

while($wiersz=mysqli_fetch_assoc($r1))
{

    echo '<tr><td>'. $wiersz['id']. '</td>
    <td>'.$wiersz['nazwa']. '</td>
    <td>'.$wiersz['wystepowanie']. '</td>
    <td>'.$wiersz['styl_zycia']. '</td>
    </tr>';
}
echo '</table>';

$q2= "SELECT nazwa FROM `ryby`";
$r2= mysqli_query($con, $q2);

echo '<select name="nazwa">';

while($select = mysqli_fetch_assoc($r2))

      echo '<option >'.$select['nazwa'].'</option>';

echo '<input type="submit" value="Submit">';    

echo '</select>';
$q3 = " SELECT * FROM `ryby`WHERE nazwa like '$_POST[nazwa]';";
$r3 = mysqli_query($con, $q3);
echo '<table border = "2">';
echo '<tr><td>id</td>
<td>nazwa</td>
<td>wystepowanie</td>
<td>styl_zycia</td></tr>';

while($wiersz=mysqli_fetch_assoc($r3))
{

    echo '<tr><td>'. $wiersz['id']. '</td>
    <td>'.$wiersz['nazwa']. '</td>
    <td>'.$wiersz['wystepowanie']. '</td>
    <td>'.$wiersz['styl_zycia']. '</td>
    </tr>';
}
echo '</table>';
echo "id:";
echo '<input type="text" name="d_i">';
echo "nazwa:";
echo '<input type="text" name="d_n">';
echo "wystepowanie:";
echo '<input type="text" name="d_w">';
echo "styl_zycia:";
echo '<input type="text" name="d_s">';
echo '<input type="submit" value="Submit">';    
$d_i=$_POST["d_i"];
$d_n=$_POST["d_n"];
$d_w=$_POST["d_w"];
$d_s=$_POST["d_s"];
$q4 = " INSERT INTO ryby(id,nazwa,wystepowanie,styl_zycia)
VALUES ('$d_i','$d_n','$d_w','$d_s');";
$r4 = mysqli_query($con, $q4);
?>

</form>
</body>
</html>