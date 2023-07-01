<?php
    //======================================================
    //  Created by Team-9 Mathchecker Team
    //  Copyright © Mathchecker 2020 All rights reserved. 
    //======================================================
?>

<header>
    <nav class="menu-head">
        <a href="index?page=home"><img src="./engine/images/index/logo.png" alt="logo" class="menu-head_logo"></a>
        <ul>
            <li><a class="btn-head" href="index?page=home">Главная</a></li>
            <li><a class="btn-head" href="index?page=about_us">О нас</a></li>
            <li><a class="btn-head" href="index?page=about_the_department">О кафедре</a></li>
            <?php if(isset($_SESSION['u_id'])): ?>
                <li><a class="btn-head" href="index?page=profile&id=<?=$_SESSION['u_id']?>"><b><?=getUserName($_SESSION['u_id'])?></b></a></li>
                <li class="menu-head_btn-login"><a href="index?do=logout" class="btn-login">Выйти</a></li>
            <?php else: ?>
                <li class="menu-head_btn-login"><a href="index?page=login" class="btn-login">Войти</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>