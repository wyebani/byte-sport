<div class="container"> 
    {include file="header.tpl"}
<script src="javascript/selected_league.js" async></script>
    {if !empty($smarty.session.isLogin)}
        {if $smarty.session.permissions eq 1}
            {include file="menu-admin.tpl"}
        {else $smarty.session.permissions eq 0}
            {include file="menu.tpl"}
        {/if}
    {else}
        {include file="notlogged-menu.tpl"}
    {/if}

    {include file="navbar.tpl"}

  <div class="container">
      <div id="main" style="text-align: center">
    <div class="row">
         <div class="col" style="border-right: 1px solid" >
                     <article id="First" style="font-size: 12px">
                         <div class="row">
                             <div class="col-2" id="Firstimage">
                                
                             </div>
                             <div class="col-9">
                                 <div id="Firstdescription" style="border-bottom: solid red 1px"  >
                                     <h1 id="Firsth1"></h1>
                                     
                                 </div>
                             </div>
                         </div>

                     </article>
             
                    <article id="Second" style="font-size: 12px">
                             <div class="row">
                             <div class="col-2" id="Secondimage">
                                
                             </div>
                             <div class="col-9">
                                 <div id="Seconddescription" style="border-bottom: solid red 1px"  >
                                     <h1 id="Secodh1"></h1>
                                     
                                 </div>
                             </div>
                         </div>
                     </article>
             
                    <article id="Third" style="font-size: 12px">
                             <div class="row">
                             <div class="col-2" id="Thirdimage">
                                
                             </div>
                             <div class="col-9">
                                 <div id="Thirddescription" style="border-bottom: solid red 1px"  >
                                     <div id="Thirdh1"></div>
                                     
                                 </div>
                             </div>
                         </div>
                     </article>
             <button type="button" id="next" style="margin-top: 5px" class="btn btn-primary">Następne</button>
    <button type="button" id="previous" style="margin-top: 5px" class="btn btn-primary">Poprzednie</button>
         </div>
      
        <div class="col">
            <div id="table_league">
                
            </div>
        </div>
   
     </div>
          </div>
</div>
    {include file="footer.tpl"}
</div>
