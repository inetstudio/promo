require('./plugins/tinymce/plugins/promo');

require('../../../../../../widgets/entities/widgets/resources/assets/js/mixins/widget');

require('./stores/promo');

window.Vue.component(
    'PromoWidget',
    () => import('./components/partials/PromoWidget/PromoWidget.vue'),
);

let promo = require('./package/promo');
promo.init();
