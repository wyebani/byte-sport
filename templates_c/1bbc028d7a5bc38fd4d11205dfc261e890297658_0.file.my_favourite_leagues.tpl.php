<?php
/* Smarty version 3.1.33, created on 2019-01-08 18:17:42
  from 'D:\xampp\htdocs\byte-sport\templates\my_favourite_leagues.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c34db3635ca33_99454687',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bbc028d7a5bc38fd4d11205dfc261e890297658' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\my_favourite_leagues.tpl',
      1 => 1546967323,
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
function content_5c34db3635ca33_99454687 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container"> 
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
 src="javascript/my_favourite_leagues.js" async><?php echo '</script'; ?>
>

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
             <h1 style="color:red" >Twoje artykuły dotyczące ulubionych lig </h1>
             <br>
             
            <div class="row">
                <div class="col"> 
                  <article id="First" >
                         <div class="row">
                             <div class="col-2" id="Firstimage" >
                                 
                             </div>
                             <div class="col-9">
                                 <div id="Firstdescription" style="border-bottom: solid red 1px"  >
                                     <h1 id="Firsth1"></h1>
                                     
                                 </div>
                             </div>
                         </div>

                     </article>
                    <article id="Second">
                             <div class="row">
                             <div class="col-2" id="Secondimage">
                                
                             </div>
                             <div class="col-9">
                                 <div id="Seconddescription" style="border-bottom: solid red 1px"  >
                                     <h1 id="Secodh1"></h1>
                                     
                                 </div>
                             </div>
                         </div>
                     </article>
                      <article id="Third" >
                             <div class="row">
                             <div class="col-2" id="Thirdimage">
                                 
                             </div>
                             <div class="col-9">
                                 <div id="Thirddescription" style="border-bottom: solid red 1px"  >
                                     <div id="Thirdh1"></div>
                                     
                                 </div>
                             </div>
                         </div>
                     </article>
                </div>
            </div>	
        </div>
    </div>
    <button type="button" id="next" style="margin-top: 5px" class="btn btn-primary">Następne</button>
    <button type="button" id="previous" style="margin-top: 5px" class="btn btn-primary">Poprzednie</button>
    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php }
}
