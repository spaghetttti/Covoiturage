<?php
$jsonData = file_get_contents('fakeDB.json');
$Fakeroutes = json_decode($jsonData, true);
include('db.php');
$routes = getAllRoutes();
// var_dump($routes);
// // var_dump($Fakeroutes);
?>
<div class="routes-table">
    <h1>Routes</h1>
    <table>
        <tr>
            <th>idTrajet</th>
            <th>Depart</th>
            <th>Arrivée</th>
            <th>prixRecommande €</th>
            <th>Date</th>
        </tr>

        <?php foreach ($routes as $route): ?>
            <tr>
                <td>
                    <?php echo $route['idTrajet']; ?>
                </td>
                <td>
                    <?php echo $route['villeDepart']; ?>
                </td>
                <td>
                    <?php echo $route['villeArrivee']; ?>
                </td>
                <td>
                    <?php echo $route['prixRecommande']; ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>