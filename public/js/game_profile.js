$(function () {
  $(".carousel-icon-right").click(function () {
    $(".profile").each(function () {
      // JQuery return the actual px value instead of percentage so back to vanilla js
      const positionString = $(this)[0].style.left || "0%";
      const positionValue = parseInt(positionString.slice(0, -1));

      const newValue = positionValue - 25 + "%";

      $(this).css("left", newValue);
    });
  });

  $(".carousel-icon-left").click(function () {
    $(".profile").each(function () {
      // JQuery return the actual px value instead of percentage so back to vanilla js
      const positionString = $(this)[0].style.left || "0%";
      const positionValue = parseInt(positionString.slice(0, -1));

      const newValue = positionValue + 25 + "%";

      $(this).css("left", newValue);
    });
  });

  $(".tab").click(function($event) {
    $event.preventDefault();
    const target = $(this).attr("href");

    $(".tab").removeClass("tab-active");
    $(".tab-content").hide();

    $(target).show();
    $(this).addClass("tab-active");
  })
});