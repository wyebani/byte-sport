<?php
/* Smarty version 3.1.33, created on 2018-12-29 14:15:21
  from 'D:\xampp\htdocs\byte-sport\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c2773698f92d4_00379217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c337c5716cfc5f3f073f0acfff3205e85ab28c31' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\index.tpl',
      1 => 1546012445,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:menu-admin.tpl' => 1,
    'file:menu.tpl' => 1,
    'file:notlogged-menu.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5c2773698f92d4_00379217 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container"> 
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php if (!empty($_SESSION['isLogin'])) {?>
        <?php if ($_SESSION['permissions'] == 1) {?>
            <?php $_smarty_tpl->_subTemplateRender("file:menu-admin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php } else { ?>
            <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
    <?php } else { ?>
        <?php $_smarty_tpl->_subTemplateRender("file:notlogged-menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php }?>

    <?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
        <div id="main" style="text-align: center">
            <div class="row">
                <div class="col"> 
                    <article id="First">


                    </article>
                    <article id="Second">

                    </article>
                    <article id="Third">

                    </article>
                </div>
            </div>	
        </div>
    </div>
    <button type="button" id="next" class="btn btn-primary">Następne</button>
    <button type="button" id="previous" class="btn btn-primary">Poprzednie</button>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div><?php }
}
