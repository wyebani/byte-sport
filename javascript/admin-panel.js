$(document).ready(function () {

/*******************************************************************************
* Menu functions
******************************************************************************/

    $("#usersBtn").click(function () {
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

    $("#leaguesBtn").click(function () {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        $("#countryPicker").html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/country/getAllCountries_picker.php"
        }).done(function (msg) {
            $("#countryPicker").html(msg);
        });

        $('#leagueTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues.php"
        }).done(function (msg) {
            $('#leagueTableContent').html(msg);
        });

        show('leagues');
    });

    $("#teamsBtn").click(function () {
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

    $("#matchesBtn").click(function () {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        $("#upcomingMatchesBtn").click();

        show('matches');
    });

    $("#articlesBtn").click(function () {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');

        $("#allArticlesBtn").click();

        show('articles');
    });

    $("#logoutBtn").click(function () {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
    });

/*******************************************************************************
* User functions
******************************************************************************/

    $("#addUserForm").submit(function (e) {
        var USERNAME = document.getElementById("username").value;
        var EMAIL = document.getElementById("email").value;
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/addNewUser.php",
            data: {username: USERNAME, email: EMAIL},
            success: function (msg) {
                $('#usersTableContent').html(msg);
            }
        });

        e.preventDefault();
    });

    $(document).on("click", ".deleteUser", function () {
        var USERID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/deleteUser.php",
            data: {userId: USERID}
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });

    $(document).on("click", ".activateUser", function () {
        var USERID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/activateUser.php",
            data: {userId: USERID}
        }).done(function () {
            THIS.remove();
        });
    });

    $(document).on("click", ".editUser", function () {
        var USERID = $('th:first', $(this).parents('tr')).text();

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/user/getUserById.php",
            data: {userId: USERID}
        }).done(function (msg) {
            var userData = jQuery.parseJSON(msg);
            $("#editUserForm #userId_edit").val(userData.id);
            $("#editUserForm #username_edit").val(userData.username);
            $("#editUserForm #name_edit").val(userData.name);
            $("#editUserForm #surname_edit").val(userData.surname);
            $("#editUserForm #email_edit").val(userData.email);
            $("#editUserForm #dateOfBirth_edit").val(userData.date_of_birth);
            if (userData.permissions === "1") {
                $("#editUserForm #permissions_edit").attr('checked', true);
            }

            if (userData.active === "1") {
                $("#editUserForm #active_edit").attr('checked', true);
            }

            $("#editUserModal").modal({
                show: true
            });
        });
    });

    $("#editUserForm-submit").click(function (e) {
        var id = document.getElementById("userId_edit").value;
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
                username: username,
                name: name,
                surname: surname,
                email: email,
                date_of_birth: date_of_birth,
                new_password: new_password,
                password_confirm: password_confirm,
                permissions: permissions,
                active: active
            }
        }).done(function (msg) {
            $("#usersBtn").click();
            $("#editUserModal").modal('toggle');
        });

        e.preventDefault();
    });


/*******************************************************************************
* League functions
******************************************************************************/

    $("#addLeagueForm").submit(function (e) {
        var LEAGUENAME = document.getElementById("league_name").value;
        var COUNTRY = document.getElementById("countryPicker").value;
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/league/addNewLeague.php",
            data: {leagueName: LEAGUENAME, country: COUNTRY},
            success: function (msg) {
                $('#leagueTableContent').html(msg);
            }
        });

        e.preventDefault();
    });

    $(document).on("click", ".deleteLeague", function () {
        var LEAGUEID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/league/deleteLeague.php",
            data: {leagueId: LEAGUEID}
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });

    $(document).on("click", ".editLeague", function () {
        var LEAGUEID = $('th:first', $(this).parents('tr')).text();

        $("#leagueCountry_edit").html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/country/getAllCountries_picker.php"
        }).done(function (msg) {
            $("#leagueCountry_edit").html(msg);
        });

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getLeagueById.php",
            data: {leagueId: LEAGUEID}
        }).done(function (msg) {
            var leagueData = jQuery.parseJSON(msg);
            $("#editLeagueForm #leagueId_edit").val(leagueData.id);
            $("#editLeagueForm #leagueName_edit").val(leagueData.name);
            $("#editLeagueForm #leagueCountry_edit").val(leagueData.country_id);
            $("#editLeagueForm #organizer_edit").val(leagueData.organizer);
            $("#editLeagueForm #date_of_found_edit").val(leagueData.date_of_found);

            $("#editLeagueModal").modal({
                show: true
            });
        });
    });

    $("#editLeagueForm-submit").click(function (e) {
        var id = document.getElementById("leagueId_edit").value;
        var name = document.getElementById("leagueName_edit").value;
        var country_id = document.getElementById("leagueCountry_edit").value;
        var organizer = document.getElementById("organizer_edit").value;
        var date_of_found = document.getElementById("date_of_found_edit").value;

        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/league/editLeague.php",
            data: {
                id: id,
                name: name,
                country_id: country_id,
                organizer: organizer,
                date_of_found: date_of_found
            },
            success: function (msg) {
                $("#leaguesBtn").click();
                $("#editLeagueModal").modal('toggle');
            }
        });
        e.preventDefault();
    });

