function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
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

var switcher = document.querySelector("input[name=switcher]");
var currentTheme = getCookie('tema');
document.documentElement.setAttribute('data-theme', currentTheme);

if (currentTheme == "dark") {
    checkbox.checked = true;
} else {
    checkbox.checked = false;
}

checkbox.addEventListener('click', function() {
    if (this.checked) {
        console.log("Checkbox is checked..");
        document.cookie="tema=dark;path=/";
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        console.log("Checkbox is not checked..");
        document.cookie="tema=light;path=/";
        document.documentElement.setAttribute('data-theme', 'light');
    }
});