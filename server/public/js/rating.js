const ratings = $('.rating');
if (ratings.length > 0) {
    initRatings();
}

//Основная функция
function initRatings() {
    let ratingActive, ratingValue;
    //бегаем по всем рейтингам на странице
    for (let index = 0; index < ratings.length; index++) {
        const rating = ratings[index];
        initRating(rating);
    }

    //Инициализируем конкретный рейтинг
    function initRating(rating) {

        initRatingVars(rating);
        setRatingActiveWidth();
    }

    //Инициализируем переменных
    function initRatingVars(rating) {
        ratingActive = rating.querySelector('.rating_active');
        ratingValue = rating.querySelector('.rating_value')
    }

    //Изменяем ширину активных звезд
    function setRatingActiveWidth(index = ratingValue.innerHTML) {
        const ratingActiveWidth = index / 0.05;
        ratingActive.style.width = `${ratingActiveWidth}%`;
    }
}

