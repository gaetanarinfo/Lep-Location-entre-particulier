$(document).on('click', '.nav-item a', function (e) {

    e.preventDefault();

})

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
            success: function (data) {}
        })

    }

})


var ctx = $("#myAreaChart"),
    ctx2 = $("#myAreaChart2");

var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
        datasets: [{
            label: "Vues",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: " rgb(26 181 66)",
            pointRadius: 3,
            pointBackgroundColor: "rgb(26 181 66)",
            pointBorderColor: "rgb(26 181 66)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgb(26 181 66)",
            pointHoverBorderColor: "rgb(26 181 66)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        }],
    },
    options: {
        plugins: {
            legend: {
                display: false,
            }
        },
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scale: {
            ticks: {
                beginAtZero: true,
                precision: 0,
                stepSize: 1
            }
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
        }
    }
}), myLineChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
        datasets: [{
            label: "Apparition",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "#49bcdf",
            pointRadius: 3,
            pointBackgroundColor: "#49bcdf",
            pointBorderColor: "#49bcdf",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "#49bcdf",
            pointHoverBorderColor: "#49bcdf",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
        }],
    },
    options: {
        plugins: {
            legend: {
                display: false,
            }
        },
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scale: {
            ticks: {
                beginAtZero: true,
                precision: 0,
                stepSize: 1
            }
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
        }
    }
});