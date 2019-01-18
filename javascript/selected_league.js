$("document").ready(function () {
    var iterator = 0;
    var arrayArticle = ["First", "Second", "Third"];
    var numOfArticles = new Array();
    
    start();
    getTable();

    //flags
    document.getElementById("poland").onclick = function () {
        openWindow("poland", "Ekstraklasa");
    }
    document.getElementById("germany").onclick = function () {
        openWindow("germany", "Bundesliga");
    }
    document.getElementById("spain").onclick = function () {
        openWindow("spain", "LaLiga");
    }
    document.getElementById("portugal").onclick = function () {
        openWindow("portugal", "Portugalska");
    }
    document.getElementById("italy").onclick = function () {
        openWindow("italy", "Seria_A");
    }
    document.getElementById("brazil").onclick = function () {
        openWindow("brazil", "Brazylijska");
    }
    document.getElementById("england").onclick = function () {
        openWindow("england", "Angielska");
    }
    document.getElementById("france").onclick = function () {
        openWindow("france", "Ligue1");
    }

    function openWindow(country, leagueName) {
        document.getElementById('a' + country).href = "selected_league.php?league=" + leagueName;

    }
    
    //function
    function start() {
        id_numbers = new Array();
        var getUrl = getUrlVars()["league"];

        $.ajax({
            method: "GET",
            url: "php/functions/articles_main/GetAllArticlesFromSelectedLeague.php?league=" + getUrl,
            
        }).done(function(data) {
            id_numbers = JSON.parse(data);
            getArray(id_numbers);
        });

    }
    
    function getOneArticle(article)
    {
        if (iterator >= numOfArticles.length) {
            $('#' + arrayArticle[article] + "image").html("");
            $('#' + arrayArticle[article] + "description").html("");

            iterator = iterator + 1;

        } else {
            $('#' + arrayArticle[article] + "image").html("");
            $('#' + arrayArticle[article] + "description").html("");

            $('#' + arrayArticle[article] + "image").html('<img  src=image/' + numOfArticles[iterator].NAME + '.png width="60" height="60"\n\
            alt="avatar" style ="border : 2px solid black" />');
            $('#' + arrayArticle[article] + "description").html("<h1>" + numOfArticles[iterator].TITLE + "</h1>" + numOfArticles[iterator].CONTENT);

            iterator = iterator + 1;
        }
    }
    
    function getArray(number) {
        numOfArticles = number;
        ChangeContentOfArticle();
    }
    
    function ChangeContentOfArticle() {
        for (var i = 0; i <= 2; i++) {
            getOneArticle(i);
        }
    }
    
    function getTable() {
        var getUrl = getUrlVars()["league"];
        $.ajax({
            method: "GET",
            url: "php/functions/table_league.php?league=" + getUrl,
            success: function (data) {
                $('#teamTableContent').html(data);
            }
        });
    }

    document.getElementById("next").onclick = function ()
    {
        if (iterator < numOfArticles.length)
            ChangeContentOfArticle(numOfArticles);
    };
    
    document.getElementById("previous").onclick = function () {
        if (iterator >= 5)  {
            iterator = iterator - 6;
            ChangeContentOfArticle(numOfArticles);
        }
    };
    
    
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            vars[key] = value;
        });
        return vars;
    }
});





