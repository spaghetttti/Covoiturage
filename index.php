<pre>
  <?php
  var_dump($_GET);

  ?>
</pre>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css" />
  <title>Covoiturage</title>
</head>

<body>
  <header>
    <h1>Covoiturage</h1>
  </header>
  <div class="carpool-utils">
    <?php include 'forms.php'; ?>
  </div>
  <?php include 'routesTable.php'; ?>
</body>

</html>