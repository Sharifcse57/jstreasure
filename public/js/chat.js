function chatAvailable(bAvailable) {
	var div = document.getElementById("chatStatus");
	var imgroot = div.getAttribute("data-imgroot"); 
	var div1 = document.getElementById("chatStatus1");
	var imgroot1 = div.getAttribute("data-imgroot"); 
	if(div) { 
		if (bAvailable) {
			div.style.backgroundImage = "url("+imgroot+"/chat-on.svg)";			
			div1.style.backgroundImage = "url("+imgroot+"/chat-on.svg)";					
		} else {
			div.style.backgroundImage = "url("+imgroot+"/chat-off.svg)";			
			div1.style.backgroundImage = "url("+imgroot+"/chat-off.svg)";									
		}
	}
}

var op2Chat2Window;
var isChatAvailable=1;

function openChat() {
	if(op2Chat2Window && !op2Chat2Window.closed && op2Chat2Window.focus) {
		op2Chat2Window.focus();
		return;
	}
	
   	var tenantUrl = 'hrg.zipwiresw.com';
   	var entryName = 'CN%20Chat';
	var key = "&sesID=";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 5; i++ )
        key += possible.charAt(Math.floor(Math.random() * possible.length));

   	op2Chat2Window = window.open("https://hrg.zipwiresw.com:9443/clientweb/app/extchat/client/client-chat-page.html?openHours=" + 
			(isChatAvailable ? "1":"0") + "&tenantUrl=" + tenantUrl + "&entryName=" + entryName + key, "chatWindow", 
			'height=450, width=600, left=300, x=300, top=100, y=100, menubar=0, status=0, toolbar=0, titlebar=0, status=0, location=0');
		
	if (op2Chat2Window && op2Chat2Window.focus)	op2Chat2Window.focus();
}

chatAvailable(isChatAvailable);