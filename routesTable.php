<?php
$jsonData = file_get_contents('fakeDB.json');
$Fakeroutes = json_decode($jsonData, true);
require_once('db.php');
$routes = getAllRoutes();
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $routes = searchRoute($_POST['villeDepart'], $_POST['villeArrivee'], $_POST['prixRecommande']);
}
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
            <th>Edit</th>
            <th>Date</th>
        </tr>

        <?php foreach ($routes as $route) : ?>
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
                <td class='edit-icon'>
                    <?php include('./components/popup.php') ?>
                </td>
                <td>
                    <?php
                    $url = './components/editForm.php?' . urlencode($route['idTrajet']);
                    ?>

                    <a href="<?php echo $url; ?>">Edit page</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</div>