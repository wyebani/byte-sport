$( document ).ready(function() {
   
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
        
        // TO DO
        
        show('leagues');
    });
    
    $( "#teamsBtn" ).click(function() {
        $('.components li').removeClass('active');
        $(this).parent().addClass('active');
        
        // TO DO
        
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
    
});

function show(id) {
    $('.collapse').removeClass('show');
    $(id).addClass('show');
}
