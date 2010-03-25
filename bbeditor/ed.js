/*****************************************/
// Name: Javascript Textarea BBCode Editor
// Version: 1.1
// Author: Balakrishnan
// Last Modified Date: 26/12/2008
// License: Free
// URL: http://www.corpocrat.com
/******************************************/

var textarea;
var content;
function ajaxFileUpload(uploadImage)
{
    var ajaxUrl='doajaxfileupload.php?image=0';
    var ajaxFileToUpload ='fileToUpload';
    if(uploadImage){
        ajaxUrl='doajaxfileupload.php?image=1';
        ajaxFileToUpload = 'imageToUpload';
    }
    $("#loading")
    .ajaxStart(function(){
        $(this).show();
       
    })
    .ajaxComplete(function(){
        $(this).hide();
        $("#fileToUploadArea").hide();
        $("#imageToUploadArea").hide();
    });

    $.ajaxFileUpload
    (
    {
        url: ajaxUrl,
        secureuri:false,
        fileElementId:ajaxFileToUpload,
        dataType: 'text',
        success: function (data, status)
        {
            if(typeof(data.error) != 'undefined')
            {
                if(data.error != '')
                {
                    alert(data.error);
                }else
                {
                    alert(data.msg);
                }
            }
            else{
                var lastChar= data.indexOf('}');
                var text=data.substr(0, lastChar);
                var arr=text.split("#");
                var submitError=arr[0];
                var message=arr[1];
                if(submitError){
                    alert(submitError);
                }else if(message){
                    if(uploadImage){
                        doImage(message);
                    }else{
                        var splited = message.split("/");
                        var description=splited[splited.length-1];
                        doURL(message, description);
                    }

                }
            }
        },
        error: function (data, status, e)
        {
            alert(e);
        }
    }
    )
		
    return false;

}

function showUploadForm(){
    $("#imageToUploadArea").show();
    $("#fileToUploadArea").hide();
}

function showFileUploadForm(){
    $("#imageToUploadArea").hide();
    $("#fileToUploadArea").show();
}

function Init(obj,width,height, val) {
   
    document.write("<img class=\"button\" src=\"bbeditor/images/bold.gif\" name=\"btnBold\" onClick=\"doAddTags('[b]','[/b]')\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/italic.gif\" name=\"btnItalic\" onClick=\"doAddTags('[i]','[/i]')\">"); 
    document.write("<img class=\"button\" src=\"bbeditor/images/underline.gif\" name=\"btnUnderline\" onClick=\"doAddTags('[u]','[/u]')\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/link.gif\" name=\"btnLink\" onClick=\"doURL()\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/picture.gif\" name=\"btnPicture\" onClick=\"showUploadForm()\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/quote.gif\" name=\"btnQuote\" onClick=\"doAddTags('[quote]','[/quote]')\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/code.gif\" name=\"btnCode\" onClick=\"doAddTags('[code]','[/code]')\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/file.png\" name=\"btnFile\" onClick=\"showFileUploadForm()\">");
    document.write("<img class=\"button\" src=\"bbeditor/images/enter.png\" name=\"btnEnter\" onClick=\"doAddTags('[br]','')\">");
    document.write("<div id=\"loading\">");
    document.write("<img src=\"graphics/loading.gif\" />");
    document.write("</div>");
    document.write("<br/>");
    document.write("<div id=\"fileToUploadArea\">");
    document.write("<input id=\"fileToUpload\" type=\"file\" name=\"fileToUpload\" class=\"input\"><br/>");
    document.write("<button class=\"fileButton\" id=\"buttonFileUpload\" onclick=\"return ajaxFileUpload(false);\">Zapisz plik</button>");
    document.write("</div>");
    document.write("<div id=\"imageToUploadArea\">");
    document.write("<input id=\"imageToUpload\" type=\"file\" name=\"imageToUpload\" class=\"input\"><br/>");
    document.write("<button class=\"imageButton\" id=\"buttonImageUpload\" onclick=\"return ajaxFileUpload(true);\">Zapisz zdjęcie</button>");
    document.write("</div>");

    document.write("<textarea id=\""+ obj +"\" name = \"" + obj + "\" cols=\"" + width + "\" rows=\"" + height + "\"></textarea>");
	
    textarea = document.getElementById(obj);
    textarea.value = val;
}

function doImage(url)
{

    //    var url = prompt('Enter the Image URL:','http://');
    var scrollTop = textarea.scrollTop;
    var scrollLeft = textarea.scrollLeft;

    if (document.selection)
    {
        textarea.focus();
        var sel = document.selection.createRange();
        sel.text = '[img]' + url + '[/img]';
    }
    else
    {
        var len = textarea.value.length;
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
		
        var sel = textarea.value.substring(start, end);
        //alert(sel);
        var rep = '[img]' + url + '[/img]';
        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
		
			
        textarea.scrollTop = scrollTop;
        textarea.scrollLeft = scrollLeft;
    }

}

function doURL(url, description)
{
    if(!url){
        url = prompt('Wprowadź adres:','http://');
        if(!url){
            return;
        }
    }
    var scrollTop = textarea.scrollTop;
    var scrollLeft = textarea.scrollLeft;

    if (document.selection)
    {
        textarea.focus();
        var sel = document.selection.createRange();
				
        if(sel.text==""){
            sel.text = '[url]'  + url + '[/url]';
        } else {
            sel.text = '[url=' + url + ']' + sel.text + '[/url]';
        }

    //alert(sel.text);
				
    }
    else
    {
        var len = textarea.value.length;
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;

        if(description==null){
            description= textarea.value.substring(start, end);
        }

		
        if(description==""){
            var rep = '[url]' + url + '[/url]';
        } else
{
            var rep = '[url=' + url + ']' + description + '[/url]';
        }
        //alert(sel);
		
        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
		
			
        textarea.scrollTop = scrollTop;
        textarea.scrollLeft = scrollLeft;
    }
}

function doAddTags(tag1,tag2)
{

    // Code for IE
    if (document.selection)
    {
        textarea.focus();
        var sel = document.selection.createRange();
        //alert(sel.text);
        sel.text = tag1 + sel.text + tag2;
    }
    else
    {  // Code for Mozilla Firefox
        var len = textarea.value.length;
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
		
		
        var scrollTop = textarea.scrollTop;
        var scrollLeft = textarea.scrollLeft;

		
        var sel = textarea.value.substring(start, end);
        //alert(sel);
        var rep = tag1 + sel + tag2;
        textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end,len);
		
        textarea.scrollTop = scrollTop;
        textarea.scrollLeft = scrollLeft;
		
		
    }
}

function setCursorPosition(oInput,oStart,oEnd) {
    if( oInput.setSelectionRange ) {
        oInput.setSelectionRange(oStart,oEnd);
    }
    else if( oInput.createTextRange ) {
        var range = oInput.createTextRange();
        range.collapse(true);
        range.moveEnd('character',oEnd);
        range.moveStart('character',oStart);
        range.select();
    }
}
