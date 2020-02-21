$(document).ready(function () {
    $('.testimonials-slider').bxSlider({
        minSlides: 2,
        maxSlides:2,
        auto: true,
        autoControls: false,
        pager: false,
        controls: false,
        autoHover: true,
        mode: "vertical",
        speed: 500
    });

    //progress bar get value of width
    var styleValue = $(".progress-bar").attr("style");
    var splitedValue = styleValue.split(":");
    $(".value").html(splitedValue[1]);

    var styleValue1 = $(".progress-bar1").attr("style");
    var splitedValue1 = styleValue1.split(":");
    $(".value1").html(splitedValue1[1]);

    var styleValue2 = $(".progress-bar2").attr("style");
    var splitedValue2 = styleValue2.split(":");
    $(".value2").html(splitedValue2[1]);

    //set color attribute to options 
    $("option[value='progress']").attr("color", "#33cccc");
    $("option[value='scheduled']").attr("color", "#33cccc");
    $("option[value='complete']").attr("color", "#bdf269");
    $("option[value='open']").attr("border", "1px solid #bdf269");

    //change background color of select element based on options
    setColor(".networking-blueprint");
    setColor(".project-assignments");
    setColor(".growth-experiences");

    $(".networking-blueprint").change(function () {
        setColor(".networking-blueprint");
    });

    $(".project-assignments").change(function () {
        setColor(".project-assignments");
    });

    $(".growth-experiences").change(function () {
        setColor(".growth-experiences");
    });

    function setColor(selector) {
        $(selector).each(function(i, obj) {
            var color = $(obj).find("option:selected").attr("color");
            $(obj).css("background", color);
        });
    }

})

