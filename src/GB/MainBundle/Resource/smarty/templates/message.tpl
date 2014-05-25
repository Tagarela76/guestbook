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
        <a href="{$message->getHomePage()}">{$message->getHomePage()}</a>
    </td>
    <td>
        {$message->getText()}
    </td>
    <td>
        {$message->getFormatCreationDate()}
    </td>
    <td>
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