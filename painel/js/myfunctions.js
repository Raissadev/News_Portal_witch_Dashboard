feather.replace();

const mainContent = document.getElementById('mainContent');
const toogleMenu = document.querySelectorAll('.btnIconClick');
const asidePainel    = document.querySelector('.asidePainel');

for (var i = 0; i < toogleMenu.length; i++){
    toogleMenu[i].addEventListener('click', menuAction);
}

document.addEventListener('keyup', function(e){
    if(e.keyCode == 27) {
        if(asidePainel.classList.contains('showMenu')){
            menuAction();
        }
    }
});

function menuAction() {
    if(asidePainel.classList.contains('showMenu')){
        asidePainel.classList.remove('showMenu');
        mainContent.style.gridTemplateColumns = '20% 80%';
    }
    else {
        asidePainel.classList.add('showMenu');
        mainContent.style.gridTemplateColumns = '100%';
    }
}

const darkTheme = document.getElementById('themeDark');
const lightTheme = document.getElementById('themeLight');
darkTheme.addEventListener('click', (e)=>{
    document.documentElement.setAttribute('data-theme','light');
    darkTheme.style.display= "none";
    lightTheme.style.display= "flex";
});
lightTheme.addEventListener('click', (e)=>{
    document.documentElement.setAttribute('data-theme','dark');
    darkTheme.style.display= "flex";
    lightTheme.style.display= "none";
});

const bodyContents = document.getElementById('bodyContents');
bodyContents.addEventListener("touchstart", (e)=>{
    asidePainel.style.display = "none";
});


const myLi = document.querySelectorAll(".myLi")
for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].parentElement.className = 'active';
    }
}
