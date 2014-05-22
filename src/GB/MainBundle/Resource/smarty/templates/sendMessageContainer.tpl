<script src='../src/GB/MainBundle/Resource/js/jquery.MultiFile.js' type="text/javascript" language="javascript"></script>

<div>
    <div class="container">
        <input type='text' value="" placeholder="User Name" id='messageDialogUserName'>

        <div id="userNameError" class="validation-error"></div>
    </div>
    <div class="container">
        <input type='text' value="" placeholder="Email" id='messageDialogEmail'>

        <div id="emailError" class="validation-error"></div>
    </div>
    <div class="container">
        <input type='text' value="" placeholder="Homepage" id='messageDialogHomePage'>

        <div id="homePageError" class="validation-error"></div>
    </div>
    <div class="container">
        <textarea type='text' value="" placeholder="Text" id='messageDialogText' class="message-dialog-text"></textarea>

        <div id="textError" class="validation-error"></div>
    </div>
    <div>
        <form action="#" enctype="multipart/form-data" method="post" id="ololo">
            <label for="file_upload">File:</label>
            <input type="file" name="file_upload" id="file_upload" multiple class="multi">
        </form>
    </div>
</div>
