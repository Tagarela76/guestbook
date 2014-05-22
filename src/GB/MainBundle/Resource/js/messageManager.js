
function MessageDialog()
{
    this.divId = 'sendMessageContainer';
    this.isLoaded = false;

    this.iniDialog = function(divId) {
        divId = typeof divId !== 'undefined' ? divId : this.divId;
        if (divId != this.divId) {
            this.divId = divId;
        }

        var that = this;
        jQuery("#" + divId).dialog({
            width: 750,
            height: 650,
            autoOpen: false,
            resizable: true,
            dragable: true,
            modal: true,
            buttons: {
                'Cancel': function() {
                    jQuery(this).dialog('close');
                    that.isLoaded = false;
                },
                'Save': function() {
                    that.save();
                },
                'Preview': function() {
                    that.preview();
                }
            }
        });
    }

    this.openDialog = function() {
        jQuery('#' + this.divId).dialog('open');
        if (!this.isLoaded) {
            this.loadContent();
        }
        return false;
    }

    this.loadContent = function() {
        var that = this;
        $.ajax({
            url: "index.php/getMessageDialogContent",
            data: {},
            type: "GET",
            dataType: "html",
            success: function(response) {
                jQuery("#" + that.divId).html(response);
                that.isLoaded = true;
            }
        });
    }

    this.save = function() {
        this.messageDialogUserName = $('#messageDialogUserName').val();
        this.messageDialogEmail = $('#messageDialogEmail').val();
        this.messageDialogHomePage = $('#messageDialogHomePage').val();
        this.messageDialogText = $('#messageDialogText').val();
        var that = this;
        var fileSelect = $('#file_upload')[0];
        //console.log(fileSelect);
        var files = fileSelect.files;

    var files = [];
        var filesList = $('input[type=file]');
        console.log(filesList[0]);
        for(var i=0;i < filesList.length-1; i++){
            files=files.concat(filesList[i].files[0]);

        }

        console.log(files);

        var data = new FormData();
        /*for (var i = 0; i < files.length; i++) {
            var file = files[i];

            // Check the file type.
            if (!file.type.match('image.*')) {
                continue;
            }

            // Add the file to the request.
            data.append('image[]', file, file.name);
        }*/
        for (var i = 0; i < files.length; i++) {
            $.each(files[i], function(key, value)
            {
                data.append(key, value);
            });
            data.append('image[]', file, file.name);
        }
        data.append('messageDialogText', this.messageDialogText);
        data.append('messageDialogHomePage', this.messageDialogHomePage);
        data.append('messageDialogUserName', this.messageDialogUserName);
        data.append('messageDialogEmail', this.messageDialogEmail);

        $.ajax({
            url: "index.php/saveMessage",
            data: data,
            type: "POST",
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(response) {
                if (response.messageId != false) {
                    //Saving was successful
                    //add new message on display
                    var html = '';

                    html += '<tr>';
                    html += '<td>';
                    html += response.messageId;
                    html += '</td>';
                    html += '<td>';
                    html += that.messageDialogUserName;
                    html += '</td>'
                    html += '<td>';
                    html += that.messageDialogEmail;
                    html += '</td>'
                    html += '<td>';
                    html += that.messageDialogHomePage;
                    html += '</td>'
                    html += '<td>';
                    html += that.messageDialogText;
                    html += '</td>'
                    html += '</tr>';

                    $('#messageTable tbody tr:first').after(html);
                    jQuery("#" + that.divId).dialog('close');
                    that.divId.isLoaded = false;
                } else {
                    //delete old errors
                    $('#userNameError').html();
                    $('#emailError').html();
                    $('#homePageError').html();
                    $('#textError').html();
                    //show validation errors
                    $('#userNameError').html(response.validateErrors.userName);
                    $('#emailError').html(response.validateErrors.email);
                    $('#homePageError').html(response.validateErrors.homePage);
                    $('#textError').html(response.validateErrors.text);
                }
            }
        });
    }
}


function MessageManagerPage() {
    this.messageDialog = new MessageDialog();
}

//	global object
var messageManagerPage;

$(function() {
    //	ini global object
    messageManagerPage = new MessageManagerPage();
    messageManagerPage.messageDialog.iniDialog();
});
