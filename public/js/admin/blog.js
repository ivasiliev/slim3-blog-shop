var blog = {
        __proto__: data_proto,
        api_url_create: '/api/blog/save',
        api_url_update: '/api/blog/update',
        api_url_info: '/api/blog/info',
        api_url_drop: '/api/blog/drop',

        api_url_categories_form: '/api/blog/categories/form/',
        api_url_categories_save: '/api/blog/categories/save',
        api_url_categories_info: '/api/blog/categories/info',
        api_url_categories_drop: '/api/blog/categories/drop/',

        arr: [],

        showCategories: function (elem) {
                if (elem) {
                        menu_action(elem);
                }
                this.send('GET', null, this.api_url_categories_info, this.get_subcontent_elem());
                return this;
        },

        open_create: function () {
                var self = this;
                this.send('GET', null, this.api_url_categories_form, null, null, function (data, elem) {
                        var obj = self;
                        obj.open_create_modal(data, elem);
                });
        },

        open_create_modal: function (data, elem) {
                modal.show(data);
        },

        category_save: function (elem) {
                var cont = elem.parentNode.parentNode;
                if (elem) {
                        menu_action(elem);
                }
                this.send('POST', this.create_reqdata(cont), this.api_url_categories_save, this.get_subcontent_elem(), cont);
                return this;
        }


};