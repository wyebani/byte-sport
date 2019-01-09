$("document").ready(function () {
    var iterator = 0;
    var arrayarticle = ["First", "Second", "Third"];
    var numberofarticles = new Array();
     start();
     gettable();
    
   //flags
        document.getElementById("poland").onclick = function (){openwindow("poland","Ekstraklasa");}
        document.getElementById("germany").onclick = function (){openwindow("germany","Bundesliga");}
        document.getElementById("spain").onclick = function (){openwindow("spain","LaLiga");}
        document.getElementById("portugal").onclick = function (){openwindow("portugal","Portugalska");}
        document.getElementById("italy").onclick = function (){openwindow("italy","Seria_A");}
        document.getElementById("brazil").onclick = function (){openwindow("brazil","Brazylijska");}
        document.getElementById("england").onclick = function (){openwindow("england","Angielska");}
        document.getElementById("france").onclick = function (){openwindow("france","Ligue1");}
        
    function openwindow(country,leaguename){
        //alert('lala');
        //myWindow = window.open("selected_league.php?league="+leaguename);   // Opens a new window
          document.getElementById('a'+country).href="selected_league.php?league="+leaguename;
            
    }
    //function
    function start()
        {
            
             id_numbers = new Array();
             var geturl = getUrlVars()["league"];//return _$GET from ?league=
             
             
        $.ajax({
            method: "GET",
            url: "php/functions/articles_main/GetAllArticlesFromSelectedLeague.php?league="+geturl,
            
            success: function (data) 
            {

                id_numbers = JSON.parse(data);
                
                getarray(id_numbers);
            }
                 });
        
        }
         function getoneArticles(article) 
          {
             
        if (iterator >= numberofarticles.length)
        {
           $('#' + arrayarticle[article]+"image").html("");
           $('#' + arrayarticle[article]+"description").html("");
           
            iterator = iterator + 1;
              
        } else 
               {
                 $('#' + arrayarticle[article]+"image").html("");
                 $('#' + arrayarticle[article]+"description").html("");
          
            
                  $('#' + arrayarticle[article]+"image").html('<img  src=image/'+numberofarticles[iterator].NAME+'.png width="60" height="60"\n\
            alt="avatar" style ="border : 2px solid black" />');  
                 $('#' + arrayarticle[article]+"description").html("<h1>"+numberofarticles[iterator].TITLE+"</h1>"+numberofarticles[iterator].CONTENT);
             
                iterator = iterator + 1;

               }   
          }
    function getarray(number) 
         {
        numberofarticles = number;
        
       ChangeContentOfArticle();
        
         }
    function ChangeContentOfArticle()
    {


        for (var i = 0; i <=2; i++)
        {
            getoneArticles(i);

        }
    }
    function gettable(){
        var geturl = getUrlVars()["league"];//return _$GET from ?league=
        $.ajax({
            method: "GET",
            url: "php/functions/table_league.php?league="+geturl,
            
            success: function (data) 
            {
                
                 $('#teamTableContent').html(data);
                
                
               
            }
            
                 });
        
    }
   
         document.getElementById("next").onclick = function ()
    {
        if (iterator < numberofarticles.length)
            ChangeContentOfArticle(numberofarticles);




    };
    document.getElementById("previous").onclick = function ()
    {

        if (iterator >= 5)
        {
            iterator = iterator - 6;
            ChangeContentOfArticle(numberofarticles);
        }

    };
       function getUrlVars()
{
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value)
         {
            vars[key] = value;
         });
    return vars;
}
    
        
});





