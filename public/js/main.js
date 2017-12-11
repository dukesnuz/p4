function logout() {
    "use strict";
    $('logoutForm').submit();
};

window.onload = function() {
    $('logout').addEventListener('click', function (e) {
        e.preventDefault();
        logout();
    }, true);

    if($('office_names') !== null) {
        setOfficeMenu();
    }
};
