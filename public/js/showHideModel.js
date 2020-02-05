$(document).ready(function () {
    $('#openModal').click(showModal);
    $('#close').click(hideModal);

    function showModal() {
        $('#modal').fadeIn(500).css('display', 'block');
    }

    function hideModal(){
        $('#modal').fadeOut(500).css('display', 'none');

    }


});
