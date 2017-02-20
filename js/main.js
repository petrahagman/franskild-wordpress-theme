/*
* jQuery script for cookie notification.
*/

var $ = jQuery;

if(localStorage.getItem("notificationShown") == null) {
    $("#hide-notification").click(hideNotification);
} else {
    hideNotification();
}

function hideNotification() {
    localStorage.setItem("notificationShown", true);
    $("#cookie-notification").hide();
}