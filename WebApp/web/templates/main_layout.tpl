{include file="header.tpl"}
{if isset($response->redirectedNoResults) && $response->redirectedNoResults==1}
    <div style="text-align:center;margin-top:10px;" align="center">
        <font style="color:red;"><b>No results found for your search criteria. These are upcoming events</b></font>
    </div>
    <div id="main-content-with-error">
{else}
    <div id="main-content">
{/if}

    {$MAIN_CONTENT}
</div>
{include file="footer.tpl"}
