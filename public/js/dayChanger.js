$(document).ready(function () {

    $('#prev').click(dayChanger);
    $('#next').click(dayChanger);

    function dayChanger(){
        // console.log(parseInt($('#prev').attr('data-js')));
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/dayChanger",
            method: "POST",
            dataType: "json",
            data: {
                days: parseInt($(this).attr('data-js'))
            },
            success: function (result) {
                if (result == 'Success'){
                    location.reload(true);
                }
            },
            error: function (result) {
                console.log(result)

            }
            }

        )
    }

});
