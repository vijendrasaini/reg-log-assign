<?php $session = \Config\Services::session();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Please Sign Up</h1>
    <?php if($session->getTempdata('database_error')):?>
        <h4><?=$session->getTempdata('database_error')?></h4>
    <?php endif;?>
    <?= form_open('register')?><table>
            <tbody>
                <tr>
                    <td>First Name</td>
                    <td>
                        <input type="text" name="firstname" value="<?= set_value("firstname") ?>">
                        <span><?=display_validation_error($validation, 'firstname')?></span>
                    </td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td>
                        <input type="text" name="lastname" value="<?= set_value("lastname") ?>">
                        <span><?= display_validation_error($validation, "lastname") ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" value="<?= set_value("email") ?>">
                        <span><?= display_validation_error($validation, "email") ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" >
                        <span><?= display_validation_error($validation, "password") ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" >
                        <span><?= display_validation_error($validation, "confirm_password") ?></span>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Submit"></td >
                </tr>
            </tbody>
        </table>
    <?= form_close()?>
</body>
</html>