<h1>Guestbook</h1>
<div>
    <input type='button' value="Send Message" onclick="messageManagerPage.messageDialog.openDialog();">
</div>
<div>
    <table class="table table-condensed" id="messageTable">
        <tr id="messageTableHead">
            <th>
                <a href="index.php?page={$currentPage}&sort=id&order={$order}">Id</a>
            </th>
            <th>
                <a href="index.php?page={$currentPage}&sort=userName&order={$order}">User Name</a>
            </th>
            <th>
                <a href="index.php?page={$currentPage}&sort=email&order={$order}">User Email</a>
            </th>
            <th>
                Home Page
            </th>
            <th>
                Message
            </th>
            <th>
                <a href="index.php?page={$currentPage}&sort=creationDate&order={$order}">Creation Date</a>
            </th>
        <tr>
        {foreach from=$messageArray item=message}
            <tr>
                <td>
                    {$message->getId()}
                </td>
                <td>
                    {$message->getUserName()}
                </td>
                <td>
                    {$message->getEmail()}
                </td>
                <td>
                    {$message->getHomePage()}
                </td>
                <td>
                    {$message->getText()}
                </td>
                <td>
                    {$message->getFormatCreationDate()}
                </td>
            </tr>
        {/foreach}
    </table>
</div>
<div id="sendMessageContainer" title="Send Message" style="display:none;">Loading ...</div>


{foreach from=$pages item=page}
    {if $page==false}
        <a href="#">current</a>
    {else}
        <a href="index.php?page={$page}">{$page}</a>
    {/if}
{/foreach}