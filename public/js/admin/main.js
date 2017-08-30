function menu_action(elem) {
        var arr = elem.parentNode.querySelectorAll('.active');
        for (var x = 0; x < arr.length; x++) {
                arr[x].classList.remove('active');
        }
        elem.classList.add('active');
}

var loader = {
        show: function (main) {
                var cont = document.createElement('div');
                cont.className = "loader" + (main ? ' main' : '');
                cont.innerHTML = '<div class="helper"></div><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>';

                cont.setAttribute('style', 'opacity: 0');

                document.body.appendChild(cont);
                setTimeout(function () {
                        var elem = cont;
                        elem.setAttribute('style', '');
                }, 20);
        },
        remove: function () {
                var cont = document.querySelector('.loader');
                if (cont) {
                        cont.setAttribute('style', 'opacity: 0');
                        setTimeout(function () {
                                var cont = document.querySelector('.loader');
                                cont.parentNode.removeChild(cont);
                        }, 250);
                }
        }
};

var load_imgs = {
        init: function (arr) {
                if (!arr) {
                        arr = document.querySelectorAll('[data-img]');
                }
                for (var x = 0; x < arr.length; x++) {
                        this._req(arr[x]);
                }
        },
        _req: function (elem) {
                elem.setAttribute('style', 'opacity: 0');

                var cw = this._get_cw(elem.clientWidth);

                var fileinfo = elem.getAttribute('data-img').split('.');
                var curr_src = '/css/photo/' + fileinfo[0] + cw + '.' + fileinfo[1];

                var imgBg = new Image();
                imgBg.onload = function () {
                        var target = elem;
                        target.setAttribute('style', "background-image: url('" + this.src + "'); transition: opacity 0.25s ease-in;");
                };
                elem.onclick = function (e) {
                        if (e.target === this) {
                                var fileinfo = this.getAttribute('data-img').split('.');
                                var cw = load_imgs._get_cw(document.body.clientWidth);
                                var curr_src = '/css/photo/' + fileinfo[0] + cw + '.' + fileinfo[1];
                                modal.show_img(curr_src, fileinfo[0]);
                        }
                };
                imgBg.src = curr_src;
        },
        _get_cw: function (width) {
                var cw = '_1920';
                switch (true) {
                        case width >= 1920:
                                cw = '';
                                break;
                        case width < 1920 && width >= 1200:
                                cw = '_1920';
                                break;
                        case width < 1200 && width >= 1000:
                                cw = '_1200';
                                break;
                        case width < 1000 && width >= 768:
                                cw = '_1000';
                                break;
                        case width < 768 && width >= 600:
                                cw = '_768';
                                break;
                        case width < 600 && width >= 480:
                                cw = '_600';
                                break;
                        default:
                                cw = '_480';
                                break;
                }
                return cw;
        }
};

