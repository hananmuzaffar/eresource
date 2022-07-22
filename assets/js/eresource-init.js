$(document).ready(function(){
    $('.sidenav').sidenav();
    $(".dropdown-trigger").dropdown();
    $('select').formSelect();
    $('.count').characterCounter();
    $('.fixed-action-btn').floatingActionButton();
    $('.tooltipped').tooltip();
    $('.tap-target').tapTarget();
});

var today = new Date();
var date = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
document.querySelector("#date").innerHTML = date