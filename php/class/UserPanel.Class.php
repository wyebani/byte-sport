<?php

require 'MySql.Class.php';
require '../../libs/Smarty.class.php';

include 'logout.php';

/*******************************************************************************
 * @brief Parent class with Smarty and DataBase objects.                       *
 * @author Marek                                                               *
 * @date 10.11.2018                                                            *
 ******************************************************************************/

class UserPanel extends Crud {
   
		function updateUserData()
		{
			update("user_details", 
						array('email' => $newPass),
						array('id' => $userID));
		}
		
		function changeUserPassword($newPass, $userID)
		{
			update("user_details", 
						array('email' => $newPass),
						array('id' => $userID));
		}
		
		function changeUserEmail($newEmail, $userID)
		{
			update("user_details", 
						array('email' => $newEmail),
						array('id' => $userID));
		}
		
		function addLeague()
		{
			//TO DO
		}
		
		function deleteLeague()
		{
			//TO DO
		}
		
		

}
/*******************************************************************************
 *                              END OF FILE                                    *
 ******************************************************************************/
