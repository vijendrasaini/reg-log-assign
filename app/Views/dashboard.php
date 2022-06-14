<?php $session = \Config\Services::session(); ?>
<?= $this->extend('templates/base') ?>

<?= $this->section('content') ?>
<div class="container px-5">
    <h3 class="mt-3">Welcome to Dashboard</h1>
    <table>
        <tbody>
            <tr>
                <td>Name : </td>
                <td><?= strtoupper($session->get('firstname')) ?> <?= strtoupper($session->get('lastname')) ?></td>
            </tr>
            <tr>
                <td>Email : </td>
                <td><?= $session->get('email') ?></td>
            </tr>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>