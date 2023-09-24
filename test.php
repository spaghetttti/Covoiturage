<pre>
  <?php
  print_r($_GET['chiffre'])

      ?>
</pre>

<form action="/test.php" method="GET">
    <input type="number" name="chiffre" placeholder='number'> <button type="submit">
        Deviner
    </button>
</form>