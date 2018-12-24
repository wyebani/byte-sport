{include file="header.tpl"}

<div id="container">
    
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
                    <div class="col"> 
    <article id="First">
        
      
    </article>
        <article id="Second">
         
    </article>
                        <article id="Third">
                            
                        </article>
                </div>
            </div>	
        </div>
    </div>
    <button type="button" id="next" class="btn btn-success">Następne</button>
    <button type="button" id="previous" class="btn btn-danger">Poprzednie</button>
{include file="footer.tpl"}