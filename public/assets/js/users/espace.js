$(document).ready(function () {

    // Suppression de la location

    $(document).on('click', '.remove-location', function (e) {

        e.preventDefault();

        var id = $(this).data('id'),
            url = '../ajax/users/ajax-delete-location.php'

        if (confirm('Voulez-vous vraiment supprimer cette location ?')) {

            $('#location-' + id).fadeOut(300);

            setTimeout(() => {
                $('#location-' + id).remove();
            }, 1200);

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    location_id: id
                },
                success: function (data) {
                }
            })

        }

    })

})