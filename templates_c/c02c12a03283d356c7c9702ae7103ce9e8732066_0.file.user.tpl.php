<?php
/* Smarty version 3.1.33, created on 2018-11-22 19:57:03
  from 'D:\xampp\htdocs\byte-sport\templates\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf6fbffc8e5d1_49212789',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c02c12a03283d356c7c9702ae7103ce9e8732066' => 
    array (
      0 => 'D:\\xampp\\htdocs\\byte-sport\\templates\\user.tpl',
      1 => 1542912925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf6fbffc8e5d1_49212789 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Panel Użytkownika</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, maximum-scale=1.3, initial-scale=1.0"> 
        <link rel="stylesheet" href="../../css/user.css"/>
    </head>
    <body >
      
		<header>
				<img src="../../image/banner.jpg" width=" 100% " height="200" alt="Baner"/>
		</header>
        <div id="container">
            <nav>
              
                <ul>
                      
                <li id="text" margin="0px" >Login: PolskaGola</li>
                <li id="text">Twoja ulubiona liga: Polska</li>
                <li id="text">Godzina: 12:38</li>
                 
                </ul>
               
            </nav>
            
                <aside>
                    <a href="../../index.html"> <p class="myButton">Strona Głowna</p> </a>
                    <p class="myButton">Dane Osobowe </p> 
                    <p class="myButton">Zmień hasło</p>
                    <p class="myButton">Zmień mail'a</p>
                    <p class="myButton">Dodaj/Usun ligi</p>
                    <p class="myButton">Wyloguj</p>
                    
                </aside>
                
            
            <article>
                <div id="personal_data">
                    <table>
                        <tr>
                            <td>Imie: </td>
                            <td><input type="text" value=<?php echo $_SESSION['userDetails']['name'];?>
 class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Nazwisko:  </td>
                            <td><input type="text" value=<?php echo $_SESSION['userDetails']['surname'];?>
 class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Wiek:  </td>
                            <td><input type="text" value=<?php echo $_SESSION['userDetails']['date_of_birth'];?>
 class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Twoja ulubiona drużyna: </td>
                            <td><input type="text" value="Piast Gliwice" class="inputclass"/></td>
                            
                        </tr>
                        
                    </table>
                  <input type="submit" value="ok" class="submitclass"/>
                </div>
                <div id="change_password">
                    <table>
                        <tr>
                            <td>Aktualne hasło: </td>
                            <td><input type="Password"  class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Nowe Hasło: </td>
                            <td><input type="Password" class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Potwiedz Hasło: </td>
                            <td><input type="Password"  class="inputclass"/></td>
                            
                        </tr>
                    </table>
                      <input type="submit" value="ok" class="submitclass"/>
                </div>
                <div id="change_mail">
                    <table>
                         <tr>
                            <td>Twoj mail to: </td>
                            <td><input type="text" value="PolskaGola@gmail.com"  class="inputclass"/></td>
                            
                        </tr>
                        <tr>
                            <td>Nowy mail: </td>
                            <td><input type="text" class="inputclass"/></td>
                            
                        </tr>
                    </table>
                     <input type="submit" value="ok" class="submitclass"/>
                </div>
                <div id="add_or_delete_league">
                    <table>
                         <tr>
                            <td>Dodaj Lige</td>
                            <td><input list="add_league" name="add"   class="inputclass"/>
                            <datalist id="add_league"  >
                      <option value="Włochy">
                        <option value="Anglia">  
                            <option value="Niemcy">
                                </datalist>
                          </td>
                        
                            
                        </tr>
                        <tr>
                             <td>Usun Lige</td>
                            <td><input list="delete_league" name="delete"   class="inputclass"/>
                            <datalist id="delete_league"  >
                            <option value="Polska">
                                </datalist>
                          </td>
                            
                        </tr>
                    </table>
                     <input type="submit" value="ok" class="submitclass"/>
                     
                     
                    <!-- Zrobcie sobie <form action="User.php" method="post"> tak zmiencie typ na php
                    najlepiej, nastepnie jak przechwycic liste? isset($_POST['add']) 
                    podlozyc backend pod wszystkie datalist pod login haslo ,mail-->
                </div>
                </article>
        </div>
		
    </body>
</html>
<?php }
}
