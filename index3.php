<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database search</title>
    <script>
    function StudentData(str) {
        if (str == "") {
            document.getElementById("Hint").innerHTML = "";
            return;
        }
        else { 
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            }
            else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("Hint").innerHTML = xmlhttp.responseText;
                }
            };
            xmlhttp.open("GET","dbcon.php?q="+str,true);
            xmlhttp.send();
        }
    }
    </script>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mywebsite";
    $connect = new mysqli($servername, $username, $password, $dbname);
    if ($connect->connect_error)
    {
        die("Connection failed: " . $connect->connect_error);
    }

    $sql = "SELECT id, fname, lname FROM students ORDER BY fname";
    $result = $connect->query($sql);

    if ($result->num_rows > 0)
    {
        echo '<select name="users" onchange="StudentData(this.value)">';
        echo "<option value='0'>Select Name</option>";
        while($row = $result->fetch_assoc())
        {
        echo "<option value='" . $row['id'] . "'>" . $row['fname']. " " . $row['lname']. "</option>";
        }
        echo "</select>";
    }
    else
    {
        echo "0 results";
    }
    $connect->close();

    ?>
    <br>
    <br>
    <div id="Hint">
        <b>Table Data will be Displayed here</b>
    </div>
</body>
</html>