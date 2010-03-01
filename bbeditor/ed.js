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
document.write("<link href=\"bbeditor/styles.css\" rel=\"stylesheet\" type=\"text/css\">");


function Init(obj,width,height, val) {
   
	document.write("<img class=\"button\" src=\"bbeditor/images/bold.gif\" name=\"btnBold\" onClick=\"doAddTags('[b]','[/b]')\">"); 
    document.write("<img class=\"button\" src=\"bbeditor/images/italic.gif\" name=\"btnItalic\" onClick=\"doAddTags('[i]','[/i]')\">"); 
	document.write("<img class=\"button\" src=\"bbeditor/images/underline.gif\" name=\"btnUnderline\" onClick=\"doAddTags('[u]','[/u]')\">"); 
	document.write("<img class=\"button\" src=\"bbeditor/images/link.gif\" name=\"btnLink\" onClick=\"doURL()\">");
	document.write("<img class=\"button\" src=\"bbeditor/images/picture.gif\" name=\"btnPicture\" onClick=\"doImage()\">");
	document.write("<img class=\"button\" src=\"bbeditor/images/quote.gif\" name=\"btnQuote\" onClick=\"doAddTags('[quote]','[/quote]')\">"); 
  	document.write("<img class=\"button\" src=\"bbeditor/images/code.gif\" name=\"btnCode\" onClick=\"doAddTags('[code]','[/code]')\">"); 
    document.write("<br>");
	document.write("<textarea id=\""+ obj +"\" name = \"" + obj + "\" cols=\"" + width + "\" rows=\"" + height + "\"></textarea>");
	
	textarea = document.getElementById(obj);
	textarea.value = val;
		}

function doImage()
{

var url = prompt('Enter the Image URL:','http://');
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

function doURL()
{

var url = prompt('Enter the URL:','http://');
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
		
        var sel = textarea.value.substring(start, end);
		
		if(sel==""){
				var rep = '[url]' + url + '[/url]';
				} else
				{
				var rep = '[url=' + url + ']' + sel + '[/url]';
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