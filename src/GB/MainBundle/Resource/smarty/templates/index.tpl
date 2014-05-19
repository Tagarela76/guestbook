<html>
    <head>
        <title>{$title}</title>
        {foreach from=$jsSources item=jsSource}
            <script type="text/javascript" src="../src/GB/MainBundle/Resource/js/{$jsSource}"></script>
        {/foreach}

        {foreach from=$cssSources item=cssSource}
            <link href="../src/GB/MainBundle/Resource/css/{$cssSource}" rel="stylesheet" type="text/css"/>
        {/foreach}
    </head>
    <body>
        {include file={$tpl}}
    </body>
</html>
