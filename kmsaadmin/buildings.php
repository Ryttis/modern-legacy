<?php require_once('assets/header.inc.php'); ?>

<?php require_once('config.php'); ?>

<div class="container">
    <h2>Pastatų redagavimas</h2>  
    <a href="addbuilding.php" class="btn btn-success">Pridėti pastatą</a><br><br>
    
    <?php
    $link = Database();

    // Query to select all rows
    $sql = "SELECT * FROM `buildings_en`";
    $result = mysqli_query($link, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
            echo "<tr><th>ID</th><th>Pavadinimas</th><th>Autorius</th><th>Adresas</th><th>#</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['buildingName']) . "</td>";
                echo "<td>" . htmlspecialchars($row['buildingAuthor']) . "</td>";
                echo "<td>" . htmlspecialchars($row['buildingAddress']) . "</td>";
                echo "<td><a href='edit-building.php?id={$row['id']}'>EDIT</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No records found.";
        }

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($link);
    }
    ?>
</div>

<?php require_once('assets/footer.inc.php'); ?>