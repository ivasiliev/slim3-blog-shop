var blog = {
        __proto__: data_proto,

        api_url_form: '/api/blog/form/',
        api_url_save: '/api/blog/save',
        api_url_info: '/api/blog/info',
        api_url_drop: '/api/blog/drop/',

        arr: [],

        open_form: function (id) {
                var self = this;
                this.send('GET', null, this.api_url_form + (id ? id : ''), null, null, function (data, elem) {
                        var obj = self;
                        obj.open_form_modal(data, elem);
                });
        },

        open_form_modal: function (data, elem) {
                modal.show(data);
        },

        save: function (elem) {
                var cont = elem.parentNode.parentNode;
                if (elem) {
                        menu_action(elem);
                }
                var form = this.create_reqdata(cont);
                if (form) {
                        this.send('POST', form, this.api_url_save, this.get_subcontent_elem(), cont);
                }
        },

        drop: function (id) {
                if (confirm("Вы уверены в удалении?")) {
                        this.send('GET', null, this.api_url_drop + id, this.get_subcontent_elem());
                }
        }
};

var category = {
        __proto__: blog,

        api_url_form: '/api/blog/categories/form/',
        api_url_save: '/api/blog/categories/save',
        api_url_info: '/api/blog/categories/info',
        api_url_drop: '/api/blog/categories/drop/',

        arr: [],

        show: function (elem) {
                if (elem) {
                        menu_action(elem);
                }
                this.send('GET', null, this.api_url_info, this.get_subcontent_elem());
                return this;
        }
};

var posts = {
        __proto__: blog,

        api_url_form: '/api/blog/posts/form/',
        api_url_save: '/api/blog/posts/save',
        api_url_info: '/api/blog/posts/info',
        api_url_drop: '/api/blog/posts/drop/',

        arr: [],

        show: function (elem) {
                if (elem) {
                        menu_action(elem);
                }
                this.send('GET', null, this.api_url_info, this.get_subcontent_elem());
                return this;
        },

        open_form_modal: function (data, elem) {
                var self = this;
                modal.show(data, true, function () {
                        var obj = self;
                        var main_photo = document.querySelector('[formelem="main_photo"]');
                        if (main_photo) {
                                main_photo.innerHTML = file_img.create_load_elem('Главное изображение', obj.tagname + '="main_photo"', null, false);
                        }

                        if (typeof tinymce !== 'undefined') {
                                var params = {
                                        selector: '',
                                        height: 500,
                                        plugins: 'lists advlist image imagetools code textcolor',
                                        toolbar: 'undo redo | fontsizeselect forecolor backcolor | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist | image | code | preview',
                                        menubar: false,
                                        gecko_spellcheck: true,
                                        toolbar_items_size: 'small',
                                        document_base_url: 'http://5.u0138138.z8.ru/userimgs/',
                                        relative_urls: false,
                                        remove_script_host: false,
                                        //convert_urls: false,
                                        setup: function (editor) {
                                                editor.on("change keyup", function (e) {
                                                        //console.log('saving');
                                                        //tinyMCE.triggerSave(); // updates all instances
                                                        editor.save(); // updates this instance's textarea
                                                        $(editor.getElement()).trigger('change'); // for garlic to detect change
                                                });
                                        }
                                };

                                params.selector = '[' + obj.tagname + '="main_content"]';
                                tinymce.init(params);
                        }
                });
        }
};