<?php require_once('assets/header.inc.php'); ?>

<?php require_once('config.php'); ?>

<div class="container">
    <h2>Pastato informacijos keitimas</h2>  

    <?php
        $link = Database();

        $id = $_GET['id'] ?? 0;
        $id = intval($id);

        $sql = "SELECT * FROM `buildings_en` WHERE id = $id";
        $result = $link->query($sql);
        if (!$result || $result->num_rows === 0) {
            die("Record not found.");
        }
        $row = $result->fetch_assoc();
        $link->close();
    ?>
   
    <form id="editForm" action="actions/update-building.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

        <div class="mb-3">
            <label class="form-label">Pavadinimas</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['buildingName']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Autorius</label>
            <textarea class="form-control" name="author" rows="4"><?= htmlspecialchars($row['buildingAuthor']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Adresas</label>
            <input type="text" class="form-control" name="address" value="<?= htmlspecialchars($row['buildingAddress']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">latitude</label>
            <input type="text" class="form-control" name="latitude" value="<?= htmlspecialchars($row['latitude']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">longitude</label>
            <input type="text" class="form-control" name="longitude" value="<?= htmlspecialchars($row['longitude']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Aprašymas</label>
            <div id="editor">
                <?= $row['buildingDescription'] ?>
            </div>
        </div>

        <textarea class="form-control" name="description" id="description" hidden></textarea>

        <div class="mb-3">
            <label class="form-label">Dabartinė nuotrauka</label><br>
            <?php if (!empty($row['imageSrc'])): ?>
                <img src="<?= htmlspecialchars($row['imageSrc']) ?>" alt="Image" style="max-width: 200px;"><br>
            <?php else: ?>
                <p>Nėra nuotraukos.</p>
            <?php endif; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Įkelti naują nuotrauką (jeigu norima pakeisti dabartinę)</label>
            <input type="file" class="form-control" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Atnaujinti</button>
    </form>
</div>

<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.getElementById('editForm').addEventListener('submit', function() {
        document.getElementById('description').value = quill.root.innerHTML;
    });
</script>

<?php require_once('assets/footer.inc.php'); ?>