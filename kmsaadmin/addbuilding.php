<?php require_once('assets/header.inc.php'); ?>

<div class="container">
    <h2>Pastato pridėjimas</h2>  
    
    <div class="mt-5">
        <form action="actions/save-building.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Pastato pavadinimas</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="mb-3">
                <label for="author" class="form-label">Autorius</label>
                <textarea class="form-control" id="author" name="author" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Adresas</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Aprašymas</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">latitude</label>
                <input type="text" class="form-control" name="latitude">
            </div>

            <div class="mb-3">
                <label class="form-label">longitude</label>
                <input type="text" class="form-control" name="longitude">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Nuotraukos įkėlimas</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary">Išsaugoti</button>
        </form>
    </div>
</div>

<?php require_once('assets/footer.inc.php'); ?>