$(document).ready(function () {
    fix_spell = function (data) {
        data.forEach(function (texts) {
            $('#user_trip').val(
                $('#user_trip').val().replace(
                    texts['word'],
                    texts['s'][0] || texts['word']
                )
            );
        });
    }
});
document.addEventListener('keydown', function (e) {
    if ((e.keyCode == 32) || (e.keyCode == 13)) {
        var lines = $('#user_trip').val().replace(/\r\n|\n\r|\n|\r/g, "\n").split("\n");
        lines.forEach(function (line) {
            if (line.length) {
                $.getScript('http://speller.yandex.net/services/spellservice.json/checkText?text=' + line + '&callback=fix_spell');
            }
        });
    }
});