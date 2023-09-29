<!doctype html>
<html lang="en">
    <?php
        include('session.php');
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $make = mysqli_real_escape_string($conn, $_POST['make']);
            $model = mysqli_real_escape_string($conn, $_POST['model']);
            $year = $_POST['year'];
            $conditio = mysqli_real_escape_string($conn, $_POST['conditio']);
            $price = $_POST['price'];
            $mileage = $_POST['mileage'];
            $dealer_lot = mysqli_real_escape_string($conn, $_POST['dealer_lot']);
            $exterior_color = mysqli_real_escape_string($conn, $_POST['exterior_color']);
            $interior_color = mysqli_real_escape_string($conn, $_POST['interior_color']);
            $notes = mysqli_real_escape_string($conn, $_POST['notes']);
            $extras = mysqli_real_escape_string($conn, $_POST['extras']);
            
            //Remember to edit this to protect against sql injection attacks.
            $sql = "INSERT INTO cars VALUES(NULL, '$make', '$model', $year, '$conditio', $price, $mileage, '$dealer_lot', '$exterior_color', '$interior_color', '$notes', '$extras')";
            $result = mysqli_query($conn, $sql);
    
            echo $sql;
        }
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Add Cars</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <h1>Add Cars</h1>
        <h2>Logged in as <?php echo $login_session; ?></h2>
        <h3><a href = "logout.php">Sign Out</a></h3>

        <form style="width:500px" method="post" action="add_cars.php">
            <div class="form-group">
                <label for="make">Make</label>
                <input type="text" class="form-control" id="make" name="make" maxlength="30">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" class="form-control" id="model" name="model" maxlength="30">
            </div>
            <!--Change the year to a different type of input in future update.-->
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" class="form-control" id="year" name="year" min="1901" max="2155">
            </div>
            <div class="form-group">
                <label for="conditio">Condition</label>
                <input type="text" class="form-control" id="conditio" name="conditio" maxlength="100">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="1000" max="100000" step=".01">
            </div>
            <div class="form-group">
                <label for="price">Mileage</label>
                <input type="number" class="form-control" id="mileage" name="mileage" min="0" max="1000000">
            </div>
            <div class="form-group">
                <label for="dealer_lot">Dealer lot</label>
                <input type="text" class="form-control" id="dealer_lot" name="dealer_lot" maxlength="100">
            </div>
            <div class="form-group">
                <label for="exterior_color">Exterior color</label>
                <input type="text" class="form-control" id="exterior_color" name="exterior_color" maxlength="20">
            </div>
            <div class="form-group">
                <label for="interior_color">Interior color</label>
                <input type="text" class="form-control" id="interior_color" name="interior_color" maxlength="20">
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <input type="text" class="form-control" id="notes" name="notes" maxlength="255">
            </div>
            <div class="form-group">
                <label for="extras">Extras</label>
                <input type="text" class="form-control" id="extras" name="extras" maxlength="255">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </body>
   
</html>