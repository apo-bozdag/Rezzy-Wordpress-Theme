(function() {
  tinymce.PluginManager.add('rc_button', function(editor, url) {
    editor.addButton('rc_button', {
      title: 'İlgili Haber',
      image: url + '/resim/ilgili-icon.png',
      onclick: function() {
        editor.windowManager.open({
          title: 'İlgili Haber',
          //width: 600,
          //height: 100,
          body: [ //{
            //type: 'textbox',
            //name: 'perma',
            //label: 'Link',
            //tooltip: 'https://ogulcanozugenc.com/',
            //value: ''
            //}, 
            {
              type: 'listbox',
              name: 'id',
              label: 'Yazı:',
              'values': tinyMCE.DOM.rc_list
            }
          ],
          onsubmit: function(e) {
            editor.insertContent('[ilgili id="' + e.data.id + '"]');
          }
        });
      },
    });
  });
})();