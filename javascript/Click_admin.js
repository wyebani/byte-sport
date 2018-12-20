window.onload = function() {
  var number=0;
  var temporary=0;
  var menu = ["user", "league", "teams","match", "articles"];
  init();
  
  function Click_panel(){
    for(var i=0; i < menu.length; i++){
        if(i === temporary)
            document.getElementById("" + menu[i]).style.display = "none";
    }
    
    document.getElementById("" + menu[number]).style.display = "block";
    temporary=number;     
  }
  function init() {
      _user();
  }
  
  function _user() {
    number=0;
    
    $('#usersList').html('');
    $.ajax({
        method: "GET",
	url: "../functions/admin_panel/user/getAllUsers.php"
    }).done(function (msg) {
        $('#usersList').html(msg);
    });
    
    $('#notActiveUsersList').html('');
    $.ajax({
        method: "GET",
	url: "../functions/admin_panel/user/getAllNotActiveUsers.php"
    }).done(function (msg) {
        $('#notActiveUsersList').html(msg);
    });
    
    Click_panel();
  }
  
  function _addUser() {
      var userName = document.getElementById("textboxUsername").value;
      $.ajax({
          method: "POST",
          url: "../functions/admin_panel/user/addNewUser.php",
          data: {username: userName}
      }).done(function (msg) {
         $('#usersList').html(msg);
      });
  }
  
  function _activateUser() {
      var selectedIndex = document.getElementById("not_active_users_list").selectedIndex;
      
      if(selectedIndex === undefined) {
          alert("Nie wybrano użytkownika!");
          return;
      }
      
      if(selectedIndex > 0) {
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/activateUser.php",
            data: {userId : selectedIndex}
        }).done(function (msg) {
           alert(msg);
        });
      } else {
          alert("Nie wybrano użytkownika z listy!");
      }
  }
  
  function _deleteUser() {
      var selectedIndex = document.getElementById("all_users").selectedIndex;
      
      if(selectedIndex === undefined) {
          alert("Nie wybrano użytkownika!");
          return;
      }
      
      if(selectedIndex > 0) {
        $.ajax({
            method: "POST",
            url: "../functions/admin_panel/user/deleteUser.php",
            data: {userId : selectedIndex}
        }).done(function (msg) {
           alert(msg);
        });
      } else {
          alert("Nie wybrano użytkownika z listy!");
      }
  }
  
  function _league(){
      number=1;
      
      $.ajax({
          method: "GET",
          url: "../functions/admin_panel/league/getAllLeagues.php"
      }).done(function (msg) {
         $('#leaguesList').html(msg); 
      });
      
      Click_panel();
  }
   function _teams(){
      number=2;
      
      $.ajax({
          method: "GET",
          url: "../functions/admin_panel/league/getAllLeagues.php"
      }).done(function (msg) {
         $('#leaguesList_2').html(msg); 
      });
      
      $.ajax({
          method: "GET",
          url: "../functions/admin_panel/team/getAllTeams.php"
      }).done(function (msg) {
         $('#teamsList').html(msg); 
      });
      
      Click_panel();
  }
    function _match(){
      number=3;
      Click_panel();
  }
   function _articles(){
      number=4;
      Click_panel();
  }
  
  function _logout() {
      $.ajax({
          method: "POST",
          url: "../functions/logout.php"
      }).done(function() {
          window.location.href="../../index.php";
      });
  }
 
  // Menu
  document.getElementById("_users").onclick = function() { _user() };
  document.getElementById("_league").onclick = function() { _league() };
  document.getElementById("_teams").onclick = function() { _teams() };
  document.getElementById("_match").onclick = function() { _match() };
  document.getElementById("_articles").onclick = function() { _articles() }; 
  document.getElementById("_logout").onclick = function() { _logout() };
  
  // Users
  document.getElementById("buttonAddUser").onclick = function() { _addUser() };
  document.getElementById("buttonActiveUser").onclick = function() { _activateUser() };
  document.getElementById("buttonDeleteUser").onclick = function() { _deleteUser() };
};