{literal}
tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
        language : "es",
	plugins : "safari,table,advhr,advlink,inlinepopups,insertdatetime,preview,searchreplace,contextmenu,paste,fullscreen,noneditable,xhtmlxtras",

	// Theme options
	theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,advhr,|,fullscreen",
	theme_advanced_buttons4 : "cite,abbr,acronym,del,ins,attribs,|,insertfile,insertimage",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : false

});
{/literal}