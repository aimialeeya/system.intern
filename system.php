<!DOCTYPE html>
<html>
<head>
  <title>TnB Calculate</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>bill calculate</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <div class="form-group">
        <label for="voltan">Voltage </label>
        <input type="number" class="form-control" id="voltan" name="voltan" step="any" required>Voltage (V)
      </div>
      <div class="form-group">
        <label for="ampere">Current </label>
        <input type="number" class="form-control" id="ampere" name="ampere" step="any" required>Ampere (A)
      </div>
      <div class="form-group">
          <label for="rate">Current Rate </label>
        <input type="number" class="form-control" id="rate" name="rate" step="any" required>sen/kWh
      </div>
      <button type="submit" class="btn btn-primary">Calculate</button>
    </form>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $voltan = $_POST["voltan"];
        $ampere = $_POST["ampere"];
        $rate = $_POST["rate"];
        $time = 1;
        $bil = 0;

        calcAll($voltan,$ampere,$rate);
      }
        function calcAll($voltan,$ampere,$rate){
            echo '<table class="table">';
            echo '<tr><th> # </th><td> <th> HOUR </th><td> <th> Energy  (kWh)</th><td> <th> Total (RM )</th><td>';
            echo '</table>';  
            
        for ($time = 1; $time <= 24; $time++) {

        // Calculte power in watt
        $power = $voltan * $ampere;
        
        // Calculate energy in kilowatt-jam
        $energy = $power * $time / 1000;
        
        // Calculate total in sen
        $total = $energy * $rate * 100;
        $bil = $time;
        // Output
        echo '<table class="table">';
        echo "<tr><td>$bil</td><td>$time</td><td>$energy</td><td>$total</td></tr>";
        echo '</table>';
      }}
    ?>
  </div>
</body>
</html>