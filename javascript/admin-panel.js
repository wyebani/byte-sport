$( document ).ready(function() {
   
/*******************************************************************************
 * Menu functions
 ******************************************************************************/  
   
    $( "#usersBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        $('#usersTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/user/getAllUsers.php"
        }).done(function (msg) {
            $('#usersTableContent').html(msg);
        });
        
        show('users');
    });
    
    $( "#leaguesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        $('#leagueTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues.php"
        }).done(function (msg) {
            $('#leagueTableContent').html(msg);
        });
        
        show('leagues');
    });
    
    $( "#teamsBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        $('#leaguePicker').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues_picker.php"
        }).done(function (msg) {
            $('#leaguePicker').html(msg);
        });
        
        $('#teamTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/team/getAllTeams.php"
        }).done(function (msg) {
            $('#teamTableContent').html(msg);
        });
        
        show('teams');
    });
    
    $( "#matchesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('matches');
    });
    
    $( "#articlesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('articles');
    });
    
    $( "#logoutBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
    });
    
/*******************************************************************************
 * User functions
 ******************************************************************************/    
    
    $( "#addUserForm" ).submit(function(e) {
        var USERNAME = document.getElementById("username").value;
        var EMAIL = document.getElementById("email").value;
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/user/addNewUser.php",
           data: { username: USERNAME, email: EMAIL },
           success: function(msg) {
               $('#usersTableContent').html(msg);
           }
       });
       
       e.preventDefault();
    });
    
    $(document).on("click", ".deleteUser", function(){
        var USERID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/deleteUser.php",
            data: { userId: USERID }
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });
    
    $(document).on("click", ".activateUser", function(){
        var USERID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/activateUser.php",
            data: { userId: USERID }
        }).done(function () {
            THIS.remove();
        });
    });
    
    $(document).on("click", ".editUser", function(){
        var USERID = $('th:first', $(this).parents('tr')).text();
        
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/user/getUserById.php",
            data: { userId: USERID }
        }).done(function (msg) {
            var userData = jQuery.parseJSON(msg);
            $( "#editUserForm #userId_edit" ).val(userData.id);
            $( "#editUserForm #old_password_edit" ).val(userData.password);
            $( "#editUserForm #username_edit").val(userData.username);
            $( "#editUserForm #name_edit" ).val(userData.name);
            $( "#editUserForm #surname_edit" ).val(userData.surname);
            $( "#editUserForm #email_edit" ).val(userData.email);
            $( "#editUserForm #dateOfBirth_edit" ).val(userData.date_of_birth);
            if(userData.permissions === "1") {
                $( "#editUserForm #permissions_edit" ).attr('checked', true);
            }
            
            if(userData.active === "1") {
                $( "#editUserForm #active_edit" ).attr('checked', true);
            }
            
            $("#editUserModal").modal({
                show: true
            });
        });  
    });
    
    $( "#editUserForm-submit" ).click(function(e) {
        var id = document.getElementById("userId_edit").value;
        var old_password = document.getElementById("old_password_edit").value;
        var username = document.getElementById("username_edit").value;
        var name = document.getElementById("name_edit").value;
        var surname = document.getElementById("surname_edit").value;
        var email = document.getElementById("email_edit").value;
        var date_of_birth = document.getElementById("date_of_birth_edit").value;
        var new_password = document.getElementById("new_password_edit").value;
        var password_confirm = document.getElementById("password_confirm_edit").value;
        var permissions = $('#permissions_edit').prop('checked') ? 1 : 0;
        var active = $('#active_edit').prop('checked') ? 1 : 0;
        
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/user/editUser.php",
           data: {
               id: id,
               old_password: old_password,
               username: username,
               name: name,
               surname: surname,
               email: email,
               date_of_birth: date_of_birth,
               new_password: new_password,
               password_confirm: password_confirm,
               permissions: permissions,
               active: active
           },
           success: function(msg) {
               $( "#usersBtn" ).click();
               $("#editUserModal").modal('toggle');
           }
       });
       e.preventDefault();
    });

    
/*******************************************************************************
 * League functions
 ******************************************************************************/      
    
    $( "#addLeagueForm" ).submit(function(e) {
        var LEAGUENAME = document.getElementById("league_name").value;
        var COUNTRY = document.getElementById("countryPicker").value;
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/league/addNewLeague.php",
           data: { leagueName: LEAGUENAME, country: COUNTRY },
           success: function(msg) {
               $('#leagueTableContent').html(msg);
           }
       });
       
       e.preventDefault();
    });
    
    $(document).on("click", ".deleteLeague", function(){
        var LEAGUEID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/league/deleteLeague.php",
            data: { leagueId: LEAGUEID }
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });
    
    $(document).on("click", ".editLeague", function(){
        var LEAGUEID = $('th:first', $(this).parents('tr')).text();
        
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getLeagueById.php",
            data: { leagueId: LEAGUEID }
        }).done(function (msg) {
            var leagueData = jQuery.parseJSON(msg);
            $( "#editLeagueForm #leagueId_edit" ).val(leagueData.id);
            $( "#editLeagueForm #leagueName_edit" ).val(leagueData.name);
            $( "#editLeagueForm #leagueCountry_edit" ).val(leagueData.country);
            $( "#editLeagueForm #organizer_edit" ).val(leagueData.organizer);
            $( "#editLeagueForm #date_of_found_edit" ).val(leagueData.date_of_found);
            
            $("#editLeagueModal").modal({
                show: true
            });
        });  
    });
    
    $( "#editLeagueForm-submit" ).click(function(e) {
        var id = document.getElementById("leagueId_edit").value;
        var name = document.getElementById("leagueName_edit").value;
        var country = document.getElementById("leagueCountry_edit").value;
        var organizer = document.getElementById("organizer_edit").value;
        var date_of_found = document.getElementById("date_of_found_edit").value;
        
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/league/editLeague.php",
           data: {
              id: id,
              name: name,
              country: country,
              organizer: organizer,
              date_of_found: date_of_found
           },
           success: function(msg) {
               $( "#leaguesBtn" ).click();
               $("#editLeagueModal").modal('toggle');
           }
       });
       e.preventDefault();
    });
    
