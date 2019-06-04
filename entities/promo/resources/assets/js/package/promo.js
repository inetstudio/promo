let promo = {};

promo.init = function () {
    $(document).ready(function () {
        let $checkbox = $('form #is_main');
        let $mainElements = $('.is-main');

        $checkbox.on('ifClicked', function () {
            if ($checkbox.is(':checked')) {
                $mainElements.hide();
            } else {
                $mainElements.show();
            }
        });

       if (! $checkbox.is(':checked')) {
           $mainElements.hide();
       }
    });
};

module.exports = promo;
