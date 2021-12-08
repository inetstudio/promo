import Swal from 'sweetalert2';

window.tinymce.PluginManager.add('promo', function(editor) {
  let widgetData = {
    widget: {
      events: {
        widgetSaved: function(model) {
          editor.execCommand(
              'mceReplaceContent',
              false,
              '<img class="content-widget" data-type="promo" data-id="' + model.id + '" alt="Виджет-промо: '+model.additional_info.title+'" />',
          );
        }
      }
    }
  };

  function loadWidget() {
    let component = window.Admin.vue.helpers.getVueComponent('promo-package', 'PromoWidget');

    component.$data.model.id = widgetData.model.id;
  }

  editor.addButton('add_promo_widget', {
    title: 'Промо',
    icon: 'fa fa-percent',
    onclick: function() {
      editor.focus();

      let content = editor.selection.getContent();
      let isPromo = /<img class="content-widget".+data-type="promo".+>/g.test(content);

      if (content === '' || isPromo) {
        widgetData.model = {
          id: parseInt($(content).attr('data-id')) || 0,
        };

        window.Admin.vue.helpers.initComponent('promo-package', 'PromoWidget', widgetData);

        window.waitForElement('#add_promo_widget_modal', function() {
          loadWidget();

          $('#add_promo_widget_modal').modal();
        });
      } else {
        Swal.fire({
          title: 'Ошибка',
          text: 'Необходимо выбрать виджет-промо',
          icon: 'error',
        });

        return false;
      }
    }
  });
});
