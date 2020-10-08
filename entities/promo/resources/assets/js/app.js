require('./plugins/tinymce/plugins/promo');

require('../../../../../../widgets/entities/widgets/resources/assets/js/mixins/widget');

require('./stores/promo');

Vue.component(
    'PromoWidget',
    require('./components/partials/PromoWidget/PromoWidget.vue').default,
);

let promo = require('./package/promo');
promo.init();
