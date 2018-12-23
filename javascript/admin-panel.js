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
        $('#editUserModal-content').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/user/editUser-modal.php",
            data: { userId: USERID }
        }).done(function (msg) {
            $('#editUserModal-content').html(msg);
        });
        
        $("#editUserModal").modal({
            keyboard: true
        });
    });
    
    $( "#editUserForm-submit" ).click(function(e) {
       $.ajax({
           method: "POST",
           url: "../functions/admin_panel/user/editUser.php",
           data: $( "#editUserForm" ).serialize(),
           success: function(msg) {
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
    
    // EDIT LEAGUE TO DO
    
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
    
/*******************************************************************************
 * Matches submenu
 ******************************************************************************/

    $( "#allMatchesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('allMatches');
    });
    
    $( "#ongoingMatchesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('ongoingMatches');
    });
    
    $( "#finishedMatchesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('finishedMatches');
    });
    
    $( "#addMatchBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('addMatch');
    });
    

/*******************************************************************************
 * Articles submenu
 ******************************************************************************/

    $( "#allArticlesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('allArticles');
    });
    
    $( "#myArticlesBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('myArticles');
    });
    
    $( "#addArticleBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
        show('addArticle');
    });
    
});


function show(id) {
    $('.collapse').removeClass('show');
    $(id).addClass('show');
}
