import hash from 'object-hash';
import { v4 as uuidv4 } from 'uuid';

window.Admin.vue.stores['promo-package_promo'] = new window.Vuex.Store({
  state: {
    emptyPromo: {
      model: {
        is_main: 0,
        title: '',
        description: '',
        href: '',
        promo_code: '',
        date_start: null,
        date_end: null,
        created_at: null,
        updated_at: null,
        deleted_at: null,
      },
      isModified: false,
      hash: '',
    },
    promo: {},
    mode: '',
  },
  mutations: {
    setPromo(state, promo) {
      let emptyPromo = JSON.parse(JSON.stringify(state.emptyPromo));
      emptyPromo.model.id = uuidv4();

      let resultPromo = _.merge(emptyPromo, promo);
      resultPromo.hash = hash(resultPromo.model);

      state.promo = resultPromo;
    },
    setMode(state, mode) {
      state.mode = mode;
    }
  }
});
