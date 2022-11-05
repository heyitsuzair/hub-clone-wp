(function ($) {
  // Adding First Two Children Of Parent Menu In Div To Make Submenu And Parent Menu As Flex
  const arrowIcon = $(".menu-arrow");
  Array.from(arrowIcon).forEach((elem) => {
    $(elem).on("click", (e) => {
      e.currentTarget.classList.toggle("fa-angle-up");
      e.currentTarget.nextElementSibling.classList.toggle("active");
    });
  });
})(jQuery);