/*******************************************************************************
 * Team functions
 ******************************************************************************/     
    
    $( "#addTeamForm" ).submit(function(e) {
        var TEAMNAME = document.getElementById("team_name").value;
        var LEAGUEID = document.getElementById("leaguePicker").value;
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/team/addNewTeam.php",
           data: { teamName: TEAMNAME, leagueId: LEAGUEID },
           success: function(msg) {
               $('#teamTableContent').html(msg);
           }
       });
       
       e.preventDefault();
    });
    
    $(document).on("click", ".deleteTeam", function(){
        var TEAMID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/team/deleteTeam.php",
            data: { teamId: TEAMID }
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });
    
    $(document).on("click", ".editTeam", function(){
        var TEAMID = $('th:first', $(this).parents('tr')).text();
        
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/team/getTeamById.php",
            data: { teamId: TEAMID }
        }).done(function (msg) {
            var teamData = jQuery.parseJSON(msg);
            
            $('#teamLeague_edit').html('');
            $.ajax({
                method: "GET",
                url: "../functions/admin_panel/league/getAllLeagues_picker.php"
            }).done(function (picker) {
                $('#teamLeague_edit').html(picker);
            });
            
            $( "#editTeamForm #teamId_edit" ).val(teamData.id);
            $( "#editTeamForm #teamName_edit" ).val(teamData.name);
            $( "#editTeamForm #teamLeague_edit" ).val(teamData.league);
            $( "#editTeamForm #teamGround_edit" ).val(teamData.ground);
            $( "#editTeamForm #teamCoach_edit" ).val(teamData.head_coach);
            $( "#editTeamForm #teamWebsite_edit" ).val(teamData.website);
            
            $("#editTeamModal").modal({
                show: true
            });
        });  
    });
    
/*******************************************************************************
 * Matches submenu
 ******************************************************************************/


    

/*******************************************************************************
 * Articles submenu
 ******************************************************************************/

    $( "#allArticlesBtn" ).click(function (e) {
        $('#articlesTableContent').html('');
        
        $.ajax({
           method: "GET",
           url: "../functions/admin_panel/article/getAllArticles.php"
        }).done(function(msg) {
            $('#articlesTableContent').html(msg);
        });
    });
  
    $( "#myArticlesBtn" ).click(function (e) {
        $('#myArticlesTableContent').html('');
        
        $.ajax({
           method: "GET",
           url: "../functions/admin_panel/article/getMyArticles.php"
        }).done(function(msg) {
            $('#myArticlesTableContent').html(msg);
        });
    });
    
    $( "#addArticleBtn" ).click(function (e) {
        $('#articleLeaguePicker').html('');
        
        $.ajax({
           method: "GET",
           url: "../functions/admin_panel/league/getAllLeagues_picker.php"
        }).done(function(msg) {
            $('#articleLeaguePicker').html(msg);
        });
    });
    
/*******************************************************************************
 * Articles content
 ******************************************************************************/

    $( "#addArticleForm" ).submit(function (e) {
        var TITLE = document.getElementById("titleInput").value;
        var LEAGUEID = document.getElementById("articleLeaguePicker").value;
        var CONTENT = document.getElementById("contentInput").value;
        
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/article/addArticle.php",
            data: {
                title : TITLE,
                leagueId : LEAGUEID,
                content : CONTENT
            }
        }).done(function (msg) {
            var data = jQuery.parseJSON(msg);
            if(data === true) {
                alert("Pomyślnie dodano artykuł!");
            } else {
                alert(msg);
            }
        });
        
        e.preventDefault();
    });
    
    $(document).on("click", ".deleteArticle", function(){
        var ARTICLEID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/article/deleteArticle.php",
            data: { articleId: ARTICLEID }
        }).done(function (msg) {
            var result = jQuery.parseJSON(msg);
            if(result === true) {
                THIS.parents("tr").remove();
            } else {
                alert("Nie udało się usunąć artykułu, spróbuj później!");
            }
        });
    });
    
    
});


function show(id) {
    $('.collapse').removeClass('show');
    $(id).addClass('show');
}