var modal = {
        show: function (content, big_content, func) {
                var cont = this.__create_modal();
                cont.setAttribute('style', 'opacity: 0;');
                document.body.appendChild(cont);

                var content_block = cont.querySelector('div.modal_content');
                big_content ? content_block.classList.add('big') : content_block.classList.remove('big');

                content ? content_block.innerHTML = content : false;

                var close_but = cont.querySelector('div.modal_close_but');
                if (close_but) {
                        close_but.onclick = function () {
                                var elem = cont;
                                modal.remove(elem);
                        };
                }

                document.body.appendChild(cont);

                func ? func() : false;

                setTimeout(function (obj) {
                        obj.setAttribute('style', '');
                }, 20, cont);
        },
        show_img: function (src, id) {
                if (!src) {
                        return false;
                }

                var cont = this.__create_modal(true);
                cont.setAttribute('style', 'opacity: 0;');
                document.body.appendChild(cont);

                var loader = document.createElement('div');
                loader.className = 'loader';
                loader.innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>';
                cont.appendChild(loader);

                var helper = document.createElement('div');
                helper.className = 'helper';
                cont.appendChild(helper);

                document.body.appendChild(cont);

                setTimeout(function (obj) {
                        obj.setAttribute('style', '');
                        modal.__show_img_send(id, obj, src);
                }, 20, cont, src, id);
        },
        __show_img_with_txt: function (cont, src, data) {

                if (!(cont && src)) {
                        modal.remove();
                        return false;
                }

                var loader = document.querySelector('.loader');
                if (loader && loader.parentNode) {
                        loader.parentNode.removeChild(loader);
                }

                var img_preview = document.createElement('div');
                img_preview.className = 'img_preview_container';

                var str = '<div class="img_preview_cont">';
                str += '<div class="loader"><div class="helper"></div><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>'; // loader
                str += '<img class="modal_img_view" src="">';
                str += '<div class="helper"></div>';
                str += '</div>';

                // controls, title, description container
                str += '<div class="img_preview_box">';
                // close button
                str += '<div class="img_preview_close"><i class="fa fa-times"></i></div>';
                // slide prev/next
                str += '<div class="img_preview_prev" onclick="modal.show_prev_img(\'' + data.url + '\', this)"><i class="fa fa-chevron-left"></i></div>';
                str += '<div class="img_preview_next" onclick="modal.show_next_img(\'' + data.url + '\', this)"><i class="fa fa-chevron-right"></i></div>';

                str += '<div class="img_preview_title">' + (data && data.title ? data.title : '') + '</div>';
                str += '<div class="img_preview_descr">' + (data && data.txt ? data.txt : '') + '</div>';
                str += '</div>';

                img_preview.innerHTML = str;

                cont.appendChild(img_preview);

                var img = img_preview.querySelector('.modal_img_view');
                img.setAttribute('style', 'opacity: 0;');
                img.onload = function () {
                        var loaders = document.querySelectorAll('.loader');
                        for (var x = 0; x < loaders.length; x++) {
                                loaders[x].parentNode.removeChild(loaders[x]);
                        }
                        this.setAttribute('style', '');
                };

                var close_but = cont.querySelector('div.img_preview_close');
                if (close_but) {
                        close_but.onclick = function () {
                                var elem = cont;
                                modal.remove(elem);
                        };
                }

                img.src = src;
        },
        __show_img_send: function (id, cont, src) {
                var xhr = new XMLHttpRequest();
                var backend = '/api/img/imgdata/info/';
                xhr.open('GET', backend + id, true);
                xhr.onload = xhr.onerror = function () {
                        if (Number(this.status) === 200) {
                                var data = JSON.parse(this.responseText);
                                if (data[0] === false) {
                                        alert('error answer');
                                        return false;
                                }
                        } else {
                                console.log("error " + this.status);
                                alert('error request: ' + this.status);
                        }
                        modal.__show_img_with_txt(cont, src, data.content);
                };
                xhr.send();
        },
        __create_modal: function (without_content) {
                var self = this;
                var cont = document.createElement('div');
                cont.className = 'modal_cont';

                var shadow = document.createElement('div');
                shadow.className = 'modal_shadow';

                if (!without_content) {
                        cont.innerHTML = '<div class="helper"></div><div class="modal_content">';
                }

                cont.appendChild(shadow);

                shadow.onclick = function () {
                        self.remove(this.parentNode);
                };

                return cont;
        },
        show_prev_img: function (url, elem) {
                var arr = document.querySelectorAll('div.container [data-img]');

                var curr = null;
                if (arr.length > 0) {
                        for (var x = 0; x < arr.length; x++) {
                                if (arr[x].getAttribute('data-img') === url) {
                                        curr = x > 0 ? arr[x - 1].getAttribute('data-img') : arr[arr.length - 1].getAttribute('data-img');
                                        if (curr !== url) {
                                                break;
                                        }
                                }
                        }

                        curr = curr ? curr : arr[0].getAttribute('data-img');

                        var fileinfo = curr.split('.');
                        var cw = load_imgs._get_cw(document.body.clientWidth);
                        var curr_src = '/css/photo/' + fileinfo[0] + cw + '.' + fileinfo[1];
                        modal.show_img(curr_src, fileinfo[0]);
                        // remove previous img preview cont
                        elem.parentNode.querySelector('div.img_preview_close').onclick();
                }
        },
        show_next_img: function (url, elem) {
                var arr = document.querySelectorAll('div.container [data-img]');

                var curr = null;
                if (arr.length > 0) {
                        for (var x = 0; x < arr.length; x++) {
                                if (arr[x].getAttribute('data-img') === url) {
                                        curr = (x === (arr.length - 1)) ? arr[0].getAttribute('data-img') : arr[x + 1].getAttribute('data-img');
                                        if (curr !== url) {
                                                break;
                                        }
                                }
                        }

                        curr = curr ? curr : arr[0].getAttribute('data-img');

                        var fileinfo = curr.split('.');
                        var cw = load_imgs._get_cw(document.body.clientWidth);
                        var curr_src = '/css/photo/' + fileinfo[0] + cw + '.' + fileinfo[1];
                        modal.show_img(curr_src, fileinfo[0]);
                        // remove previous img preview cont
                        elem.parentNode.querySelector('div.img_preview_close').onclick();
                }
        },
        remove: function (cont) {
                if (!(cont && cont.parentNode)) {
                        return false;
                }
                cont.setAttribute('style', 'opacity: 0');

                setTimeout(function (obj) {
                        obj.parentNode.removeChild(obj);
                }, 300, cont);
        }
};

