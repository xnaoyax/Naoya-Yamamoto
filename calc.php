<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calc.html</title>
</head>
    <body>

    <form name = "form" action = "calc.php" method = "post">
       <input type ="text" name ="txtA" >
         <select name = "四則演算">
             <option value = "+">＋</option>
            <option value = "－">－</option>
            <option value = "×">×</option>
            <option value = "÷">÷</option>
         </select>

            <input type ="text" name ="txtB" > =　？
            <input type ="submit" value ="計算結果">
            <input type = "reset" value ="クリア">
    </form>
<?php
if(isset($_POST["txtA"]) && isset($_POST["txtB"])) {
    $a = $_POST['txtA'];
    $b = $_POST['txtB'];
    $ope = $_POST['四則演算'];

    switch ($ope) {
        case "+":
            $answer = $a + $b;
            break;
        case "－":
            $answer = $a - $b;
            break;
        case "×":
            $answer = $a * $b;
            break;
        case "÷":
            $answer = $a / $b;
            break;
        default:
            break;
    }

    print ($a . "" . $ope . "" . $b . "=" . $answer);

}
?>

</body>
</html>



