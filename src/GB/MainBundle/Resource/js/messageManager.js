
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

    this.preview = function() {
        this.messageDialogUserName = $('#messageDialogUserName').val();
        this.messageDialogEmail = $('#messageDialogEmail').val();
        this.messageDialogHomePage = $('#messageDialogHomePage').val();
        this.messageDialogText = $('#messageDialogText').val();
        this.url = 'index.php/Preview?messageDialogUserName='+this.messageDialogUserName
        this.url += '&messageDialogEmail='+this.messageDialogEmail;
        this.url += '&messageDialogHomePage='+this.messageDialogHomePage;
        this.url += '&messageDialogText='+this.messageDialogText;
        window.open(this.url, 'Preview', "height=400,width=600");
    }
    this.save = function() {
        this.messageDialogUserName = $('#messageDialogUserName').val();
        this.messageDialogEmail = $('#messageDialogEmail').val();
        this.messageDialogHomePage = $('#messageDialogHomePage').val();
        this.messageDialogText = $('#messageDialogText').val();
        var that = this;
        var validation = true;
        var message = '';
        //create Form Data
        var data = new FormData()

        //get all files from document
        var filesList = $('input[type=file]');
        //checkFile
        for(var i=0;i < filesList.length-1; i++){
            if(!that.validateFileType(filesList[i])){
                //file type error
                validation = false;
                message += ''+filesList[i].files[0].name+' invalid file type. Allowable gif/jpeg/bmp\n';
            };
            if(!that.validateFileMaxSize(filesList[i])){
                //file max size error
                validation = false;
                message += ''+filesList[i].files[0].name+' file size exceeded. Allowable size 1 MB\n';
            }
        }
        if (validation) {
            var files = [];
            //set files
            for (var i = 0; i < filesList.length - 1; i++) {
                data.append(i, filesList[i].files[0]);
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
                success: function (response) {console.log(response);
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
        }else{
            alert(message);
        }
    }

    this.validateFileType = function (file) {
        this.imageType = ['image/jpeg', 'image/bmp', 'image/gif'];
        var that = this;
        if (that.inArray(this.imageType, file.files[0].type)) {
            return true;
        }
        return false;
    }

    this.validateFileMaxSize = function (file) {
        if (file.files[0].size<1000000) {
            return true;
        }
        return false;
    }


    this.inArray = function(arr, obj) {
        for(var i=0; i<arr.length; i++) {
            if (arr[i] == obj) {
                return true;
            }
        }
        return false;
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
