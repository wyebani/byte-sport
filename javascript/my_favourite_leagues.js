$("document").ready(function () {

    var iterator = 0;
    var arrayarticle = ["First", "Second", "Third"];
    var numberofarticles = new Array();
    start();

    function start()
    {
        id_numbers = new Array();

        $.ajax({
            method: "GET",
            url: "php/functions/articles_main/GetAllArticlesFromFavouriteLeagues.php",

            success: function (data) {

                id_numbers = JSON.parse(data);
                
                getarray(id_numbers);
            }
        });
    }
    function getoneArticles(article) {
       
          if (iterator >= numberofarticles.length)
        {
             $('#' + arrayarticle[article]+"description").html("");
              $('#' + arrayarticle[article]+"image").html("");
              
             iterator = iterator + 1;
             

        } 
        else {
            $('#' + arrayarticle[article]+"image").html("");
           $('#' + arrayarticle[article]+"description").html("");
           $('#' + arrayarticle[article]+"image").html('<img  src=image/'+numberofarticles[iterator].NAME+'.png width="60" height="60"\n\
            alt="avatar" style ="border : 2px solid black" />');
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


        for (var i = 0; i <= 2; i++)
        {
            getoneArticles(i);

        }
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

    
    //flags
        document.getElementById("poland").onclick = function (){openwindow("Ekstraklasa");}
        document.getElementById("germany").onclick = function (){openwindow("Bundesliga");}
        document.getElementById("spain").onclick = function (){openwindow("LaLiga");}
        document.getElementById("portugal").onclick = function (){openwindow("Portugalska");}
        document.getElementById("italy").onclick = function (){openwindow("Seria_A");}
        document.getElementById("brazil").onclick = function (){openwindow("Brazylijska");}
        document.getElementById("england").onclick = function (){openwindow("Angielska");}
    
    function openwindow(leaguename){
        
         myWindow = window.open("selected_league.php?league="+leaguename);   // Opens a new window
    }
});





/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


