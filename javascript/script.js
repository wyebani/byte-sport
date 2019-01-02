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
            url: "php/functions/articles_main/GetAllArticles.php",

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
             iterator = iterator + 1;
             

        } 
        else {
         
           $('#' + arrayarticle[article]+"description").html("");
          $('#' + arrayarticle[article]+"description").html("<h1>"+numberofarticles[iterator].title+"</h1>"+numberofarticles[iterator].content);
        
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

    $("#registerForm").submit(function (e) {
        var USERNAME = $('input[id=ex-username]').val();
        var EMAIL = $('input[id=ex-email]').val();
        var PASSWORD = $('input[id=ex-password]').val();
        var NAME = $('input[id=ex-name]').val();
        var SURNAME = $('input[id=ex-surname]').val();
        var DATE = $('input[id=ex-dateOfBirth]').val();
        
        $.ajax({
            method: "POST",
            url: "php/functions/register.php",
            data: {
                username: USERNAME,
                email: EMAIL,
                password: PASSWORD,
                name: NAME,
                surname: SURNAME,
                date_of_birth: DATE
                  }            
        }).done(function (msg)
        {
            var result = jQuery.parseJSON(msg);
            if(result === true) 
            {
                alert("Rejestracja przebiegła pomyślnie! Poczekaj na aktywację konta!");
            } else 
             {
                alert(result);
             }
         });

        e.preventDefault();
    });
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





