<?php
$panjang = 30;
$lebar = 80;
$luas = $panjang * $lebar;
$maks = 100;
if ( $luas > $maks)
echo "Luas lebih dari $maks";
?>

<?php
// Nilai $panjang dan $lebar bisa diganti, 
// agar lebih mudah memahami.
    $panjang = 30;
    $lebar = 80;
    $luas = $panjang * $lebar;
    $maks = 100;
if ( $luas > $maks)
{
    echo "Panjang = $panjang <br>";
    echo "Lebar = $lebar <br>";
    echo "Luas Yang Dihasilkan = $luas <br>";
    echo "Luas Maksimal = $maks <br>";
    echo "Luas lebih dari $maks";
}
?>
<?php
for ($a = 0;   $a  <  200  ; $a++ )
	{
	     if ($a  ==  40) {break; }
	     else echo   "$a  ,  ";
	}
?>

<?php
for ($a = 0;   $a  <  10  ; $a++ )
	{
	     if ($a%2==0) continue;
	     echo   "$a  ,  ";
	}
?>