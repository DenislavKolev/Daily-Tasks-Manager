$(document).ready(function () {

    $('[data-js=remove]').click(removeTask);

    $('[data-js=finish]').click(completeTask);

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
                  $('#'+result).remove();
                var numberOfRows = $('tbody').children().length;
                for (var i =1; i<=numberOfRows; i++){
                    $('tbody tr:nth-of-type(' + i + ') td:first-of-type').html(i);
                }
                var toDoNumbers = parseInt($('#toDo div:nth-child(2)').html());
                $('#toDo div:nth-child(2)').html(toDoNumbers - 1);

                progress();
            }

        })
    }

    function completeTask() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/finishTask",
            method: "POST",
            dataType: "json",
            data: {
                id: $(this).parents('tr').attr('id')
            },
            success: function (result) {
               $('#' + result + ' td:nth-child(3)').html('Завършена');
               $('#' + result + ' [data-js=finish]').prop('disabled', true);
               $('#' + result + ' [data-js=remove]').prop('disabled', true);

               var element = $('#done div:nth-child(2)');
               var done = parseInt(element.html());
                element.html(done + 1);
                progress();

            },
            error: function () {
                console.log('no');
            }
        })
    }

    function progress() {
        var toDO = parseInt($('#toDo div:nth-child(2)').html());
        var done =  parseInt( $('#done div:nth-child(2)').html());

            $('#progress div:nth-child(2)').html( Math.round((done/toDO) * 100) + '%');

    }
});
