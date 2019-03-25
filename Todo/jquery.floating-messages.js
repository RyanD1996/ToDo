/*!
 * Floating Messages jQuery Plugin
 * Plugin to show simple floating messages using JavaScript.
 *
 * @version 1.0.0
 * @copyright 2016, Daniel David Duarte <danieldd.ar@gmail.com>
 * @license MIT (https://opensource.org/licenses/MIT)
 */

/**globals jQuery*/

if (typeof jQuery === 'undefined') {
    throw new Error("Floating Messages jQuery Plugin needs jQuery to be loaded before.");
}

(function ($) {
    "use strict";
    $(function () {

        var containerElem = null;

        var init = function () {
            var bodyElem = $("body");

            if (bodyElem.length === 0) {
                throw new Error("'body' element not found. Could not initialize Floating Messages jQuery Plugin.");
            }

            if (bodyElem.length > 1) {
                bodyElem = $(bodyElem[0]);
            }

            if ($("#floating-messages-container").length > 0) {
                containerElem = $($("#floating-messages-container")[0]);
            } else {
                containerElem = $('<div id="floating-messages-container"></div>');
                bodyElem.append(containerElem);
            }

            $(document).on('click', '.floating-message >.floating-message-close', function () {
                var msgElem = $(this).parent();
                removeMessage(msgElem, 200);
            });
        };

        var removeMessage = function (msgElem, duration) {
            msgElem.fadeOut(duration, function () {
                msgElem.remove();
            });
        };

        $.showMessage = function (type, message) {
            var msgElem = $('<div class="floating-message ' + type + '" style="display: none;"><span class="floating-message-icon"></span><span class="floating-message-close">&#x2716;</span>' + message + '</div>');
            containerElem.append(msgElem);
            msgElem.fadeIn();
            setTimeout(function () {
                removeMessage(msgElem, 500);
            }, 10000);
        };

        $.showInfo = function (message) {
            $.showMessage('info', message);
        };

        $.showWarning = function (message) {
            $.showMessage('warning', message);
        };

        $.showError = function (message) {
            $.showMessage('error', message);
        };

        init();
    });
}(jQuery));
