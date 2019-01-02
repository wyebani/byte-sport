$("document").ready(function () {
    var iterator = 0;
    var arrayarticle = ["First", "Second", "Third"];
    var numberofarticles = new Array();
     start();
    
    //flags
        document.getElementById("poland").onclick = function (){openwindow("Ekstraklasa");}
        document.getElementById("germany").onclick = function (){openwindow("Bundesliga");}
        document.getElementById("spain").onclick = function (){openwindow("LaLiga");}
        document.getElementById("portugal").onclick = function (){openwindow("Portugalska");}
        document.getElementById("italy").onclick = function (){openwindow("Seria_A");}
        document.getElementById("brazil").onclick = function (){openwindow("Brazylijska");}
        document.getElementById("england").onclick = function (){openwindow("Angielska");}
    //function
    function start()
        {
            
             id_numbers = new Array();
             var geturl = getUrlVars()["league"];//return _$GET from ?league=
             
             
        $.ajax({
            method: "GET",
            url: "php/functions/articles_main/GetAllArticlesFromSelectedLeague.php?league="+geturl,
            
            success: function (data) {

                id_numbers = JSON.parse(data);
                
                getarray(id_numbers);
            }
        });
        
        }
         function getoneArticles(article) {

        if (iterator >= numberofarticles.length)
        {
            $('#' + arrayarticle[article]).html('');
            iterator = iterator + 1;

        } else {
         
           $('#' + arrayarticle[article]+"description").html("");
          
            
                    
                $('#' + arrayarticle[article]+"description").html("<h1>"+numberofarticles[iterator].TITLE+"</h1>"+numberofarticles[iterator].CONTENT);
             
        iterator = iterator + 1;

    }
         }
    function getarray(number) {
        numberofarticles = number;
       
        ChangeContentOfArticle();
    }
    function ChangeContentOfArticle()
    {


        for (var i = 0; i < 3; i++)
        {
            getoneArticles(i);

        }
    }
    function openwindow(leaguename)
        {
        
         myWindow = window.open("selected_league.php?league="+leaguename);   // Opens a new window
         
        }
         document.getElementById("next").onclick = function ()
    {
        if (iterator < numberofarticles.length)
            ChangeContentOfArticle(numberofarticles);




    };
    document.getElementById("previous").onclick = function ()
    {

        if (iterator >= 6)
        {
            iterator = iterator - 6;
            ChangeContentOfArticle(numberofarticles);
        }

    };
       function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}
    
        
});





