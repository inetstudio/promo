window.Admin.vue.stores['promo-package_promo'] = new Vuex.Store({
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
      emptyPromo.model.id = UUID.generate();

      let resultPromo = _.merge(emptyPromo, promo);
      resultPromo.hash = window.hash(resultPromo.model);

      state.promo = resultPromo;
    },
    setMode(state, mode) {
      state.mode = mode;
    }
  }
});
