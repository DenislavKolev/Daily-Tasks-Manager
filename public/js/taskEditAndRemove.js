$(document).ready(function () {

    $('[data-js=remove]').click(removeTask);

    function removeTask() {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/removeTask",
            method: "POST",
            dataType: "json",
            data: {
                id: $(this).parents('tr').attr('id')
            },
            success: function (result) {
                   if(result == "Success"){
                       location.reload(true);
                   }
            }

        })
    }
});
