(function ($) {
  // Adding First Two Children Of Parent Menu In Div To Make Submenu And Parent Menu As Flex
  const arrowIcon = $(".menu-arrow");
  Array.from(arrowIcon).forEach((elem) => {
    $(elem).on("click", (e) => {
      e.currentTarget.classList.toggle("fa-angle-up");
      e.currentTarget.nextElementSibling.classList.toggle("active");
    });
  });

  // Get The Hamburger Icon ---------------------->
  const hamburger = $(".hamburger");
  // Get The Hamburger Icon ---------------------->

  // Get Search Form ---------------->
  const searchForm = $(".search-form");
  // Get Search Form ---------------->

  // Listen To Click Event On Hamburger -------------------------->
  $(hamburger).on("click", () => {
    // ? Check If Search Form Is Active Than Remove Its Active Class -------------->
    if ($(searchForm).hasClass("active")) {
      $(searchForm).removeClass("active");
    }
    // ? Check If Search Form Is Active Than Remove Its Active Class -------------->
  });
  // Listen To Click Event On Hamburger -------------------------->
})(jQuery);
