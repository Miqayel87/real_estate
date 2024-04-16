$(".bookmark").on("click", async function (event) {
    event.preventDefault();

    const csrfToken = $('meta[name="csrf-token"]').attr('content');

    const propertyId = $(this).data('id');

    const requestData = {
        property_id: propertyId
    };

    if (!$(this).hasClass('liked')) {
        await $.ajax({
            url: '/bookmark/create',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            data: JSON.stringify(requestData),
            success: function (response) {
                console.log('Bookmark Created');

            },
            error: function (xhr, status, error) {
                console.error('Request failed. Status:', xhr.status);
                console.log(error);
            }
        });
    } else {
        await $.ajax({
            url: `/bookmark/${propertyId}/delete`,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json'
            },
            success: function (response) {
                console.log('Bookmark deleted');

            },
            error: function (xhr, status, error) {
                console.error('Request failed. Status:', xhr.status);
                console.log(error);
            }
        });

        $('#bookmarkProperty' + propertyId).hide();

    }


});




