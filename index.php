<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sample Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <?php
            include "navigation.php";
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "sample_website";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            //echo "Connected successfully";




        ?>
        <div class="row">

        <?php
            $sql = "SELECT * FROM cars";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo    '<div class="card bg-light" style="width:300px"><a href=details.php?id="' . $row['id'] . '">
                                <img class="card-img" style="width:300px" src="placeholder_car_icon.jpg">
                                <div class="card-img-top">
                                    <h5 class="card-title">' . $row['year'] . ' ' . $row['make'] . ' ' . $row['model'] .  '</h5>
                                    <table>
                                        <tr class="card-text"><td>Condition:</td><td>' . $row['conditio'] . '</td></tr>
                                        <tr class="card-text"><td>Price:</td><td>' . $row['price'] . '</td></tr>
                                        <tr class="card-text"><td>ID:</td><td>' . $row['id'] . '</td></tr>
                                        <tr class="card-text"><td>Mileage:</td><td>' . $row['mileage'] . '</td></tr>
                                    </table>
                                </div>
                            </a></div>';
              }
            } else {
              echo "0 results";
            }

            $conn->close();
        ?>

        </div>


</body>
</html>