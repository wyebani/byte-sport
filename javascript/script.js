$("document").ready(function(){
   var height_main; 
  var avatar=$("#avatar").height();
  var description=$("#description").height();
if(avatar>description){
   $("article").height(avatar+8); 
}
  if(avatar<description)$("article").height(description +8); 
                   
    for(var i=0;i<5;i++){
       height_main+=$("article:nth-child("+ i+")").height();
    }
   
     $("main").height(height_main+10);
     
     
});
    
    
    
    
    



