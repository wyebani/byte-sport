<?php
/* Smarty version 3.1.33, created on 2018-12-29 16:03:39
  from 'D:\xampp\htdocs\byte-sport\templates\menu-admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c278ccbd5a608_38853391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '889cc921d801ea85bcd99857635221feed78391a' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\menu-admin.tpl',
      1 => 1546095818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c278ccbd5a608_38853391 (Smarty_Internal_Template $_smarty_tpl) {
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

                        <a class="dropdown-item" href="#"> Mój profil </a>
                        <a class="dropdown-item" href="#"> Moja ulubiona Liga </a>
                        <a class="dropdown-item" href="admin-login.html"> Panel Administratora </a>
                    </div>
                </li>
                <div class="dropdown-divider"></div>
                <li class="nav-item">
                    <form method="post" action="php/functions/logout.php">    
                        <button type="submit" class="btn btn-danger" id="logaut_button">Wyloguj</button>
                    </form>
                </li>
            </ul>

        </form>

    </div>

</nav><?php }
}
