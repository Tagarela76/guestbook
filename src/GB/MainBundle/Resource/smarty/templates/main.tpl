<h1>Guestbook</h1>
<div>
    <input type='button' value="Send Message" onclick="messageManagerPage.messageDialog.openDialog();">
</div>
<div>
    <table class="table table-bordered message-table" id="messageTable">
        <tr id="messageTableHead" class="messageTableHead">
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
            <th>
                Images
            </th>
        <tr>
        {foreach from=$messageArray item=message}
            <tr>
                <td width="2%";>
                    {$message->getId()}
                </td>
                <td width="5%";>
                    {$message->getUserName()}
                </td>
                <td width="8%";>
                    {$message->getEmail()}
                </td>
                <td width="10%";>
                    <a href="{$message->getHomePage()}">{$message->getHomePage()}</a>
                </td>
                <td width="55%";>
                    {$message->getText()}
                </td>
                <td width="10%";>
                    {$message->getFormatCreationDate()}
                </td>
                <td width="10%";>
                    {assign var="imageList" value=$message->getImages()}
                    <ul>
                    {foreach from=$imageList item=image}
                        <li>
                            <a href="/guestbook/uploads/messageImage/{$message->getEmail()}/{$image->getName()}">
                                {$image->getRealName()}
                            </a>
                        </li>
                    {/foreach}
                    </ul>
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