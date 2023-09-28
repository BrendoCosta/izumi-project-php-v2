function sucessNotification(tlt, dsc, dur) {
    
    const notification = ({ title, description }) => `
      <div class="notificationBox sucess" id="notification">
        <h2><i class="fas fa-check-circle"></i>&nbsp;&nbsp;${title}</h2>
        <p>${description}</p>
      </div>
    `;
    
    $('body').append([
      { title: tlt, description: dsc },
    ].map(notification).join(''));
    
    var ntfc = document.getElementById("notification");
    
    setTimeout(function(){ ntfc.style.right = "6em";
        setTimeout(function(){ ntfc.style.right = "1em";
            setTimeout(function(){ ntfc.style.right = "6em";
                setTimeout(function(){ ntfc.style.right = "-100%";
                    setTimeout(function(){ ntfc.parentNode.removeChild(ntfc); }, 1000);
                }, 300);
            }, dur);
        }, 300);
    }, 300);
    
}

function errorNotification(tlt, dsc, dur) {
    
    const notification = ({ title, description }) => `
      <div class="notificationBox error" id="notification">
        <h2><i class="fas fa-times-circle"></i>&nbsp;&nbsp;${title}</h2>
        <p>${description}</p>
      </div>
    `;
    
    $('body').append([
      { title: tlt, description: dsc },
    ].map(notification).join(''));
    
    var ntfc = document.getElementById("notification");
    
    setTimeout(function(){ ntfc.style.right = "6em";
        setTimeout(function(){ ntfc.style.right = "1em";
            setTimeout(function(){ ntfc.style.right = "6em";
                setTimeout(function(){ ntfc.style.right = "-100%";
                    setTimeout(function(){ ntfc.parentNode.removeChild(ntfc); }, 1000);
                }, 300);
            }, dur);
        }, 300);
    }, 300);
    
}

function infoNotification(tlt, dsc, dur) {
    
    const notification = ({ title, description }) => `
      <div class="notificationBox" id="notification">
        <h2><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;${title}</h2>
        <p>${description}</p>
      </div>
    `;
    
    $('body').append([
      { title: tlt, description: dsc },
    ].map(notification).join(''));
    
    var ntfc = document.getElementById("notification");
    
    setTimeout(function(){ ntfc.style.right = "6em";
        setTimeout(function(){ ntfc.style.right = "1em";
            setTimeout(function(){ ntfc.style.right = "6em";
                setTimeout(function(){ ntfc.style.right = "-100%";
                    setTimeout(function(){ ntfc.parentNode.removeChild(ntfc); }, 1000);
                }, 300);
            }, dur);
        }, 300);
    }, 300);
    
}