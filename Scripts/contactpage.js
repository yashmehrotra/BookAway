$(function() {

    $('#contact-us-container').append(
        '<img src="Styles/Images/loader1.gif" id="loading-gif" style="position:absolute; top:200px; right:18%;">'
    );

    $('iframe').ready(function() {
        
        $('#loading-gif').remove();
    });

});