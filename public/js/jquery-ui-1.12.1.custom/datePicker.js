$(document).ready(function () {
    $('#datepicker').datepicker({
        dateFormat: "dd-MM-yy",
        altFormat: "yy-mm-dd",
        minDate: 0,
        showOn: "button",
        buttonImage: "../../images/calendar.png",


    });

    var altFormat = $( ".selector" ).datepicker( "altFormat" );
    console.log(altFormat)
});
