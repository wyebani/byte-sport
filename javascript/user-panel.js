$(document).ready(function () {

    //Edit user data
    $("#editUserForm").submit(function (e) {

        var NAME = document.getElementById("name_edit").value;
        var SURNAME = document.getElementById("surname_edit").value;
        var EMAIL = document.getElementById("email_edit").value;
        var DOB = document.getElementById("date_of_birth_edit").value;

        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/editUserData.php",
            data: {name: NAME, surname: SURNAME, email: EMAIL, date_of_birth: DOB},
            success: function (msg) {
                alert(msg);
            }
        });

        e.preventDefault();
    });

    //Change user password
    $("#editUserPass").submit(function (e) {
        var PASS = document.getElementById("new_password_edit").value;
        var OLDPASS = document.getElementById("old_password_edit").value;
        var CONFIRM = document.getElementById("password_confirm_edit").value;
        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/editUserData.php",
            data: {password: PASS, oldpass: OLDPASS, confirmpass: CONFIRM},
            success: function (msg) {
                alert(msg);
            }
        });

        e.preventDefault();
    });

    $("#passwordBtn").click(function () {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        show('changePassword');
    });

    //Fill user data
    $("#personalDateBtn").click(function (e) {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        $.ajax({
            url: "../php/functions/user_panel/fillUserData.php",
            success: function (msg) {
                var userData = jQuery.parseJSON(msg);
                document.getElementById("name_edit").value = userData.name;
                document.getElementById("surname_edit").value = userData.surname;
                document.getElementById("email_edit").value = userData.email;
                document.getElementById("date_of_birth_edit").value = userData.date_of_birth;
            }
        });
        show('personalDate');
        e.preventDefault();
    });

    //Return to homepage
    $("#homePageBtn").click(function (e) {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        window.location = '../index.php';
    });

    //Logout
    $("#logoutBtn").click(function (e) {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        $.ajax({
            url: "../php/functions/logout.php",
            success: function () {
                alert("Wylogowano!");
                window.location = '../index.php';
            }
        })
        e.preventDefault();
    });


    //Add favourite leagues
    $("#addLeague-submit").click(function (e) {
        var CHOSENLEAGUE = $('#countryPicker').find(":selected").val();
        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/addNewLeague.php",
            data: {chosenLeague: CHOSENLEAGUE},
            success: function (msg) {
                alert(msg);
                fillTable();
            }
        })
        e.preventDefault();
    });

    $("#favoriteTeamsBtn").click(function (e) {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        fillTable();
        show('favoriteTeams');
    });

    $(document).on("click", ".deleteLeague", function () {
        var LEAGUENAME = $('td:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../php/functions/user_panel/deleteLeague.php",
            data: {leagueName: LEAGUENAME}
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });


    // Start function
    $("#personalDateBtn").click();
});

function show(id) {
    $('.collapse').removeClass('show');
    $(id).addClass('show');
}

function fillTable()
{
    $('#myLeagues').html('');
    $.ajax({
        method: "GET",
        url: "../php/functions/user_panel/fillLeagues.php"
    }).done(function(msg) {
        $('#myLeagues').html(msg);
    });
}