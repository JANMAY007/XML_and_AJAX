<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP suggest</title>
</head>
<body>
    <?php
    $a[] = "Alvin";
    $a[] = "Barbara";
    $a[] = "Cosme";
    $a[] = "Dalila";
    $a[] = "Erick";
    $a[] = "Flossie";
    $a[] = "Gill";
    $a[] = "Henriette";
    $a[] = "Zelda";
    $a[] = "Greg";
    $a[] = "Hilary";
    $a[] = "Linda";
    $a[] = "Paul";
    $a[] = "Rosa";
    $a[] = "Zeke";
    $a[] = "Aletta";
    $a[] = "Xavier";
    $a[] = "Xina";
    $a[] = "Darby";
    $a[] = "Adrian";
    $a[] = "Frank";
    $a[] = "Howard";
    $a[] = "Blanca";
    $a[] = "Elida";

    $q = $_REQUEST["q"];

    $hint = "";

    if ($q !== "")
    {
        $q = strtolower($q);
        $len=strlen($q);
        foreach($a as $name)
        {
            if (stristr($q, substr($name, 0, $len)))
            {
                if ($hint === "")
                {
                    $hint = $name;
                }
                else
                {
                    $hint .= ", $name";
                }
            }
        }
    }

    echo $hint === "" ? "no suggestion" : $hint;
    ?>
</body>
</html>