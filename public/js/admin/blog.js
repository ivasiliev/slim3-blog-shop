var blog = {
        __proto__: data_proto,

        api_url_form: '/api/blog/form/',
        api_url_save: '/api/blog/save',
        api_url_info: '/api/blog/info',
        api_url_drop: '/api/blog/drop/',

        arr: [],

        show: function (elem) {
                if (elem) {
                        menu_action(elem);
                }
                this.send('GET', null, this.api_url_info, this.get_subcontent_elem());
                return this;
        },

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
                this.send('GET', null, this.api_url_drop + id, this.get_subcontent_elem());
                return this;
        }
};

var category = {
        __proto__: data_proto,

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
        },

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
                this.send('GET', null, this.api_url_drop + id, this.get_subcontent_elem());
                return this;
        }
};