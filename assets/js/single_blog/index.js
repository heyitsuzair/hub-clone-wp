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

  const commentField = $(".comment-form-comment");
  // Removing Label From Comment Form Comment Field ----------------------->
  $(commentField)[0].children[0].remove();
  // Removing Label From Comment Form Comment Field ----------------------->

  // Now The Field Became First Child So We Can Set Its Placeholder By setAttribute Function --------------->
  $(commentField)[0].children[0].setAttribute(
    "placeholder",
    "Your Feedback Will Be Appreciated!"
  );
  // Now The Field Became First Child So We Can Set Its Placeholder By setAttribute Function --------------->
})(jQuery);
