<?php

use CodeIgniter\Database\BaseUtils;

 $session = \Config\Services::session() ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apna Complex : Create account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="p-0 m-0">
    <div class="container m-auto px-4 m-0">
        <div class="row px-4 bg-light">
            <div class="col-10 d-flex align-items-center">
                <a class="navbar-brand" href="<?=base_url()?>/login"><h2 class="p-0 m-0 fw-bold text-success">Apna Complex</h2></a>
            </div>
            <div class="col-2 pt-3">
                <ul class="d-flex list-unstyled col justify-content-between align-items-center">
                    <?php if(!$session->get('email')): ?>
                        <li><a class="nav-link" href="<?=base_url()?>/register">Register</a></li>
                        <li><a class="nav-link" href="<?=base_url()?>/login">Login</a></li>
                    <?php else: ?>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi <?= $session->get('firstname'); ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                  <li><a class="dropdown-item" href="<?=base_url()?>/dashboard">Dashboard</a></li>
                                  <li><a class="dropdown-item" href="<?=base_url()?>/logout">Logout</a></li>
                                </ul>
                              </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>

    <div>
        <?= $this->renderSection('content') ?>
    </div>

    </body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
    crossorigin="anonymous"></script>