<pre>
  <?php
  var_dump($_GET);

  ?>
</pre>

<!DOCTYPE html>
<html lang="en">
<?php include 'components/header.php'; ?>
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