var file_img = {
        api_url_create: '/api/img/save',
        api_url_info: '/api/img/get?img=',
        api_url_drop: '/api/img/drop',
        uploaded_preview_target: '.uploaded_photo_preview',
        create_load_elem: function (title, target_tag, params, multi) {
                var file_tags = this._file_tags(params);
                var str = '';
                str += '<div class="inputs_cont img_elem" style="width: 100%;"' + (multi ? ' multi="yes"' : '') + '>';
                str += '<span>' + title + '</span>';
                str += '<input type="file" onchange="file_img.upload(this);"' + (multi ? ' multiple' : '') + ' accept="image/jpeg, image/png"' + file_tags + '>';
                str += '<div class="titles img_upload_main"><div class="helper"></div><div>Выберите файл...</div></div>';
                str += '<div class="titles img_upload_load"><div class="helper"></div><div>Загрузка...</div></div>';
                str += '<div class="titles img_upload_success"><div class="helper"></div><div>Готово! Файл успешно загружен.</div></div>';
                str += '<div class="img_upload_preview"></div>';
                str += '<input type="hidden" ' + target_tag + '>';
                str += '</div>';
                return str;
        },
        _file_tags: function (params) {
                if (!params) {
                        return '';
                }
                var str = '';
                if (params.hasOwnProperty('crop') && params.crop) {
                        str += ' crop="1"';
                }
                if (params.hasOwnProperty('square') && params.square) {
                        str += ' square="1"';
                }
                if (params.hasOwnProperty('min_width') && params.min_width) {
                        str += ' min_width="' + params.min_width + '"';
                }
                return str;
        },
        upload: function (elem) {
                var uploadErrors = [];

                if (elem.files.length === 0) {
                        return;
                }

                for (var x = 0; x < elem.files.length; x++) {
                        var fName = elem.files[x]["name"];
                        if (fName.length && !fName.toLowerCase().match(/(png|jpg|jpeg)$/g)) {
                                uploadErrors.push('Неподходящий тип файла');
                        }
                        if (elem.getAttribute("max-size"))
                        {
                                if (elem.files[x]['size'].length && elem.files[x]['size'] > 5000000) {
                                        uploadErrors.push('Слишком большой файл');
                                }
                        }
                        if (elem.getAttribute("min-size"))
                        {
                                if (elem.files[x]['size'].length && elem.files[x]['size'] < 100) {
                                        uploadErrors.push('Слишком маленький файл');
                                }
                        }
                        if (uploadErrors.length > 0) {
                                this.showAlert(elem, uploadErrors.join("\n"), "Ошибка загрузки");
                        } else {
                                this.send('POST', this.form(elem, elem.files[x]), this.api_url_create, elem.parentNode);
                        }
                }
        },
        showAlert: function (elem, arr, str) {
                console.log(arr);
        },
        form: function (elem, file) {
                var form = new FormData();
                form.append('file', file);
                if (elem.getAttribute('c_width')) {
                        form.append('width', elem.getAttribute('c_width'));
                }
                if (elem.getAttribute('c_height')) {
                        form.append('height', elem.getAttribute('c_height'));
                }
                if (elem.getAttribute('crop')) {
                        form.append('crop', elem.getAttribute('crop'));
                }
                if (elem.getAttribute('square')) {
                        form.append('square', elem.getAttribute('square'));
                }
                if (elem.getAttribute('min_width')) {
                        form.append('min_width', elem.getAttribute('min_width'));
                }
                return form;
        },
        send: function (method, form, backend, elem, func) {
                var self = this;
                var xhr = new XMLHttpRequest();
                xhr.open(method, backend, true);
                xhr.onload = xhr.onerror = function () {
                        loader.remove();
                        elem ? elem.classList.remove('error') : false;
                        if (Number(this.status) === 200) {
                                var data = JSON.parse(this.responseText);
                                if (data[0] === false) {
                                        elem.classList.add('error');
                                        alert('error answer');
                                        return false;
                                }
                        } else {
                                elem ? elem.classList.add('error') : false;
                                console.log("error " + this.status);
                                alert('error request: ' + this.status);
                        }
                        elem ? elem.classList.add('success') : false;

                        if (func) {
                                func(data);
                        } else {
                                self.send_after(data, elem);
                        }
                };
                loader.show();
                xhr.send(form);
                if (elem) {
                        elem.classList.remove('success');
                        elem.classList.remove('error');
                        elem.classList.contains('loading') ? true : elem.classList.add('loading');
                }
        },
        send_after: function (data, elem) {
                console.log(data);
                var multi = elem.getAttribute('multi');
                var input = elem.querySelector('input[type="hidden"]');
                if (this.uploaded_preview_target) {
                        var img_preview_cont = document.querySelector(this.uploaded_preview_target);
                } else {
                        var img_preview_cont = elem.querySelector('.img_upload_preview');
                }

                if (multi) {
                        input.value = input.value === '' ? data.file : input.value + ',' + data.file;


                } else {
                        input.value = data.file;
                        img_preview_cont.innerHTML = '';
                }

                if (img_preview_cont) {
                        var img_preview = document.createElement('div');
                        img_preview.className = 'img_elem_show';
                        img_preview.setAttribute('data-img', data.file);
                        img_preview_cont.appendChild(img_preview);

                        load_imgs.init([img_preview]);


                        /*
                         var img_preview = new Image();
                         img_preview.setAttribute('style', 'opacity: 0;');
                         img_preview.src = this.api_url_info + data.file;
                         img_preview.onload = function () {
                         this.setAttribute('style', 'opacity: 1;');
                         };
                         img_preview.onclick = function () {
                         modal.show_img(this.src);
                         };
                         
                         img_preview_cont.appendChild(img_preview);
                         */
                }
        },
        drop_init: function (elem) {
                var arr = document.querySelectorAll('[data-img]');
                for (var x = 0; x < arr.length; x++) {
                        arr[x].innerHTML += '<input type="checkbox" drop_photo="check" />';
                }
                elem.querySelector('button[drop_photo="open"]').setAttribute('style', 'display: none;');
                elem.querySelector('button[drop_photo="cancel"]').setAttribute('style', 'display: inline-block;');
                elem.querySelector('button[drop_photo="drop"]').setAttribute('style', 'display: inline-block;');

        },
        drop_cancel: function (elem) {
                var arr = document.querySelectorAll('[drop_photo="check"]');
                for (var x = 0; x < arr.length; x++) {
                        arr[x].parentNode.removeChild(arr[x]);
                }
                elem.querySelector('button[drop_photo="open"]').setAttribute('style', 'display: inline-block;');
                elem.querySelector('button[drop_photo="cancel"]').setAttribute('style', 'display: none;');
                elem.querySelector('button[drop_photo="drop"]').setAttribute('style', 'display: none;');

        },
        drop_send: function () {
                var arr = document.querySelectorAll('[drop_photo="check"]');
                var list = Array();
                for (var x = 0; x < arr.length; x++) {
                        arr[x].checked ? list.push(arr[x].parentNode.getAttribute('data-img')) : false;
                }

                var form = new FormData();
                form.append('list', JSON.stringify(list));
                this.send('POST', form, this.api_url_drop, null, file_img.drop_after);
        },
        drop_after: function (data) {
                var elem = null;
                for (var key in data) {
                        if (!(data.hasOwnProperty(key) && data[key])) {
                                continue;
                        }
                        elem = document.querySelector('[data-img="' + key + '"]');
                        if (elem && elem.parentNode) {
                                elem.parentNode.removeChild(elem);
                        }
                }
                file_img.drop_cancel(document.querySelector('[drop_photo="open"]').parentNode);
        }
};

