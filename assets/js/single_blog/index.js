(function ($) {
  const leftTarget = $(".content-left");
  var contentLeftTrigger = new Waypoint({
    element: leftTarget,
    handler: function (direction) {
      direction === "down"
        ? $(leftTarget).addClass("active")
        : $(leftTarget).removeClass("active");
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

  const commentForm = $(".comment-form-comment");
  const submit = $("#submit");
  const commentField = $("#comment");

  // Disable Submit Button By Default -------------------->
  $(submit)[0].setAttribute("disabled", "true");
  $(submit)[0].setAttribute("class", "submit submit-disabled");
  // Disable Submit Button By Default -------------------->

  // Removing Label From Comment Form Comment Field ----------------------->
  $(commentForm)[0].children[0].remove();
  // Removing Label From Comment Form Comment Field ----------------------->

  // Now The Field Became First Child So We Can Set Its Placeholder By setAttribute Function --------------->
  $(commentField)[0].setAttribute(
    "placeholder",
    "Your Feedback Will Be Appreciated!"
  );
  // Now The Field Became First Child So We Can Set Its Placeholder By setAttribute Function --------------->

  // Listen To On Keyup Event In Comment Textarea -------------------------->
  $(commentField).on("keyup", (e) => {
    // If the value of comment field is empty, prevent user from submitting form by disabling submit button ------------>
    if (e.target.value !== "") {
      $(submit)[0].removeAttribute("disabled");
      $(submit)[0].setAttribute("class", "submit");
    } else {
      $(submit)[0].setAttribute("disabled", "true");
      $(submit)[0].setAttribute("class", "submit submit-disabled");
    }
    // If the value of comment field is empty, prevent user from submitting form by disabling submit button ------------>
  });
  // Listen To On Keyup Event In Comment Textarea -------------------------->
})(jQuery);
