<?php require_once('assets/header.inc.php'); ?>

<?php 
    if(userLogged()) {
        header("location: index.php");
        exit;
    }
?>

<div class="d-flex align-items-center justify-content-center py-5">
    <main class="form-signin w-100 m-auto">
        <form action="actions/login-user.php" method="post">
            <h1 class="h3 mb-1 fw-normal">Prisijunkite</h1>
            <small class="d-block mb-3"></small>

            <?php
                if(isset($_GET['error'])):
                    $id = $_GET['error'];
            ?>
            <div class="alert alert-danger" role="alert">
                <?php echo getLoginError($id); ?>
            </div>
            <?php endif; ?>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" name="username" placeholder="vartpava">
                <label for="floatingInput">Vartotojo vardas</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Slaptažodis">
                <label for="floatingPassword">Slaptažodis</label>
            </div>
            
            <button class="btn btn-primary w-100 py-2" type="submit">Prisijungti</button>
        </form>
    </main>
</div>

<?php require_once('assets/footer.inc.php'); ?>