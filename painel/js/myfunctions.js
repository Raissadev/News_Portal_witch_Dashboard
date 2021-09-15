feather.replace();

const menuClose = document.getElementById('menuClose');
const mainContent = document.getElementById('mainContent');
const menuOpen = document.getElementById('menuOpen');
const asidePainel = document.getElementById('asidePainel');


menuClose.addEventListener('click', (e)=>{
    asidePainel.style.display = 'none';
    menuOpen.style.display = 'flex';
    menuClose.style.display = 'none';
    mainContent.style.gridTemplateColumns = '100%';
});
menuOpen.addEventListener('click', (e)=>{
    asidePainel.style.display = 'block';
    menuOpen.style.display = 'none';
    menuClose.style.display = 'flex';
    mainContent.style.gridTemplateColumns = '20% 80%';
});

asidePainel.addEventListener('onmousedown', (e)=>{
    asidePainel.style.display = 'block';
    menuOpen.style.display = 'none';
    menuClose.style.display = 'flex';
    mainContent.style.gridTemplateColumns = '20% 80%';
});

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