$(document).ready(function() {
    "use strict";

    //LEFT MOBILE MENU OPEN
    $(".show-menu").on('click', function() {
        $(".mm-menu").css('right', '-25%');
    });

    //LEFT MOBILE MENU OPEN
    $(".hide-menu").on('click', function() {
        $(".mm-menu").css('right', '-100%');
    });
    //GOOGLE MAP - SCROLL REMOVE
    $('.hp-view')
        .on('click', function() {
            $(this).find('iframe').addClass('clicked')
        })
        .on('mouseleave', function() {
            $(this).find('iframe').removeClass('clicked')
        });

    $('input#input_text, textarea#textarea1').characterCounter();
    Materialize.updateTextFields();
    $('.collapsible').collapsible();
    $('.materialboxed').materialbox();
    $('.carousel').carousel();
    $('select').material_select();
    $('.slider').slider();
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: true, // Does not change width of dropdown to that of the activator
        hover: true, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: false, // Displays dropdown below the button
        alignment: 'left', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
    });


    $('#birthdate').val(function(index, value) {
        console.log(value);
    });


});

//PORTFOLIO FILTER
$(function() {

    var filterList = {

        init: function() {

            // MixItUp plugin
            // http://mixitup.io
            $('#portfoliolist').mixItUp({
                selectors: {
                    target: '.portfolio',
                    filter: '.filter'
                },
                load: {
                    filter: '.logo'
                }
            });

        }

    };

    // Run the show!
    filterList.init();


});



//DATE PICKER	
$(function() {
    var dateFormat = "dd-mm-yy";
    var from = $("#from")
        .datepicker({
            dateFormat: dateFormat,
            language: "fr",
            defaultDate: "+1w",
            changeYear: true,
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
            dateFormat: dateFormat,
            language: "fr",
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }
        return date;
    }
});

//Scroll navbar
$(function () {
    $(document).scroll(function () {
        var $nav = $(".menu-section");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

//Scroll navbar mobile
$(function () {
    $(document).scroll(function () {
        var $nav = $(".mm");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    });
});

$("#avis_button").click(function(){
    $(this).hide();
    $("#avis_com").show()
});

$("#button_annuler").click(function(){
    $("#avis_com").hide();
    $("#avis_button").show()
});

$(function() {
    $('#check-all').click(function(){
        $("input:checkbox").attr('checked', true);
    });
});

$(function() {
    $('#uncheck-all').click(function(){
        $("input:checkbox").attr('checked', false);
    });
});