/*******************************************************************************
* Team functions
*******************************************************************************/

    $("#addTeamForm").submit(function (e) {
        var TEAMNAME = document.getElementById("team_name").value;
        var LEAGUEID = document.getElementById("leaguePicker").value;
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/team/addNewTeam.php",
            data: {teamName: TEAMNAME, leagueId: LEAGUEID},
            success: function (msg) {
                $('#teamTableContent').html(msg);
            }
        });

        e.preventDefault();
    });

    $(document).on("click", ".deleteTeam", function () {
        var TEAMID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/team/deleteTeam.php",
            data: {teamId: TEAMID}
        }).done(function () {
            THIS.parents("tr").remove();
        });
    });

    $(document).on("click", ".editTeam", function () {
        var TEAMID = $('th:first', $(this).parents('tr')).text();

        $('#teamLeague_edit').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues_picker.php"
        }).done(function (picker) {
            $('#teamLeague_edit').html(picker);
        });

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/team/getTeamById.php",
            data: {teamId: TEAMID}
        }).done(function (msg) {
            var teamData = jQuery.parseJSON(msg);

            $("#editTeamForm #teamId_edit").val(teamData.id);
            $("#editTeamForm #teamName_edit").val(teamData.name);
            $("#editTeamForm #teamLeague_edit").val(teamData.league_id);
            $("#editTeamForm #teamGround_edit").val(teamData.ground);
            $("#editTeamForm #teamCoach_edit").val(teamData.head_coach);
            $("#editTeamForm #teamWebsite_edit").val(teamData.website);

            $("#editTeamModal").modal({
                show: true
            });
        });
    });

    $("#editTeamForm-submit").click(function (e) {
        var id = document.getElementById("teamId_edit").value;
        var name = document.getElementById("teamName_edit").value;
        var league_id = document.getElementById("teamLeague_edit").value;
        var ground = document.getElementById("teamGround_edit").value;
        var coach = document.getElementById("teamCoach_edit").value;
        var website = document.getElementById("teamWebsite_edit").value;

        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/team/editTeam.php",
            data: {
                id: id,
                name: name,
                league_id: league_id,
                ground: ground,
                head_coach: coach,
                website: website
            }
        }).done(function (msg) {
            $("#teamsBtn").click();
            $("#editTeamModal").modal('toggle');
        });
        e.preventDefault();
    });


/*******************************************************************************
* Matches submenu
*******************************************************************************/

    $("#upcomingMatchesBtn").click(function (e) {
        $('#upcomingMatchesTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/match/getUpcomingMatches.php"
        }).done(function (msg) {
            $('#upcomingMatchesTableContent').html(msg);
        });
        e.preventDefault();
    });

    $("#ongoingMatchesBtn").click(function (e) {
        $('#ongoingMatchesTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/match/getOngoingMatches.php"
        }).done(function (msg) {
            $('#ongoingMatchesTableContent').html(msg);
        });
        e.preventDefault();
    });

    $("#finishedMatchesBtn").click(function (e) {
        $('#finishedMatchesTableContent').html('');
        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/match/getFinishedMatches.php"
        }).done(function (msg) {
            $('#finishedMatchesTableContent').html(msg);
        });
        e.preventDefault();
    });
    
    $( "#addMatchBtn" ).click(function(e) {
       $("#matchLeaguePicker").html(''); 
       $("#matchHostPicker").html(''); 
       $("#matchGuestPicker").html(''); 
       
       $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues_picker.php"
        }).done(function (picker) {
            $('#matchLeaguePicker').html(picker);
        });
        
        changeLeague();
        document.getElementById("matchResult").disabled = true;

    });

