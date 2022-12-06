<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pregunta 3</title>
</head>

<body>
    <h1>Form</h1>
    <form method="post" enctype="multipart/form-data" action="pregunta3.php">
        File:  <input type="file" name="file"><br>
        <input type="submit" name="submit" value="Save File">
    </form>


    <?php

    if (isset($_POST['submit'])) {

        for ($i = 1; $i <= count($_FILES); $i++) {
            $file = $_FILES["file$i"]["tmp_name"];
            $fileName = basename($_FILES["file$i"]["name"]);
            if ($_FILES["file$i"]['error']) {
                echo " The file didn't send correctly. <br>";
            } else if (!move_uploaded_file($file, __DIR__ . "/$fileName")) {

                echo "Something went wrong <br>";
            } else {
                echo "The file $i uploaded correctly. <br>";
            }
        }
    }
    ?>

    <h3>Uploaded files </h3>
    <?php
    // echo "<table border='solid'><tr><td>" ;
    // for ($i = 1; $i <= count($_FILES); $i++) {
    //         echo $_FILES['file$i']['name'] . "</td><td>" . $_FILES['file$i']['size'] . "</td>";
    //     }

    ?>

</body>

</html>
