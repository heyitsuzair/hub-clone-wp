(function ($) {
  const lefTarget = $(".content-left");
  var contentLeftTrigger = new Waypoint({
    element: lefTarget,
    handler: function (direction) {
      direction === "down"
        ? $(lefTarget).addClass("active")
        : $(lefTarget).removeClass("active");
    },
  });
  const rightTrigger = $(".content-right");
  var contentRightTrigger = new Waypoint({
    element: rightTrigger,
    handler: function (direction) {
      direction === "down"
        ? $(rightTrigger).addClass("active")
        : $(rightTrigger).removeClass("active");
    },
    // offset: 100,
  });
})(jQuery);
