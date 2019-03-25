(function ($) {
    "use strict";
    $(function () {

        $('#btn-info').on('click', function () {
            $.showInfo('This is an information message.');
        });

        $('#btn-warning').on('click', function () {
            $.showWarning('I am a warning...');
        });

        $('#btn-error').on('click', function () {
            $.showError('Hey, error here!');
        });

        $.showInfo('This is an information message.');
        $.showWarning('I am a warning...');
        $.showError('Hey, error here!');
        $.showError('Hey, error here!');
        $.showWarning('I am a warning...');
        $.showError('Hey, error here!');
        $.showInfo('This is a very very long long long long long long long message with a lot of text on it and also including some <strong>html</strong> tags on <em>it</em>.');

    });
}(jQuery));