/***************************************************************************
* Matches content
**************************************************************************/

    $( "#addMatch-form" ).submit(function(e) {
        var LEAGUEID = document.getElementById('matchLeaguePicker').value;
        var MATCHSTATUSID = document.getElementById('matchStatusPicker').value;
        var HOSTID = document.getElementById('matchHostPicker').value;
        var GUESTID = document.getElementById('matchGuestPicker').value;
        var RESULT = document.getElementById('matchResult').value;
        var SEASON = document.getElementById('matchSeason').value;
        var DATE = document.getElementById('matchDate').value;
        var TIME = document.getElementById('matchHour').value;
        
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/match/addMatch.php",
            data: {
                league_id : LEAGUEID,
                status_id : MATCHSTATUSID,
                host_id : HOSTID,
                guest_id : GUESTID,
                result : RESULT,
                season : SEASON,
                date : DATE,
                time : TIME
            }
        }).done(function (msg) {
            var result = jQuery.parseJSON(msg);
            if(result !== false) {
                alert('Pomyślnie dodano spotkanie');
            } else {
                alert('Wystąpił błąd, spróbuj później');
            }
        });

        $( "#addMatchBtn" ).click();
        e.preventDefault();
    });
   
    
    $(document).on("click", ".editMatch", function () {
        var MATCHID = $('th:first', $(this).parents('tr')).text();

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/match/getMatchById.php",
            data: {matchId: MATCHID}
        }).done(function (msg) {
            var matchData = jQuery.parseJSON(msg);

            $("#editMatchForm #matchId_edit").val(matchData.id);
            $("#editMatchForm #matchLeagueId_edit").val(matchData.league_id);
            $("#editMatchForm #matchHostId_edit").val(matchData.host_id);
            $("#editMatchForm #matchGuestId_edit").val(matchData.guest_id);
            $("#editMatchForm #matchLeague_edit").val(matchData.league_name);
            $("#editMatchForm #matchHost_edit").val(matchData.host_name);
            $("#editMatchForm #matchGuest_edit").val(matchData.guest_name);
            $("#editMatchForm #matchStatusPicker_edit").val(matchData.status_id);
            $("#editMatchForm #matchResult_edit").val(matchData.result);
            $("#editMatchForm #matchDate_edit").val(matchData.date);
            $("#editMatchForm #matchSeason_edit").val(matchData.season);
            $("#editMatchForm #matchHour_edit").val(matchData.hour);

            $("#editMatchModal").modal({
                show: true
            });
        });
    });
    
    $( "#editMatchForm" ).submit(function(e) {
        var ID = document.getElementById('matchId_edit').value;
        var LEAGUEID = document.getElementById('matchLeagueId_edit').value;
        var HOSTID = document.getElementById('matchHostId_edit').value;
        var GUESTID = document.getElementById('matchGuestId_edit').value;
        var MATCHSTATUSID = document.getElementById('matchStatusPicker_edit').value;
        var RESULT = document.getElementById('matchResult_edit').value;
        var SEASON = document.getElementById('matchSeason_edit').value;
        var DATE = document.getElementById('matchDate_edit').value;
        var TIME = document.getElementById('matchHour_edit').value;
        
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/match/editMatch.php",
            data: {
                id : ID,
                league_id : LEAGUEID,
                host_id : HOSTID,
                guest_id : GUESTID,
                status_id : MATCHSTATUSID,
                result : RESULT,
                season : SEASON,
                date : DATE,
                time : TIME
            }
        }).done(function (msg) {
            alert(msg);
        });
        $("#editMatchModal").modal('toggle');
        e.preventDefault();
    });
    
    $(document).on("click", ".deleteMatch", function () {
        var MATCHID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/match/deleteMatch.php",
            data: {id: MATCHID}
        }).done(function (msg) {
            var result = jQuery.parseJSON(msg);
            if (result === true) {
                THIS.parents("tr").remove();
            } else {
                alert("Nie udało się usunąć spotkania, spróbuj później!");
            }
        });
    });
    

