// JavaScript Document
function abrirPopup(url,w,h,name) {
var newW = w + 100;
var newH = h + 100;
var left = (screen.width-newW)/2;
var top = (screen.height-newH)/2;
var newwindow = window.open(url, 'window', 'width='+newW+',height='+newH+',left='+left+',top='+top);
newwindow.resizeTo(newW, newH);
 
//posiciona o popup no centro da tela
newwindow.moveTo(left, top);
newwindow.focus();
return false;
}

function abrirPopup1(url,w,h,name) {
var newW = w + 100;
var newH = h + 100;
var left = (screen.width-newW)/2;
var top = (screen.height-newH)/2;
var newwindow = window.open(url, 'window1', 'width='+newW+',height='+newH+',left='+left+',top='+top);
newwindow.resizeTo(newW, newH);
 
//posiciona o popup no centro da tela
newwindow.moveTo(left, top);
newwindow.focus();
return false;
}

function abrirPopup2(url,w,h,name) {
var newW = w + 100;
var newH = h + 100;
var left = (screen.width-newW)/2;
var top = (screen.height-newH)/2;
var newwindow = window.open(url, 'window2', 'width='+newW+',height='+newH+',left='+left+',top='+top);
newwindow.resizeTo(newW, newH);
 
//posiciona o popup no centro da tela
newwindow.moveTo(left, top);
newwindow.focus();
return false;
}
