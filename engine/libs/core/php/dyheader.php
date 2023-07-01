<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
?>

<header class="header">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-12 menu-head">
                <div class="row">
                    <div class="col-3 my-logo">
                        <span class="icon-MC">
                            <span class="my-logo__icon-MC_MC">
                                Mathchecker
                            </span>
                            <span class="my-logo__icon-MC_tagline">
                                Только быстрые результаты!
                            </span>
                        </span>
                    </div>
                    <ul class="col">
                        <li><a class="btn-head" href="index?page=home">Главная</a></li>
                        <li><a class="btn-head" href="index?page=about_us">О нас</a></li>
                        <li><a class="btn-head" href="index?page=about_the_department">О кафедре</a></li>
                        <?php if(isset($_SESSION['u_id'])): ?>
                            <li><a class="btn-head" href="index?page=profile&id=<?=$_SESSION['u_id']?>"><b><?=getUserName($_SESSION['u_id'])?></b></a></li>
                            <li class="menu-head_btn-logout"><a href="index?do=logout" class="btn-logout">Выйти</a>
                        <?php else: ?>
                            <li class="menu-head_btn-logout"><a href="index?page=login" class="btn-logout">Выйти</a>
                        <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>