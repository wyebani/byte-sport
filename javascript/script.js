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
            $('#' + arrayarticle[article]).html('');

        } else {
            $('#' + arrayarticle[article]).html('');
            $.ajax({
                method: "POST",
                url: "php/functions/articles_main/GetOneArticle.php",
                data: {id: numberofarticles[iterator]}

            }).done(function (msg)
            {

                $('#' + arrayarticle[article]).html(msg);

            });


        }
        iterator = iterator + 1;

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
});





