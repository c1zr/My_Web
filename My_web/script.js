$('.scriptUvod').fadeOut(0).fadeIn(3400);

$(function(){
    $(".animate, .uvodFooter").animate({
        "margin-top":"-100%"
    },0)
});


$(function(){
    $(".animate, .uvodFooter").animate({
        "margin-top":"0%"
    },2500)
});



$(function(){
    $(".omne").fadeOut(0).slideDown(1000)
});


$(function(){
    $(".bydlim").fadeOut(0).slideDown(1000)
});

/*hamburger menu*/

const menu = document.querySelector(".menu");
const menuItems = document.querySelectorAll(".menuItem");
const hamburger= document.querySelector(".hamburger");
const menuIcon = document.querySelector(".menuIcon");

function toggleMenu() 
{
  if (menu.classList.contains("showMenu")) 
  {
    menu.classList.remove("showMenu");
    closeIcon.style.display = "none";
    menuIcon.style.display = "block";
  } 
  else 
  {
    menu.classList.add("showMenu");
    closeIcon.style.display = "block";
    menuIcon.style.display = "none";
  }
}

hamburger.addEventListener("click", toggleMenu);

menuItems.forEach( 
  function(menuItem) { 
    menuItem.addEventListener("click", toggleMenu);
  }
)


