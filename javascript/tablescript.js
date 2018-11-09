
$("document").ready(function(){
    var box_article=0;
     var avatar=$("#avatar").height();
  var description=$("#description").height();
  var table=$("#table").height();
if(avatar>description){
   $("article").height(avatar); 
}
  if(avatar<description)$("article").height(description ); 
  
  const tab=[];
    for(var i=0;i<5;i++){
        
        tab[i]=$("article:nth-child("+ i+")").height();
    }
    for(var i =0;i<5;i++){
        box_article+=tab[i];
        
    }
     $("#box_article").height(box_article+10);
     
  if($("#box_article").height()>$("#table").height()){
   $("section").height($("#box_article").height()); 
}
  if($("#box_article").height()<$("#table").height())$("section").height($("#table").height()); 
  });