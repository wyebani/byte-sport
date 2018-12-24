$("document").ready(function(){
    
    var iterator=1;
    var arrayarticle=["First","Second","Third"];
    var numberofarticles=0;
     start();
       
    
       
   
   function start()
    {
         $.ajax({
            method: "POST",
            url: "../projekt/php/functions/articles_main/GetAllArticles.php"
        }).done(function (msg) {
            
              
         ChangeContentOfArticle(msg);
       });
      
    }
   function getoneArticles(article){
     
        $('#'+arrayarticle[article]).html('');
        $.ajax({
            method: "POST",
            url: "../projekt/php/functions/articles_main/GetOneArticle.php",
            data: {id: iterator}
          
        }).done(function (msg)
                     {
            
             $('#'+arrayarticle[article]).html(msg);
          
                    });
                   
                     iterator=iterator+1;
      
   }
   function ChangeContentOfArticle(number)
        {
           numberofarticles=number;
            for( var i=0; i<3;i++)
            {
                getoneArticles(i);
                
            }
        }
     document.getElementById("next").onclick = function() { ChangeContentOfArticle(numberofarticles); };
      document.getElementById("previous").onclick = function() { if(iterator>3)iterator-=3; };
});
    
    
    
    
    



