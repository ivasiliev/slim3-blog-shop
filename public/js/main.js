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
    init: function () {
        var arr = document.querySelectorAll('[data-img]');
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
        elem.onclick = function () {
            var fileinfo = this.getAttribute('data-img').split('.');
            var cw = load_imgs._get_cw(document.body.clientWidth);
            var curr_src = '/css/photo/' + fileinfo[0] + cw + '.' + fileinfo[1];
            modal.show_img(curr_src, fileinfo[0]);
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

        /*
         str += '<div class="img_preview_txt">';
         str += '<div class="img_preview_close"><i class="fa fa-times"></i></div>';
         str += '<div class="img_preview_title">'+(data && data.title ? data.title : 'Без названия' )+'</div>';
         str += '<div class="img_preview_descr">'+(data && data.txt ? data.txt : '' )+'</div>';
         str += '</div>';
         */
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

var groups = {
    api_url_info: '/api/groups/photos/info/',
    arr: [],
    imgs_list_cont: 'group_imgs_list_cont',
    init: function (id) {
        this.send('GET', null, this.api_url_info + id, true);
    },
    send: function (method, form, backend, list_all, func) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open(method, backend, true);
        xhr.onload = xhr.onerror = function () {
            loader.remove();
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
            if (func) {
                func(data.content);
            } else {
                self.send_after(data.content, list_all);
            }
        };
        loader.show(true);
        xhr.send(form);
    },
    send_after: function (data, list_all) {
        if (list_all) {
            var cont = document.querySelector('.imgs_galery .imgs_row');
            cont.innerHTML = '';
            var main_img = document.querySelector('.main_img');
            if (main_img) {
                if (!data.main) {
                    data.main = data.imgs[0] ? data.imgs[0] : "";
                }
                main_img.setAttribute('data-img', data.main);
            }
            for (var key in data.imgs) {
                if (!data.imgs.hasOwnProperty(key)) {
                    continue;
                }
                if (main_img && data.imgs[key] === data.main) {
                    continue;
                }
                data.imgs[key].div = this.append_new(data.imgs[key]);

                //this.arr.push(data[key]);
            }
            load_imgs.init();
        } else {
            data.div = this.append_new(data);
            //this.arr.push(data);
        }
    },
    append_new: function (data) {

        var elem = document.createElement('div');
        elem.setAttribute('data-img', data);

        var cont = document.querySelector('.imgs_galery .imgs_row');
        cont.appendChild(elem);

        return elem;
    }
};

window.onload = function () {
    document.body.className = 'animate';
    //load_imgs.init();
    comments.info();
};


// -----------------------------------------------------------------------------
// new actions

var login = {
    api_url_create: '/api/login/check/',
    api_url_info: '',
    api_url_form: '/api/login/form/',
    api_url_account: '/account',
    arr: [],
    tagname: "login_data",
    check: function () {
        this.send('POST', this.create_reqdata(this.tagname), this.api_url_create);
    },
    create_reqdata: function (tagname) {
        var form = new FormData();

        var arr = document.querySelectorAll('[' + tagname + ']');
        for (var x = 0; x < arr.length; x++) {
            form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
            //arr[x].value = '';
        }

        return form;
    },
    send: function (method, form, backend) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open(method, backend, true);
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

            self.send_after(data.content);
        };
        xhr.send(form);
    },
    send_after: function (data) {
        if (data.type === 'success') {
            var elem = document.querySelector('[login_target="account"]');
            if (elem) {
                location.href = this.api_url_account;
            } else {
                location.reload();
            }
            return;
        } else if (data.type === 'error') {
            alert(data.message);
        }
    },
    show: function () {
        this.load_form('GET', this.api_url_form);
    },
    load_form: function (method, backend) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open(method, backend, true);
        xhr.onload = xhr.onerror = function () {
            if (Number(this.status) === 200) {
                var data = this.responseText;
            } else {
                console.log("error " + this.status);
                alert('error request: ' + this.status);
            }

            self.show_form(data);
        };
        xhr.send();
    },
    show_form: function (data) {
        data = '<div class="modal_close_but">+</div>' + data;
        var m = modal.show(data);
    }
};

