<?php

use App\Core\{Auth, ErrorHandler};
use App\Core\Dispatcher;
use App\View\Helper\HTML;
/* @var $this App\View\View */

/** @var string $title */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" . <?= $_GET['t'] == "site" ? "id='active_th'" : "" ?>. href="<?= Dispatcher::dispatcher()->encodeUri("site/home") ?>">Главная<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" . <?= $_GET['t'] == "supply" ? "id='active_th'" : "" ?>. href="<?= Dispatcher::dispatcher()->encodeUri("supply/show", ['page' => 1]) ?>">Поставки</a>

                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" . <?= ($_GET['t'] == "goods" || $_GET['t'] == "recipt" || $_GET['t'] == "users" || $_GET['t'] == "usergroup") ? "id='active_th'" : "" ?>. href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Справочники
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= Dispatcher::dispatcher()->encodeUri("goods/show", ['page' => 1]) ?>">Товары</a>
                        <a class="dropdown-item" href="<?= Dispatcher::dispatcher()->encodeUri("recipt/show", ['page' => 1]) ?>">Покупатели</a>
                        <a class="dropdown-item <?= $_SESSION['user']['cod'] != "adm" ? " disabled" : "" ?>" href="<?= Dispatcher::dispatcher()->encodeUri("usergroup/show", ['page' => 1]) ?>">Поставщики</a>

                        <a class="dropdown-item <?= $_SESSION['user']['cod'] != "adm" ? " disabled" : "" ?>" href="<?= Dispatcher::dispatcher()->encodeUri("users/show", ['page' => 1]) ?>">Пользователи</a>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  <?= $_SESSION['user']['cod'] != "adm" ? " disabled" : "" ?>" . <?= $_GET['t'] == "forms"  ? "id='active_th'" : "" ?>. href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Выходные формы
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?= Dispatcher::dispatcher()->encodeUri("forms/choosefirm") ?>">Валовый оборот</a>

                    </div>
                </li>
            </ul>


        </div>
        <div class="current_user">
            <?= Auth::currentUserInfo() . " " . (isset($_SESSION['user']) ? "<a href='?a=logout'><img src='/public/css/img/logout.png'></a>" : "") ?>
        </div>
    </nav>

    <div id="maincontent">
        <br>
        <?php $this->body(); ?>
        <br>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>