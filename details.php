<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Details</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <?php
            include "navigation.php";

            //Remember to edit this to protect against sql injection attacks.
            $sql = "SELECT * FROM cars WHERE id = " . $_GET['id'];
            echo $sql;
            $result = $conn->query($sql);
            //I was originally planning to make the page change colors depending on the colors of the car but I might not end up doing that.
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo
                    '
                        <h1>' . $row['year'] . $row['make'] . $row['model'] .  '</h1>
                        <table>
                            <tr><td>Condition:</td><td>' . $row['conditio'] . '</td></tr>
                            <tr><td>Price:</td><td>' . $row['price'] . '</td></tr>
                            <tr><td>ID:</td><td>' . $row['id'] . '</td></tr>
                            <tr><td>Mileage:</td><td>' . $row['mileage'] . '</td></tr>
                            <tr><td>Exterior color:</td><td>' . $row['exterior_color'] . '</td></tr>
                            <tr><td>Interior color:</td><td>' . $row['interior_color'] . '</td></tr>
                        </table>
                        <h3>Notes:</h3><p>' . $row['notes'] . '</p>
                        <h3>Extras:</h3><p>' . $row['extras'] . '</p>
                                    
                    ';
              }
            } else {
              echo "Car ID not found.";
            }

            $conn->close();
        ?>



</body>
</html>