var body = document.getElementById('body');
var btn_status = false;
var btnr = document.getElementById('sidebar-toggler');


function getCookie(cname){
    var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
}

function newCookieON(){

    var d = new Date();
    d.setTime(d.getTime() + (90*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "sidebar-main=on;" + expires + ";path=/";

}

function newCookieOFF(){

    var d = new Date();
    d.setTime(d.getTime() + (90*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "sidebar-main=off;" + expires + ";path=/";

}

btnr.onclick = function(){
    
    if(btn_status == false){
        newCookieON();
        btn_status = !btn_status;
    }
    else{
        newCookieOFF();
        btn_status = !btn_status;
    }

}

window.onload = function(){

    var sidebar_cookie = getCookie('sidebar-main');

    if(sidebar_cookie == 'on'){
        document.getElementById('app').classList.add('sidebar-hidden');
        document.getElementById('logo').classList.add('hidden-sidebar-logo');
        btn_status = true;
    }
    else{
        document.getElementById('app').classList.remove('sidebar-hidden');
        document.getElementById('logo').classList.remove('hidden-sidebar-logo');
        btn_status = false;
    }

}