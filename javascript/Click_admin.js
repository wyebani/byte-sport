window.onload = function() {
  var number=1;//user_menu
  var temporary=1;
  var menu = ["Users", "league", "teams","match", "articles"];
  
  function Click_panel(){
    
  
          for(var i=1;i<=menu.length;i++){
          
          if(i===temporary)  document.getElementById(""+menu[i-1]).style.display = "none";
      }
          document.getElementById(""+menu[number-1]).style.display = "block";
          temporary=number;
          
     
      
      
  }
  
  function _users(){
      number=1;
       Click_panel();
       
  }
  function _league(){
      number=2;
       Click_panel();
  }
   function _teams(){
      number=3;
      Click_panel();
  }
    function _match(){
      number=4;
      Click_panel();
  }
   function _articles(){
      number=5;
      Click_panel();
  }
 
  
  document.getElementById("_Users").onclick = function() {_users()};
  document.getElementById("_league").onclick = function() {_league()};
  document.getElementById("_teams").onclick = function() {_teams()};
  document.getElementById("_match").onclick = function() {_match()};
  document.getElementById("_articles").onclick = function() {_articles()};
  
  
  
};