<?php
$jsonData = file_get_contents('fakeDB.json');

// Decode the JSON data into a PHP array
$routes = json_decode($jsonData, true);
?>
<div class="routes-table">
        <h1>Routes</h1>
    <table>
        <tr>
            <th>Départ</th>
            <th>Arrivée</th>
            <th>Date</th>
            <th>Nom</th>
        </tr>
        <?php foreach ($routes['routes'] as $route): ?>
            <tr>
                <td>
                    <?php echo $route['departure']; ?>
                </td>
                <td>
                    <?php echo $route['arrival']; ?>
                </td>
                <td>
                    <?php echo $route['date']; ?>
                </td>
                <td>
                    <?php echo $route['name']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>