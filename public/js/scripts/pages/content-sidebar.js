$(document).ready(function(){var e,t,a=document.getElementById("small-slider");(noUiSlider.create(a,{start:[30,70],behaviour:"drag",connect:!0,range:{min:20,max:80}}),$(".sidebar-sticky").length)&&($("body").hasClass("content-right-sidebar")||$("body").hasClass("content-left-sidebar")?(e=$(".header-navbar").height(),t=$("footer.footer").height()):(e=$(".header-navbar").height()+24,t=$("footer.footer").height()+10),$(".sidebar-sticky").sticky({topSpacing:e,bottomSpacing:t}))});
