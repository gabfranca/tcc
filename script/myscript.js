function getCurrentPath() {
    var URL = window.location.protocol + "//" + window.location.host;
    return URL;
}


function redirect(param)
{
   // alert('teste');

    var url = getCurrentPath();
    var newURL = url +"/tcc/" +param;
   // alert(newURL);
   window.location = newURL;
}


function redirectAPI(param)
{
   // alert('teste');

    var url = getCurrentPath();
    var newURL = url +"/api/" +param;
   // alert(newURL);
   window.location = newURL;
}