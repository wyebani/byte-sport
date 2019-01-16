$(document).ready(function () {
   
    //Edit user data
    $("#editUserForm").submit(function (e) {        
        var USERNAME = document.getElementById("username_edit").value;
        var NAME = document.getElementById("name_edit").value;
        var SURNAME = document.getElementById("surname_edit").value;
        var EMAIL = document.getElementById("email_edit").value;
        var DOB = document.getElementById("date_of_birth_edit").value;
        
        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/editUserData.php",
            data: {username: USERNAME, name: NAME, surname: SURNAME, email: EMAIL, date_of_birth: DOB},
            success: function (msg) {
                alert(msg);
            }
        });

        e.preventDefault();    
    }); 

    //Change user password
    $("#editUserPass").submit(function (e) {        
        var PASS = document.getElementById("new_password_edit").value;
        var OLDPASS = document.getElementById().value;
        var CONFIRM = document.getElementById
        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/editUserData.php",
            data: {password: PASS},
            success: function (msg) {
                alert(msg);
            }
        });

        e.preventDefault();    
    });

    $("#personalDateBtn").click(function (e){
       alert("kokos");
        
    });

    $("#homePageBtn").click(function(e){
        alert("Strona główna");
    });

   

});