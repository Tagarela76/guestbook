<html>
    <head>
        <title>{$title}</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        {foreach from=$jsSources item=jsSource}
            <script type="text/javascript" src="../src/GB/MainBundle/Resource/js/{$jsSource}"></script>
        {/foreach}
        <script>
            $.noConflict();
            src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"
        </script>
        {foreach from=$cssSources item=cssSource}
            <link href="../src/GB/MainBundle/Resource/css/{$cssSource}" rel="stylesheet" type="text/css"/>
        {/foreach}
    </head>
    <body>
        {include file={$tpl}}
    </body>
</html>
