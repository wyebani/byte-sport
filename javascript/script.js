$("document").ready(function(){
   var height_section; 
  var avatar=$("#avatar").height();
  var description=$("#description").height();
    
if(avatar>description){
   $("article").height(avatar+5); 
}
  if(avatar<description)$("article").height(description +5); 
  
    const tab=[];
    for(var i=0;i<5;i++){
        
        tab[i]=$("article:nth-child("+ i+")").height();
    }
    for(var i =0;i<5;i++){
        height_section+=tab[i];
        
    }
     $("section").height(height_section+10);
     
});
    
    
    
    
    



