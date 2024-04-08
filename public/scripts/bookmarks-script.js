$(".bookmark-empty").on("click", function (event) {
    event.preventDefault();

    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    const propertyId = $(this).data('id');

    const requestData = {
        property_id: propertyId
    };

    $.ajax({
        url: '/bookmark/create',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        data: JSON.stringify(requestData),
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error('Request failed. Status:', xhr.status);
            console.log(error);
        }
    });
});

$(".bookmark-liked").on("click", function (event) {
    event.preventDefault();

    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    const propertyId = $(this).data('id');

    $('#bookmarkProperty' + propertyId).hide();

    $.ajax({
        url: `/bookmark/${propertyId}/delete`,
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error('Request failed. Status:', xhr.status);
            console.log(error);
        }
    });
});




