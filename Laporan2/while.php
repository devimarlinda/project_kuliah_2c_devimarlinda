<!DOCTYPE html>
<html lang="en">
<body>
    <?php
    echo "<h3>cara 1</h3>";
    $i = 1;
    while ($i <= 10){
        echo $i;
        $i++;
    }
    echo "<br>";

    echo "<h3>cara 2</h3>";
    $i = 1;
    while ($i <= 10):
        echo $i;
        $i++;
    endwhile;
    ?>
</body>
</html>
