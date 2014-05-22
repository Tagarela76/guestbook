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
        <form id="data" action="" enctype="multipart/form-data">
            <fieldset>
                <legend>File Upload</legend>
                <input type="file" id="form_FileUpload" name="form[FileUpload]" required="required">
            </fieldset>
            <input type="submit" name="Upload File"/>
        </form>
    </div>
</div>
<script>
         $("form#data").submit(function() {
             messageManagerPage.messageFile.addFileToMessage();
             //not refresh page
             return false;
        });
</script>