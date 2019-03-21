$(document).ready(() => {

    $('button').on('click', function()
    {
        let id = $(this).attr('id');
        let output = id.split('-').pop();

        let interval = $('select').val();
        let code = $('input').val();

        window.location.assign('download/file.php?type=' + output
                + '&code=' + code + '&interval=' + interval);
    });
});