var regclient = {
    api_url_create: '/api/regclient',
    api_url_info: '',
    api_url_account: '/account',
    arr: [],
    tagname: "reg_data",
    check: function () {
        this.send('POST', this.create_reqdata(this.tagname), this.api_url_create);
    },
    create_reqdata: function (tagname) {
        var form = new FormData();

        var arr = document.querySelectorAll('[' + tagname + ']');
        for (var x = 0; x < arr.length; x++) {
            form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
        }

        return form;
    },
    send: function (method, form, backend) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open(method, backend, true);
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

            self.send_after(data.content);
        };
        xhr.send(form);
    },
    send_after: function (data) {
        if (data.type === 'success') {
            location.href = this.api_url_account;
            return;
        } else if (data.type === 'error') {
            alert(data.message);
        }
    }
};

var comments = {
    api_url_save: '/api/blog/comments/save/',
    api_url_form: '/api/blog/comments/form/',
    api_url_info: '/api/blog/comments/info/',
    api_url_drop: '/api/blog/comments/drop/',
    arr: [],
    tagname: "comment_data",
    list: ".comments_list",
    cont: ".comments_wrap",

    save: function (elem) {
        var self = this;
        this.send('POST', this.create_reqdata(elem), this.api_url_save, function (data) {
            var obj = self;
            var c_elem = elem;
            if (data) {
                obj.arr[data.id] = data;
                obj.render(); // re-render comments
            }
            if (c_elem && c_elem.getAttribute('comment_filed') === 'main') {
                c_elem.value = '';
            }
            //obj.info();
        });

    },
    info: function () {
        var postId = document.querySelector('input[item="postId"]');
        if (postId) {
            this.send('GET', null, this.api_url_info + postId.value);
        }
    },
    drop: function (elem, id) {
        if (id) {
            var self = this;
            this.send('GET', null, this.api_url_drop + id, function (data) {
                var obj = self;
                var c_id = id;
                var c_elem = elem;
                if (data === 'success') {
                    delete obj.arr[c_id];
                    if (c_elem && c_elem.parentNode.parentNode.parentNode) {
                        c_elem.parentNode.parentNode.parentNode.removeChild(c_elem.parentNode.parentNode);
                    }
                } else {
                    console.log(data);
                }
            });
        }
    },
    create_reqdata: function (elem) {
        var form = new FormData();

        var postId = document.querySelector('input[item="postId"]').value;
        form.append("postId", postId);

        if (!elem) {
            elem = document.querySelector(this.cont);
        }
        var arr = elem.querySelectorAll('[' + this.tagname + ']');
        for (var x = 0; x < arr.length; x++) {
            form.append(arr[x].getAttribute(this.tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
        }

        return form;
    },
    send: function (method, form, backend, func) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open(method, backend, true);
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
            if (func) {
                func(data.content);
            } else {
                self.send_after(data.content);
            }
        };
        xhr.send(form);
    },
    getForm: function (elem, curr_id) {
        var self = this;
        var xhr = new XMLHttpRequest();
        xhr.open('GET', this.api_url_form + (curr_id ? curr_id : ''), true);
        xhr.onload = xhr.onerror = function () {
            if (Number(this.status) === 200) {
                var data = this.responseText;
            } else {
                console.log("error " + this.status);
                alert('error request: ' + this.status);
            }
            self.renderForm(elem, data);
        };
        xhr.send();
    },
    send_after: function (data) {
        this.render(data);
    },
    render: function (data) {
        var cont = document.querySelector(this.list);
        if (!cont) {
            console.log('comments list container not found');
            return false;
        }
        if (!data) {
            data = this.arr;
        } else {
            this.arr = data;
        }
        cont.innerHTML = this._buildTree();
    },
    _buildTree: function (parent_id, order) {
        if (!parent_id) {
            parent_id = '';
        }
        if (!order) {
            order = '';
        }
        var str = '';
        var num = 0;
        for (var key in this.arr) {
            if (!this.arr.hasOwnProperty(key)) {
                continue;
            }
            if (String(parent_id) === String(this.arr[key].parent_id)) {
                num++;
                //console.log(String(this.arr[key].parent_id));
                str += this._getCurrContent(this.arr[key], order, num);
                str += '<div class="comment_childs_list">';
                //if (parent_id) {
                str += this._buildTree(key, order ? order + '.' + num : num);
                //}
                str += '</div>';
                str += '</div>'; // close comment box div
            }
        }
        return str;
    },
    _getCurrContent: function (data, order, num) {
        var str = '<div class="comment_box" id="comment_' + data.id + '" item="' + data.id + '">';

        // header
        str += '<div class="com_box_header">';
        str += '<div' + (data.user && data.user.img ? ' style="background-image: url(/userimgs/' + data.user.img + ');"' : '') + '></div>'; // userphoto
        str += '<span>' + (data.user && data.user.name ? data.user.name : 'unknown') + '</span>'; // username
        str += '<font>' + getCurrDate(data.create_dt) + '</font>'; // comment datetime
        if (order) {
            str += '<font>' + order + '.' + num + '</font>'; // comment order
        }
        str += '</div>';

        // comment body
        str += '<div class="comment_txt">' + data.message + '</div>';

        str += '<div class="comment_controls">';
        str += '<span onclick="comments.showForm(this);">ответить</span>';
        if (data.user && data.user.hasOwnProperty('owner') && JSON.parse(data.user.owner)) {
            str += '<i class="fa fa-pencil" aria-hidden="true" onclick="comments.showForm(this, \'' + data.id + '\');" title="изменить"></i>';
            str += '<i class="fa fa-trash-o" aria-hidden="true" onclick="comments.drop(this, \'' + data.id + '\');" title="удалить"></i>';
        }
        str += '</div>';

        // it commented because we need have childs container in recursive func
        //str += '<div>';

        return str;
    },
    showForm: function (elem, curr_id) {
        if (elem) {
            var cont = elem.parentNode.parentNode;
            var form = cont.querySelector('.add_comment');
            if (form) {
                return true;
            }
        }
        this.getForm(elem, curr_id);
    },
    renderForm: function (elem, data, parent_id) {
        var cont = null;
        if (elem) {
            cont = elem.parentNode.parentNode;
            parent_id = cont.getAttribute('item');
            //console.log(cont);
        } else {
            cont = document.querySelector('.comments_list');
            parent_id = '';
        }
        if (cont) {
            cont.innerHTML += data;
            var curr_input = cont.querySelector('[comment_data="curr_id"]');
            if (!curr_input.value) {
                // if type is not edit
                var parent_input = cont.querySelector('[comment_data="parentId"]');
                parent_input.value = parent_id;
            }
            var target = cont.querySelector('.add_comment');
            target.scrollIntoViewIfNeeded();
        }
    },
    removeOtherForms: function () {
        var arr = document.querySelectorAll('.comments_list .add_comment');
        for (var x = 0; x < arr.length; x++) {
            arr[x].parentNode.removeChild(arr[x]);
        }
    },
    removeForm: function (elem) {
        elem.parentNode.removeChild(elem);
    }
};


function createCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getCurrDate(dt) {
    var a = new Date(dt * 1000);
    return addZero(a.getDate()) + '.' + addZero(a.getMonth() + 1) + '.' + a.getFullYear() + ' ' + addZero(a.getHours()) + ':' + addZero(a.getMinutes());
}

function addZero(n) {
    return Number(n) > 9 ? n : '0' + n;
}