$(document).ready(function () {
    $(document).on("mouseover", ".dropdown-nav", function() {
        $(this).find("ul").css("display", "block");
    });

    $(document).on("mouseout", ".dropdown-nav, .dropdown-nav>ul", function() {
        $(".dropdown-nav").find("ul").css("display", "none");
    });
    // MOBILE NAVIGATION BURGER
    $(document).on("click", ".burger", function(){
        $(".burger").addClass("burger-open");
        $(".menu-container").addClass("is-open");
    });

    $(document).on("click", ".close-menu", function(){
        $(".burger").removeClass("burger-open");
        $(".menu-container").removeClass("is-open");
    });

    // TRAVEL INDEX HOVER EFFECT
    $(document).on("mouseover", "main > .travel > .container > .travel-posts > article", function() {
        $(this).find("figure > figcaption").css("margin", "-50px 0 0px");
        $(this).find("figure > img").css("filter", "brightness(70%)");
        $(this).find("figure > .overlay").css("opacity", "1");
        $(this).find("figure > .overlay > span").css("padding-right", "10px");
    });

    $(document).on("mouseleave", "main > .travel > .container > .travel-posts > article", function() {
        $(this).find("figure > figcaption").css("margin", "-28px 0 0px");
        $(this).find("figure > img").css("filter", "brightness(100%)");
        $(this).find("figure > .overlay").css("opacity", "0");
        $(this).find("figure > .overlay > span").css("padding-right", "0px");
    });

    // BLOG INDEX HOVER EFFECT
    $(document).on("mouseover", ".blog-posts > article", function () {
        $(this).find("a > figure > img").css("filter", "brightness(70%)");
        $(this).find("a > figure > .overlay").css("opacity", "1");
        $(this).find("a > figure > .overlay > span").css("padding-right", "10px");
    });

    $(document).on("mouseleave", ".blog-posts > article", function () {
        $(this).find("a > figure > img").css("filter", "brightness(100%)");
        $(this).find("a > figure > .overlay").css("opacity", "0");
        $(this).find("a > figure > .overlay > span").css("padding-right", "0px");
    });

    // BLOG PAGE HOVER EFFECT
    $(document).on("mouseover", "main > .blog > .container > .blog-posts > a", function () {
        $(this).find("img").css("margin-left", "20px");
    });

    $(document).on("mouseleave", "main > .blog > .container > .blog-posts > a", function () {
        $(this).find("img").css("margin-left", "10px");
    });

    // TRAVEL PAGE HOVER EFFECT
    $(document).on("mouseover", "main > .travel > .travel-images > a", function () {
        $(this).find("img").css("margin-left", "20px");
    });

    $(document).on("mouseleave", "main > .travel > .travel-images > a", function () {
        $(this).find("img").css("margin-left", "10px");
    });

    // OOTD INDEX HOVER EFFECT
    $(document).on("mouseover", "main > .ootd > .container > .ootd-container > figure", function () {
        $(this).find("img").css("filter", "brightness(70%)");
    });

    $(document).on("mouseleave", "main > .ootd > .container > .ootd-container > figure", function () {
        $(this).find("img").css("filter", "brightness(100%)");
    });

    // OOTD INDEX CLICK PREVIEW
    $(document).on("click", "main > .ootd > .container > .ootd-container > figure", function () {
        let image_source = $(this).find("img").attr("src");
        let image_alt = $(this).find("img").attr("alt");
        $(".preview-image").attr("src", image_source);
        $(".preview-image").attr("alt", image_alt);
        $(".image-preview").css("display", "block");
        $(".image-preview > .container").css("display", "flex");
    });

    $(document).on("click", ".image-preview > .container > button", function () {
        $(".image-preview").css("display", "none");
    });

    // OOTD PAGE CLICK PREVIEW
    $(document).on("click", "main > .ootd > .container > .ootd-posts > a > figure", function () {
        let image_source = $(this).find("img").attr("src");
        let image_alt = $(this).find("img").attr("alt");
        $(".preview-image").attr("src", image_source);
        $(".preview-image").attr("alt", image_alt);
        $(".image-preview").css("display", "block");
        $(".image-preview > .container").css("display", "flex");
    });
});