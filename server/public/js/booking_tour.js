const decrementButton = document.getElementById('decrementButton')
const incrementButton = document.getElementById('incrementButton')
const childDecrementButton = document.getElementById('childDecrementButton')
const childIncrementButton = document.getElementById('childIncrementButton')


//Обработчик для бронирования билетов "Взрослые"
const divElement = document.querySelector('.quantity');
const priceElement = document.querySelector('.ticket_price')
const sumElement = document.querySelector('.ticket_sum');


let count = 0;
let price_string = priceElement.textContent;
let price = parseInt(price_string);

let sum_string = sumElement.textContent;
let sum = parseInt(sum_string);

//обработчик событий для кнопки "минус"
decrementButton.addEventListener('click', () => {
    if (count > 0) {
        count--;
        sum = sum - price;
        sumElement.textContent = sum + " " + "BYN";
        divElement.textContent = count;
    }
})

//обработчик событий для кнопки "плюс"
incrementButton.addEventListener('click', () => {
    count++;
    sum = sum + price;
    sumElement.textContent = sum + " " + "BYN";
    divElement.textContent = count;
})


//Обработчик для бронирования билетов "Детский"
const inputElement = document.querySelector('.child_quantity');
const childPriceElement = document.querySelector('.child_ticket_price')
const childSumElement = document.querySelector('.child_ticket_sum');


let child_count = 0;
let child_price_string = childPriceElement.textContent;
let child_price = parseInt(child_price_string);

let child_sum_string = childSumElement.textContent;
let child_sum = parseInt(child_sum_string);

//обработчик событий для кнопки "минус"
childDecrementButton.addEventListener('click', () => {
    if (child_count > 0) {
        child_count--;
        child_sum = child_sum - child_price;
        childSumElement.textContent = child_sum + " " + "BYN";
        inputElement.textContent = child_count;
    }
})

//обработчик событий для кнопки "плюс"
childIncrementButton.addEventListener('click', () => {
    child_count++;
    child_sum = child_sum + child_price;
    childSumElement.textContent = child_sum + " " + "BYN";
    inputElement.textContent = child_count;
})


$("#form").on("submit", function (event) {
    let amount = child_sum + sum;
    window.location.href = "/payment?amount=" + amount;
    event.preventDefault();
    // const places = count + child_count;
    // const token = $('meta[name="csrf-token"]').attr('content');
    // const urlParams = new URLSearchParams(window.location.search);
    // const id = urlParams.get('id');
    // let test = $('.places') - places;
    //
    // $.ajax({
    //     url: '/booking',
    //     method: 'post',
    //     dataType: 'html',
    //     data: {
    //         places: places,
    //         id: id,
    //         _token: token
    //     },
    //     success: function (data) {
    //         if (data.status === 'success') {
    //             // Отобразить сообщение об успешном бронировании
    //             alert(data.message);
    //         } else if (data.status === 'error') {
    //             // Отобразить сообщение об ошибке бронирования на странице
    //             $('.success-message').text(data.message).show();
    //         }
    //     },
    //     error: function (xhr, status, error) {
    //         // Вывести сообщение об ошибке в консоль
    //         console.log(error);
    //         // Отобразить сообщение об ошибке на странице
    //         $('.error-message').text('Произошла ошибка: ' + error).show();
    //     }
    // });
});

