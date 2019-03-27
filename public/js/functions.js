$(document).ready(function () {
    $('.countdown').downCount({
        date: '04/27/2019 12:00:00',
        offset: -5
    }, function () {
        alert('WOOT WOOT, done!');
    });
});