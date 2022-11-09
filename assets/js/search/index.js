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

  // Get Search Form Input ---------------->
  const searchFormInput = $(".search-form-input");
  // Get Search Form Input ---------------->

  // Listen To Click Event On Search Icon --------------------->
  $(searchIcon).on("click", () => {
    $(searchForm).addClass("active");
  });
  // Listen To Click Event On Search Icon --------------------->

  // Listen To Click Event On Search Close Icon ------------>
  $(closeSearch).on("click", () => {
    $(searchForm).removeClass("active");
  });
  // Listen To Click Event On Search Close Icon ------------>
})(jQuery);
