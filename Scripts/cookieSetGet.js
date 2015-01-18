// Expiry time should he hard-coded here instead of passing it in the function call everywhere
var EXPIRY_DAYS;

function setCookie(cname, cvalue, EXPIRY_DAYS) {
    EXPIRY_DAYS = typeof EXPIRY_DAYS !== 'undefined' ? EXPIRY_DAYS : 100;
    var d = new Date();
    d.setTime(d.getTime() + (EXPIRY_DAYS*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}
