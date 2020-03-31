function setCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
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
jQuery(document).ready(function($) {
  $(".menu-trigger").click(function() {
    $('body').toggleClass("menu-open");
  });
  $('body').toggleClass("load-complete");

  $(".sub-toggle").click(function() {
    $(this).parent().toggleClass("sub-open");
  });

  $("#light-switch").on("click", function(){
    if($("body").hasClass("lights-on")){
      setCookie("ap_lights", "off", 1000);
      $("body").removeClass("lights-on");
      console.log("off");
    } else {
      setCookie("ap_lights", "on", 1000);
      $("body").addClass("lights-on");
      console.log("on");

    }

  });
});
