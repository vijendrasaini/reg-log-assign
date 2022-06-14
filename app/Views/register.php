<?php $session = \Config\Services::session(); ?>
<?= $this->extend('templates/base') ?>

<?= $this->section('content') ?>
<div class="container mt-3 px-5">
    <?php if ($session->getTempdata('database_error')) : ?>
        <h4><?= $session->getTempdata('database_error') ?></h4>
    <?php endif; ?>
    <p class="h2 fw-bold mt-2 mb-4">Register with us</p>
    <div class="row">
        <div class="col-6">
            <form action="http://localhost/learnlogin/public/index.php/register" method="post" class="pe-5" novalidate>
                <div class="mb-4">
                    <label for="" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="firstname" value="<?= set_value("firstname") ?>">
                    <p class="text-danger"><?=display_validation_error($validation, 'firstname')?></p>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastname" value="<?= set_value("lastname") ?>">
                    <p class="text-danger"><?= display_validation_error($validation, "lastname") ?></p>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Email</label>
                    <input class="form-control" type="email" name="email" value="<?= set_value("email") ?>">
                    <p class="text-danger"><?= display_validation_error($validation, "email") ?></p>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" >
                    <p class="text-danger"><?= display_validation_error($validation, "password") ?></p>
                </div>
                <div class="mb-4">
                    <label for="" class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password" >
                    <p class="text-danger"><?= display_validation_error($validation, "confirm_password") ?></p>
                </div>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Signup">
                </div>
            </form>
        </div>
        <div class="col-6">
            <img class="img-fluid img-thumbnail" src="https://png.pngtree.com/element_our/20190524/ourlarge/pngtree-cartoon-man-working-image_1102677.jpg" alt="">
        </div>
    </div>
</div>
<?= $this->endSection() ?>