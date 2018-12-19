window.onload = function() {
  var number=0;
  var temporary=0;
  var menu = ["user", "league", "teams","match", "articles"];
  
  function Click_panel(){
    for(var i=0; i < menu.length; i++){
        if(i === temporary)
            document.getElementById("" + menu[i]).style.display = "none";
    }
    
    document.getElementById("" + menu[number]).style.display = "block";
    temporary=number;     
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
    
    Click_panel();
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
 
  
  document.getElementById("_users").onclick = function() { _user() };
  document.getElementById("_league").onclick = function() { _league() };
  document.getElementById("_teams").onclick = function() { _teams() };
  document.getElementById("_match").onclick = function() { _match() };
  document.getElementById("_articles").onclick = function() { _articles() }; 
};