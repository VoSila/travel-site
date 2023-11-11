$(function () {
    $('input[name="daterange"]').daterangepicker(
        {
            ssingleDatePicker: 'true',
            showShortcuts: 'false',
            showTopbar: 'false'
        }
    );
});

$(document).ready(function () {
    $('.sorting-btn').click(function () {
        let orderBy = $(this).data('order')
        $('.dropdown-label').text($(this).find('span').text())
        $.ajax({
            url: "{{route('sort')}}",
            type: "GET",
            data: {
                orderBy: orderBy
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: (data) => {
                let positionParameters = location.pathname.indexOf('?');
                let url = location.pathname.substring(positionParameters, location.pathname.length);
                let newURL = url + '?';
                newURL += 'orderBy=' + orderBy;
                history.pushState({}, '', newURL);

                $('.main-panel').html(data)
            },
        })
    })
})

document.addEventListener('DOMContentLoaded', function () {
    var dropdown = document.querySelector('.dropdown');
    var dropdownMenu = dropdown.querySelector('.dropdown-menu');

    dropdown.addEventListener('click', function () {
        dropdown.classList.toggle('open');
    });

    dropdownMenu.addEventListener('click', function (e) {
        var target = e.target;
        if (target.classList.contains('sorting-btn')) {
            var order = target.getAttribute('data-order');
            console.log('Выбрано значение:', order);
            dropdown.classList.toggle('open');
        }
    });
});
