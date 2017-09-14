var users = {
        __proto__: data_proto,
        api_url_form: '/api/users/form/',
        api_url_settings: '/api/users/settings/',
        api_url_save: '/api/users/save',
        api_url_info: '/api/users/info',
        api_url_drop: '/api/users/drop/',
        arr: [],
        tagname: "users_data",
        add_tagname: "users_add_data",
        update_tagname: "users_upd_data",

        arr: [],

        open_form: function (id) {
                var self = this;
                this.send('GET', null, this.api_url_form + (id ? id : ''), null, null, function (data, elem) {
                        var obj = self;
                        obj.open_form_modal(data, elem);
                });
        },

        open_settings: function (id) {
                var self = this;
                this.send('GET', null, this.api_url_form + id, null, null, function (data, elem) {
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