/*******************************************************************************
* Articles submenu
******************************************************************************/

    $("#allArticlesBtn").click(function (e) {
        $('#articlesTableContent').html('');

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/article/getAllArticles.php"
        }).done(function (msg) {
            $('#articlesTableContent').html(msg);
        });
    });

    $("#myArticlesBtn").click(function (e) {
        $('#myArticlesTableContent').html('');

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/article/getMyArticles.php"
        }).done(function (msg) {
            $('#myArticlesTableContent').html(msg);
        });
    });

    $("#addArticleBtn").click(function (e) {
        $('#articleLeaguePicker').html('');

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/league/getAllLeagues_picker.php"
        }).done(function (msg) {
            $('#articleLeaguePicker').html(msg);
        });
        
    });

/*******************************************************************************
* Articles content
******************************************************************************/

    $("#addArticleForm").submit(function (e) {
        var TITLE = document.getElementById("titleInput").value;
        var LEAGUEID = document.getElementById("articleLeaguePicker").value;
        var CONTENT = document.getElementById("contentInput").value;

        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/article/addArticle.php",
            data: {
                title: TITLE,
                leagueId: LEAGUEID,
                content: CONTENT
            }
        }).done(function (msg) {
            var data = jQuery.parseJSON(msg);
            if (data === true) {
                alert("Pomyślnie dodano artykuł!");
            } else {
                alert(msg);
            }
        });

        e.preventDefault();
    });

    $(document).on("click", ".deleteArticle", function () {
        var ARTICLEID = $('th:first', $(this).parents('tr')).text();
        var THIS = $(this);
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/article/deleteArticle.php",
            data: {articleId: ARTICLEID}
        }).done(function (msg) {
            var result = jQuery.parseJSON(msg);
            if (result === true) {
                THIS.parents("tr").remove();
            } else {
                alert("Nie udało się usunąć artykułu, spróbuj później!");
            }
        });
    });

    $(document).on("click", ".editArticle", function () {
        var ARTICLEID = $('th:first', $(this).parents('tr')).text();

        $.ajax({
            method: "GET",
            url: "../functions/admin_panel/article/getArticleById.php",
            data: {articleId: ARTICLEID}
        }).done(function (msg) {
            var articleData = jQuery.parseJSON(msg);

            $('#articleLeague_edit').html('');
            $.ajax({
                method: "GET",
                url: "../functions/admin_panel/league/getAllLeagues_picker.php"
            }).done(function (picker) {
                $('#articleLeague_edit').html(picker);
            });

            $("#editArticleForm #articleId_edit").val(articleData.id);
            $("#editArticleForm #authorId_edit").val(articleData.author_id);
            $("#editArticleForm #articleTitle_edit").val(articleData.title);
            $("#editArticleForm #articleLeague_edit").val(articleData.league);
            $("#editArticleForm #articleContent_edit").val(articleData.content);
            $("#editArticleForm #articleAuthor_edit").val(articleData.author_name);
            $("#editArticleForm #articleDate_edit").val(articleData.date);

            $("#editArticleModal").modal({
                show: true
            });
        });
    });
    
    /* Start function */
    $("#usersBtn").click();

});


function show(id) {
    $('.collapse').removeClass('show');
    $(id).addClass('show');
}

function changeLeague() {
    var LEAGUEID = $("#matchLeaguePicker").val();
    $.ajax({
        method: "GET",
        url: "../functions/admin_panel/team/getAllByLeague_picker.php",
        data: { leagueId: LEAGUEID }
    }).done( function(msg) {
        $("#matchHostPicker").html(msg); 
        $("#matchGuestPicker").html(msg);
    });
}

function chagneStatus() {
    var STATUSID = $("#matchStatusPicker").val();
    
    if(STATUSID == 1) {
        document.getElementById("matchResult").disabled = true;
    } else {
        document.getElementById("matchResult").disabled = false;
    }
}

/*******************************************************************************
 *                              END OF FILE
 ******************************************************************************/