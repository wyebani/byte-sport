<?php
/* Smarty version 3.1.33, created on 2019-01-16 19:28:39
  from 'D:\xampp\htdocs\bs\dobre\byte-sport-v.0.2\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c3f77d71b7566_57223815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b88f96063b0d8a8e55b0a2468e42c0f80b3c77f5' => 
    array (
      0 => 'D:\\xampp\\htdocs\\bs\\dobre\\byte-sport-v.0.2\\templates\\menu.tpl',
      1 => 1547397573,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3f77d71b7566_57223815 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-dark bg-dark navbar-expand-md">


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainmenu">

        <ul class="navbar-nav mr-auto">

            <li class="nav-item active">

            </li>

        </ul>

        <div class="form-inline">

            <ul class="nav navbar-nav" style="margin-right:10px">

                <li class="nav-item" style="margin-right:50px;">
                    <h4 style="display:inline-block; color:white">Zalogowany: <?php echo $_SESSION['userDetails']['name'];?>
 <?php echo $_SESSION['userDetails']['surname'];?>
</h4>  
                </li>
                <div class="dropdown-divider"></div>

                <li class="nav-item dropdown" style="margin-right:50px;">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false" id="submenu" aria-haspopup="true"> Menu </a>

                    <div class="dropdown-menu" aria-labelledby="submenu">

                        <a class="dropdown-item" href="php/functions/showMyProfil.php"> Mój profil </a>
                        <a class="dropdown-item"  href="my_favourite_leagues.php"  > Moja ulubiona Liga </a>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item" >
                    <form method="post" action="php/functions/logout.php">    
                        <button type="submit" class="btn btn-danger" id="logout_button" >Wyloguj</button>
                    </form>
                </li>
            </ul>

        </div>

    </div>

</nav><?php }
}
