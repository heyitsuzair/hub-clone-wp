(function ($) {
  // Get The Search Icon ---------------------->
  const searchIcon = $("#search-icon");
  // Get The Search Icon ---------------------->

  // Get Search Close Icon --------->
  const closeSearch = $("#close-search");
  // Get Search Close Icon --------->

  // Get Search Form ---------------->
  const searchForm = $(".search-form");
  // Get Search Form ---------------->

  // Listen To Click Event On Search Icon --------------------->
  $(searchIcon).on("click", () => {
    // ** Open The Search Form ------------------->
    $(searchForm).addClass("active");
    // ** Open The Search Form ------------------->
  });
  // Listen To Click Event On Search Icon --------------------->

  // Listen To Click Event On Search Close Icon ------------>
  $(closeSearch).on("click", () => {
    // ** Close The Search Form ------------------->
    $(searchForm).removeClass("active");
    // ** Close The Search Form ------------------->
  });
  // Listen To Click Event On Search Close Icon ------------>
})(jQuery);
