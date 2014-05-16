<html>
    <head>
        <title>{$title}</title>
        {foreach from=$jsSources item=jsSource}
            <script type="text/javascript" src="{$jsSource}"></script>
        {/foreach}

        {foreach from=$cssSources item=cssSource}
            <link href="{$cssSource}" rel="stylesheet" type="text/css"/>
        {/foreach}
    </head>
    <body>
        {include file={$tpl}}
    </body>
</html>
