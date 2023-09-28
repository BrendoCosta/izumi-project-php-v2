function openNav() {
    var wrapper = document.getElementById("header-wrapper");
    var header =  document.getElementById("header");
    
    //document.body.style.position = "fixed";
    
    wrapper.style.left = "0";
    header.style.left = "0";
    
    document.getElementById("open").style.opacity = "0";
    setTimeout(function(){ document.getElementById("open").style.display = "none"; }, 300);
    
}

function closeNav() {
    
    var wrapper = document.getElementById("header-wrapper");
    var header =  document.getElementById("header");
    
    //document.body.style.position = "unset";
    
    wrapper.style.left = "-100%";
    header.style.left = "-100%";
    
    document.getElementById("open").style.display = "inherit";
    setTimeout(function(){ document.getElementById("open").style.opacity = "1"; }, 300);
    
    if (window.screen.width >= 768) {
        document.getElementById("open").style.display = "none";
    }
}