
function MessageDialog()
{
    this.divId = 'sendMessageContainer';
	this.isLoaded = false;
    
    this.iniDialog = function(divId) {
		divId = typeof divId !== 'undefined' ? divId : this.divId;
		if(divId != this.divId) {
			this.divId = divId;
		}

		var that = this;
		$("#"+divId).dialog({
			width: 400,
			height: 350,
			autoOpen: false,
			resizable: true,
			dragable: true,
			modal: true,
			buttons: {
				'Cancel': function() {
					$(this).dialog('close');
					that.isLoaded = false;
				},
				'Save': function() {
					that.save();
				}
			}
		});
	}
    
    this.openDialog = function() {
		$('#'+this.divId).dialog('open');
		if(!this.isLoaded) {
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
			success: function (response) {
				$("#"+that.divId).html(response);
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
        
		$.ajax({
			url: "index.php/saveMessage",
			data: {
                messageDialogText: that.messageDialogText,
                messageDialogHomePage: that.messageDialogHomePage,
                messageDialogUserName: that.messageDialogUserName,
                messageDialogEmail: that.messageDialogEmail
            },
			type: "GET",
			dataType: "json",
			success: function (response) {console.log(response);
				if(response.messageId != false){
                    //Saving was successful
                    //add new message on display
                    var html = '';

                    html+='<tr>';
                    html+=  '<td>';
                    html+=      response.messageId;
                    html+=  '</td>';
                    html+=  '<td>';
                    html+=      that.messageDialogUserName;
                    html+=  '</td>'
                    html+=  '<td>';
                    html+=      that.messageDialogEmail;
                    html+=  '</td>'
                    html+=  '<td>';
                    html+=      that.messageDialogHomePage;
                    html+=  '</td>'
                    html+=  '<td>';
                    html+=      that.messageDialogText;
                    html+=  '</td>'
                    html+='</tr>';

                    $('#messageTable tbody tr:first').after(html);
				    $("#"+that.divId).dialog('close');
				    that.divId.isLoaded = false;
                }else{
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
