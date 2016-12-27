<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calc.html</title>
</head>
    <body>

    <form name = "form" action = "calc.php" method = "post">
        半角で数値を入力して下さい。<br>
       <input type ="text" name ="txtA" >
         <select name = "四則演算">
             <option value = "+">＋</option>
            <option value = "－">－</option>
            <option value = "×">×</option>
            <option value = "÷">÷</option>
         </select>

            <input type ="text" name ="txtB" > =　？
            <input type ="submit" value ="計算結果">
    </form>
<?php
    if (isset($_POST["txtA"]) && isset($_POST["txtB"]))
    {
        if (is_numeric($_POST["txtA"]) && is_numeric($_POST["txtB"]))
        {
            $a = $_POST['txtA'];
            $b = $_POST['txtB'];
            $a = mb_convert_kana($a, "ra");
            $b = mb_convert_kana($b, "ra");
            $ope = $_POST['四則演算'];
            switch ($ope)
            {
                case "+":
                    $answer = $a + $b;
                    echo ($a . "" . $ope . "" . $b . "=" . $answer);
                    break;
                case "－":
                    $answer = $a - $b;
                    echo ($a . "" . $ope . "" . $b . "=" . $answer);
                    break;
                case "×":
                    $answer = $a * $b;
                    echo ($a . "" . $ope . "" . $b . "=" . $answer);
                    break;
                case "÷":
                    if ($_POST["txtB"] != 0) {
                        $answer = $a / $b;
                        echo ($a . "" . $ope . "" . $b . "=" . $answer);
                    }
                    else {
                        echo "0で割ってはいけません。";
                    }
                    break;
                default;
                    break;
            }
        }
    }
    else{
        $answer = "";
        print "";
    }
?>
    <a href ="#" onclick = "history.back(); return false;"> 戻る</a>
</body>
</html>