var data_proto = {
        api_url_create: '',
        api_url_info: '',
        api_url_drop: '',
        arr: [],
        add_tagname: "",
        list_cont_path: '.admin_content',
        list_subcont_path: '.admin_content .content',
        first: true,

        show: function (elem) {
                if (elem) {
                        menu_action(elem);
                }
                this.send('GET', null, this.api_url_info);
                return this;
        },

        create: function () {
                this.send('POST', this.create_reqdata(this.add_tagname), this.api_url_create, false, this.get_modal(this.add_tagname));
        },

        create_reqdata: function (tagname) {
                var cont = document.querySelector('div.modal_inputs[' + tagname + '="cont"]');
                if (!cont) {
                        return false;
                }

                var form = new FormData();
                form.append('id_version', document.querySelector('input[user="id_version"]').value);

                var arr = cont.querySelectorAll('[' + tagname + ']');
                var value = null;
                var error_flag = false;
                var error_f = null;
                for (var x = 0; x < arr.length; x++) {
                        if (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file') {
                                value = arr[x].file[0];
                        } else if (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'checkbox') {
                                value = arr[x].checked;
                        } else {
                                value = arr[x].value;
                        }
                        if (arr[x].getAttribute('data-required') && !(value && value.trim())) {
                                error_flag = true;
                                if (!error_f) {
                                        error_f = 1;
                                        arr[x].parentNode.scrollIntoView();
                                }
                                arr[x].parentNode.setAttribute('style', 'border-color: red;');
                                arr[x].parentNode.querySelector('.error_txt') ? true : arr[x].parentNode.appendChild(this.error_elem('Это обязательное поле'));
                        } else {
                                var error_elem = arr[x].parentNode.querySelector('.error_txt');
                                error_elem ? error_elem.parentNode.removeChild(error_elem) : true;
                                arr[x].parentNode.setAttribute('style', '');
                        }
                        form.append(arr[x].getAttribute(tagname), value);
                }
                if (error_flag) {
                        return false;
                }
                return form;
        },

        get_modal: function (tagname) {
                var cont = document.querySelector('div.modal_inputs[' + tagname + '="cont"]');
                if (!cont) {
                        return false;
                }
                if (!(cont.parentNode && cont.parentNode.parentNode)) {
                        return false;
                }

                return cont.parentNode.parentNode;
        },
        
        get_subcontent_elem: function(){
                return document.querySelector(this.list_subcont_path);
        },

        send: function (method, form, backend, cont, modal_elem, func) {
                var self = this;
                loader.show();
                this.last_formdata = form;
                var xhr = new XMLHttpRequest();
                xhr.open(method, backend, true);
                xhr.onload = xhr.onerror = function () {
                        console.log(this.getResponseHeader('content-type'));
                        loader.remove();
                        if (Number(this.status) === 200) {
                                /*
                                 var data = JSON.parse(this.responseText);
                                 if (data[0] === false) {
                                 alert('error answer');
                                 loader.remove();
                                 return false;
                                 }*/
                                var data = this.responseText;
                        } else {
                                console.log("error " + this.status);
                                alert('error request: ' + this.status);
                        }

                        if (func) {
                                func(data, cont);
                        } else {
                                self.send_after(data, cont);
                        }
                        modal.remove(modal_elem);
                };
                xhr.send(form);
        },

        send_after: function (data, cont) {
                this.render(data, cont);
        },
        render: function (data, cont) {
                console.log(data);
                if (!cont) {
                        cont = document.querySelector(this.list_cont_path);
                }
                cont.innerHTML = data;
        },
        get_curr_data: function (id) {
                for (var x = 0; x < this.arr.length; x++) {
                        if (this.arr[x].id === Number(id)) {
                                return this.arr[x];
                        }
                }
                return null;
        },
        error_elem: function (txt) {
                var cont = document.createElement('div');
                cont.className = 'error_txt';
                cont.innerHTML = txt;
                return cont;
        },
        drop: function (elem) {
                var id_version = elem.getAttribute('item');
                var self = this;
                this.send('GET', '', this.api_url_drop + '?idv=' + id_version, false, '', function () {
                        var curr_object = self;
                        var curr_id = id_version;
                        var target = elem;
                        curr_object.drop_after(target, curr_id);
                });
        },
        drop_after: function (elem, id) {
                for (var x = 0; x < this.arr.length; x++) {
                        if (this.arr[x].id === Number(id)) {
                                this.arr.splice(x, 1);
                                break;
                        }
                }
                elem.parentNode.removeChild(elem);
        },
        check_val: function (val) {
                return val && val.value;
        }
};

var load_list = {
        arr: [],
        add: function (key, func) {
                this.arr[key] = {
                        wait: true,
                        f: func
                };
        },
        next: function (curr_key) {
                if (curr_key && this.arr[curr_key]) {
                        this.arr[curr_key].wait = false;
                        this.arr[curr_key].f = null;
                }
                for (var key in this.arr) {
                        if (!this.arr.hasOwnProperty(key)) {
                                continue;
                        }
                        if (this.arr[key].wait) {
                                this.arr[key].f();
                                return true;
                        }
                }
        }
};


window.onload = function () {
        load_imgs.init();

        /*
         load_list.add('blog', function () {
         blog.init();
         });
         load_list.add('groups', function () {
         groups.init();
         });
         load_list.add('imgs', function () {
         imgs.get();
         });
         */
        setTimeout(function () {
                //load_list.next();
        }, 20);
};