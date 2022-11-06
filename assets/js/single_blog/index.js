(function ($) {
  const target = $(".content-left");
  var waypoint = new Waypoint({
    element: target,
    handler: function (direction) {
      direction === "down"
        ? $(target).addClass("active")
        : $(target).removeClass("active");
    },
  });
})(jQuery);
