<?php $session = \Config\Services::session(); ?>
<?= $this->extend('templates/base') ?>

<?= $this->section('content') ?>
<div>
    <?php if ($session->getTempdata('database_error')) : ?>
        <div class="container">
        <div class="alert alert-warning alert-dismissible fade show container px-5" role="alert">
            <span>
                <?= $session->getTempdata('database_error') ?></>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </span>
        </div>
        </div>
    <?php endif; ?>
    <div class="container mt-3 px-5">
        <p class="h2 fw-bold mt-2 mb-4">Please Login</p>
        <div class="row">
            <div class="col-6 px-5">
                <form action="http://localhost/learnlogin/public/index.php/login" method="post" class="pe-5" novalidate>
                    <div class="mb-4">
                        <label for="" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="<?= set_value("email") ?>">
                        <p class="text-danger"><?= display_validation_error($validation, "email") ?></p>
                    </div>
                    <div class="mb-4">
                        <label for="" class="form-label">Password</label>
                        <input class="form-control" type="password" name="password">
                        <p class="text-danger"><?= display_validation_error($validation, "password") ?></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <input class="btn btn-primary" type="submit" value="Signup">
                    </div>
                </form>
            </div>
            <div class="col-6">
                <img class="img-fluid img-thumbnail" src="https://cdn.dribbble.com/users/2158473/screenshots/5701300/media/abdfc052a7d88c808f12f7c246171ac2.jpg?compress=1&resize=400x300" alt="">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>