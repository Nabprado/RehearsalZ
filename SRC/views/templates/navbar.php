<?php session_start();?>
<nav class="navbar">

<!-- login & register -->
    <div class="user">
        <ul>
        <?php if(empty($_SESSION) || !isset($_SESSION['logged_in'])){ ?>
            <a href="/?page=register"><li><img src="/PUBLIC/assets/icons8-tuning-fork-64.png" alt="Sign up"><p>Sign up</p></li></a>
            <a href="/?page=login"><li><img src="/PUBLIC/assets/icons8-rock-music-64.png" alt="Login"><p>Log in</p></li></a>
        <?php }
        if(!empty($_SESSION)){ if(isset($_SESSION['logged_in'])){ ?>
            <a href="/?page=profile&id=<?=$_SESSION['id']?>"><li><img src="/PUBLIC/assets/icons8-rock-music-64.png" alt="Profile"><p>Profile</p></li></a>
            <a href="/?page=logout&id=<?=$_SESSION['id']?>"><li><img src="/PUBLIC/assets/icons8-rockstar-64.png" alt="Logout"><p>Log out</p></li></a>
        <?php }} ?>
        </ul>
    </div>

<!-- navbar list -->
    <ul class="navbar_list">
        <?php
        nav_item('/?page=home', 'Home');
        nav_item('/?page=about', 'About us');
        ?>
    </ul>

<!-- burger menu -->
    <div class="navbar_burger">
        <button class="burger">
            <span class="burger_bar"></span>
        </button>
    </div>
    
</nav>