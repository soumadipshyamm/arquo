
$(document).on('submit', '.adminFrm', function (event) {
    event.preventDefault();
    let formdata = new FormData(this);
    $.ajax({
        type: "POST",
        url: $(this).data('action'),
        data: formdata,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $.alert({
                    icon: 'fa fa-check',
                    title: 'Success!',
                    content: data.message,
                    type: 'green',
                    typeAnimated: true,
                });
                if (data.redirect != '') {
                    setTimeout(function () {
                        window.location.href = data.redirect
                    }, 1000);
                }
            } else {
                $.alert({
                    icon: 'fa fa-warning',
                    title: 'Warning!',
                    content: data.message,
                    type: 'orange',
                    typeAnimated: true,
                });
            }
        }
    });
});

$(document).on('keypress', '.float-number', function (event) {
    if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
