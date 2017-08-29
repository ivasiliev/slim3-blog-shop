    function menu_action(type) {
	type === 'open' ? open_menu() : close_menu();
    }

    function open_menu() {
	var menu = document.querySelector('.m_nav');
	menu.classList.contains('active') ? true : menu.classList.add('active');
	var shadow = document.querySelector('.shadow');
	shadow.style.display = 'block';
	setTimeout(function () {
	    var elem = shadow;
	    elem.style.opacity = 0.4;
	}, 20);
    }

    function close_menu() {
	var menu = document.querySelector('.m_nav');
	menu.classList.contains('active') ? menu.classList.remove('active') : false;
	var shadow = document.querySelector('.shadow');
	shadow.style.opacity = 0;
	setTimeout(function () {
	    var elem = shadow;
	    elem.style.display = 'none';
	}, 210);
    }

    var tabs_handler = {
	open: function (curr) {
	    var arr = document.querySelectorAll('.nav_content_block');
	    for (var x = 0; x < arr.length; x++) {
		arr[x].classList.remove('active');
	    }
	    document.querySelector('.nav_content_block.' + curr).classList.add('active');

	    arr = document.querySelectorAll('span[nav_elem]');
	    for (var x = 0; x < arr.length; x++) {
		if (arr[x].getAttribute('nav_elem') === curr) {
		    arr[x].classList.contains('active') ? true : arr[x].classList.add('active');
		} else {
		    arr[x].classList.remove('active');
		}
	    }
	    close_menu();
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
	__show_img_with_txt: function (cont, src, data, id) {

	    if (!(cont && src)) {
		modal.remove();
		return false;
	    }

	    var img_preview = document.createElement('div');
	    img_preview.className = 'img_preview_container';

	    var str = '<div class="img_preview_cont">';
	    str += '<div class="loader"><div class="helper"></div><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i></div>'; // loader
	    str += '<img class="modal_img_view" src="">';
	    str += '<div class="helper"></div>';
	    str += '</div>';

	    str += '<div class="img_preview_txt">';
	    str += '<div class="img_preview_close"><i class="fa fa-times"></i></div>';
	    str += '<div class="img_preview_title"><input type="text" img_update="title" placeholder="название" value="' + (data && data.title ? data.title : '') + '" /></div>';
	    str += '<div class="img_preview_descr"><textarea img_update="txt" placeholder="описание">' + (data && data.txt ? data.txt : '') + '</textarea></div>';
	    str += '<div class="img_preview_to_mail"><label><input img_update="main" type="checkbox"'+(data && data.is_main ? 'checked="checked"' : '')+' /> главное фото (все фото)</label></div>';
	    str += '<button type="button" onclick="imgs.update(this.parentNode, \'' + id + '\')">Сохранить</button>';

	    if (data.dt_upd) {
		var dt = new Date(data.dt_upd * 1000);
		str += '<div class="last_upd">Последнее изменение:<br />';
		str += dt.getHours() + ':';
		str += dt.getMinutes() + ':';
		str += dt.getSeconds() + ' ';
		str += dt.getDate() + '.';
		str += (dt.getMonth() < 9 ? '0' + (dt.getMonth() + 1) : dt.getMonth() + 1) + '.';
		str += dt.getFullYear();
		str += '</div>';
	    }

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
		modal.__show_img_with_txt(cont, src, data.content, id);
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
	remove: function (cont) {
	    if (!(cont && cont.parentNode)) {
		// try to get modal window
		cont = document.querySelector('.modal_cont');
		if (!(cont && cont.parentNode)) {
		    return false;
		}
	    }
	    cont.setAttribute('style', 'opacity: 0');

	    setTimeout(function (obj) {
		obj.parentNode.removeChild(obj);
	    }, 300, cont);
	}
    };

    var loader = {
	show: function () {
	    var cont = document.createElement('div');
	    cont.className = "loader";
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

    var main_data = {
	api_url_create: '/api/img/savemaindata',
	api_url_info: '',
	arr: [],
	tagname: "main_data",
	save: function () {
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

		self.send_after(data.content);
	    };
	    loader.show();
	    xhr.send(form);
	},
	send_after: function (data) {
	    console.log(data);
	}
    };

    var video = {
	api_url_create: '/api/img/savevideodata',
	api_url_info: '',
	arr: [],
	tagname: "video_data",
	save: function () {
	    this.send('POST', this.create_reqdata(this.tagname), this.api_url_create);
	},
	create_reqdata: function (tagname) {
	    var form = new FormData();

	    var arr = document.querySelectorAll('[' + tagname + ']');
	    for (var x = 0; x < arr.length; x++) {
		form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
		arr[x].value = '';
	    }

	    return form;
	},
	send: function (method, form, backend) {
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

		self.send_after(data.content);
	    };
	    loader.show();
	    xhr.send(form);
	},
	send_after: function (data) {
	    var cont = document.querySelector('.video_cont');
	    var elem = document.createElement('div');
	    elem.innerHTML = '<iframe width="100%" height="100%" src="' + data + '" frameborder="0" allowfullscreen></iframe>';
	    cont.appendChild(elem);
	},
	check_video_url: function (elem) {
	    var result = '';
	    if (elem.value) {
		var videoid = elem.value.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
		console.log(videoid);
		if (videoid && videoid.length > 1) {
		    result = videoid[1];
		}
	    }
	    elem.value = result !== '' ? 'https://www.youtube.com/embed/' + result : '';
	}
    };

    var blog = {
	api_url_create: '/api/blog/save',
	api_url_update: '/api/blog/update',
	api_url_info: '/api/blog/info',
	api_url_drop: '/api/blog/drop',
	arr: [],
	tagname: "blog_data",
	add_tagname: "blog_add_data",
	update_tagname: "blog_upd_data",
	init: function () {
	    var elem = document.querySelector('textarea[blog_data="txt"]');
	    if (elem) {
		var params = {
		    selector: '',
		    height: 300,
		    plugins: 'lists advlist',
		    toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist',
		    menubar: false,
		    toolbar_items_size: 'small',
		    setup: function (editor) {
			editor.on("change keyup", function (e) {
			    //console.log('saving');
			    //tinyMCE.triggerSave(); // updates all instances
			    editor.save(); // updates this instance's textarea
			    $(editor.getElement()).trigger('change'); // for garlic to detect change
			});
		    }
		};

		params.selector = '[blog_data="txt"]';
		tinymce.init(params);
	    }
	    this.send('GET', null, this.api_url_info, true);
	},
	save: function () {
	    this.send('POST', this.create_reqdata(this.add_tagname), this.api_url_create);
	},
	create_reqdata: function (tagname) {
	    var form = new FormData();

	    var arr = document.querySelectorAll('[' + tagname + ']');
	    for (var x = 0; x < arr.length; x++) {
		form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
		arr[x].value = '';
	    }

	    return form;
	},
	send: function (method, form, backend, list_all, func) {
	    var self = this;
	    var xhr = new XMLHttpRequest();
	    xhr.open(method, backend, true);
	    xhr.onload = xhr.onerror = function () {
		loader.remove();
		if (list_all) {
		    load_list.next('blog');
		}
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
	    loader.show();
	    xhr.send(form);
	},
	send_after: function (data, list_all) {
	    if (list_all) {
		var cont = document.querySelector('.blog_added_block');
		cont.innerHTML = '';
		for (var key in data) {
		    if (!data.hasOwnProperty(key)) {
			continue;
		    }
		    data[key].div = this.append_new(data[key]);
		    this.arr.push(data[key]);
		}
	    } else {
		data.div = this.append_new(data);
		this.arr.push(data);
	    }

	    modal.remove(document.querySelector('.modal_cont'));
	},
	append_new: function (data) {

	    if (data.hasOwnProperty('drop') && data.drop) {
		return document.createElement('div');
	    }

	    var cont = document.querySelector('.blog_added_block');

	    var elem = document.createElement('div');
	    elem.className = 'blog_preview';

	    elem.setAttribute('blog_item', data.id);

	    elem.innerHTML = this.current_content(data);
	    cont.appendChild(elem);

	    return elem;
	},
	current_content: function (data) {
	    var str = '';
	    str += '<div class="elem_controls">';
	    str += '<span><a href="/blog/c/' + data.id + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></span>';
	    str += '<span onclick="blog.update_open(\'' + data.id + '\')"><i class="fa fa-pencil" aria-hidden="true"></i></span>';
	    str += '<span onclick="blog.drop(\'' + data.id + '\')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
	    str += '</div>';
	    str += '<div curr_blog="' + data.id + '" style="position: relative;">';
	    str += '<h4>' + data.title + '</h4>';
	    str += '</div>';
	    return str;
	},
	drop: function (id) {
	    this.send('GET', null, this.api_url_drop + '/' + id, false, blog.drop_after);
	},
	drop_after: function (data) {
	    var elem = document.querySelector('[blog_item="' + data.id + '"]');
	    if (elem) {
		elem.parentNode.removeChild(elem);
	    }
	},
	create_open: function () {
	    var str = '';
	    str += '<h4>Новая запись</h4>';
	    str += '<div class="inputs_cont">';
	    str += '<span>Заголовок</span>';
	    str += '<input type="text" ' + this.add_tagname + '="title" value="" />';
	    str += '</div>';
	    str += '<div class="inputs_cont">';
	    str += '<span>Содержание</span>';
	    str += '<textarea ' + this.add_tagname + '="txt"></textarea>';
	    str += '</div>';
	    str += '<button class="add_button" onclick="blog.save();">Сохранить</button>';
	    modal.show(str, true, function () {
		var params = {
		    selector: '',
		    height: 300,
		    plugins: 'lists advlist',
		    toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist',
		    menubar: false,
		    toolbar_items_size: 'small',
		    setup: function (editor) {
			editor.on("change keyup", function (e) {
			    //console.log('saving');
			    //tinyMCE.triggerSave(); // updates all instances
			    editor.save(); // updates this instance's textarea
			    $(editor.getElement()).trigger('change'); // for garlic to detect change
			});
		    }
		};

		params.selector = '[' + blog.add_tagname + '="txt"]';
		tinymce.init(params);
	    });
	},
	update_open: function (id) {
	    var data = this.get_curr_data(id);
	    var str = '<input type="hidden" ' + this.update_tagname + ' = "curr_id" value="' + id + '">';
	    str += '<h4>Редактирование записи</h4>';
	    str += '<div class="inputs_cont">';
	    str += '<span>Заголовок</span>';
	    str += '<input type="text" ' + this.update_tagname + '="title" value="' + data.title + '" />';
	    str += '</div>';
	    str += '<div class="inputs_cont">';
	    str += '<span>Содержание</span>';
	    str += '<textarea ' + this.update_tagname + '="txt">' + data.txt + '</textarea>';
	    str += '</div>';
	    str += '<button class="add_button" onclick="blog.update();">Сохранить</button>';
	    modal.show(str, true, function () {
		var params = {
		    selector: '',
		    height: 300,
		    plugins: 'lists advlist',
		    toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist',
		    menubar: false,
		    toolbar_items_size: 'small',
		    setup: function (editor) {
			editor.on("change keyup", function (e) {
			    //console.log('saving');
			    //tinyMCE.triggerSave(); // updates all instances
			    editor.save(); // updates this instance's textarea
			    $(editor.getElement()).trigger('change'); // for garlic to detect change
			});
		    }
		};

		params.selector = '[' + blog.update_tagname + '="txt"]';
		tinymce.init(params);
	    });
	},
	update: function () {
	    this.send('POST', this.create_reqdata(this.update_tagname), this.api_url_update, false, blog.update_after);
	},
	update_after: function (data) {
	    for (var x = 0; x < blog.arr.length; x++) {
		if (blog.arr[x].id == data.id) {
		    blog.arr[x].div.innerHTML = blog.current_content(data);
		    data.div = blog.arr[x].div;
		    blog.arr[x] = data;
		}
	    }

	    modal.remove(document.querySelector('.modal_cont'));
	},
	get_curr_data: function (id) {
	    for (var x = 0; x < this.arr.length; x++) {
		if (this.arr[x].id == id) {
		    return this.arr[x];
		}
	    }
	    return null;
	}
    };

    var groups = {
	api_url_create: '/api/groups/save',
	api_url_update: '/api/groups/update',
	api_url_info: '/api/groups/info',
	api_url_drop: '/api/groups/drop',
	arr: [],
	add_tagname: "groups_add_data",
	update_tagname: "groups_upd_data",
	imgs_list_cont: 'group_imgs_list_cont',
	init: function () {
	    this.send('GET', null, this.api_url_info, true);
	},
	save: function () {
	    this.send('POST', this.create_reqdata(this.add_tagname), this.api_url_create);
	},
	create_reqdata: function (tagname) {
	    var form = new FormData();

	    var arr = document.querySelectorAll('[' + tagname + ']');
	    for (var x = 0; x < arr.length; x++) {
		form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
		arr[x].value = '';
	    }

	    var selected = groups.get_group_imgs_list();
	    arr = [];
	    var head_img = null;
	    for (var key in selected) {
		if (!selected.hasOwnProperty(key)) {
		    continue;
		}
		arr.push(key);
		if (selected[key] === 'head_img') {
		    head_img = key;
		}
	    }
	    if (!head_img) {
		head_img = arr[0] ? arr[0] : '';
	    }

	    form.append('head_img', head_img);
	    form.append('photos', arr.join(','));

	    return form;
	},
	send: function (method, form, backend, list_all, func) {
	    var self = this;
	    var xhr = new XMLHttpRequest();
	    xhr.open(method, backend, true);
	    xhr.onload = xhr.onerror = function () {
		loader.remove();
		if (list_all) {
		    load_list.next('groups');
		}
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
	    loader.show();
	    xhr.send(form);
	},
	send_after: function (data, list_all) {
	    if (list_all) {
		var cont = document.querySelector('.groups_added_block');
		cont.innerHTML = '';
		for (var key in data) {
		    if (!data.hasOwnProperty(key)) {
			continue;
		    }
		    data[key].div = this.append_new(data[key]);
		    this.arr.push(data[key]);
		}
	    } else {
		data.div = this.append_new(data);
		this.arr.push(data);
	    }

	    modal.remove(document.querySelector('.modal_cont'));
	},
	append_new: function (data) {

	    if (data.hasOwnProperty('drop') && data.drop) {
		return document.createElement('div');
	    }

	    var cont = document.querySelector('.groups_added_block');

	    var elem = document.createElement('div');
	    elem.className = 'blog_preview';

	    elem.setAttribute('groups_item', data.id);

	    elem.innerHTML = this.current_content(data);
	    cont.appendChild(elem);

	    return elem;
	},
	current_content: function (data) {
	    var str = '';
	    str += '<div class="elem_controls">';
	    //str += '<span><a href="/blog/c/' + data.id + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></span>';
	    str += '<span onclick="groups.update_open(\'' + data.id + '\')"><i class="fa fa-pencil" aria-hidden="true"></i></span>';
	    str += '<span onclick="groups.drop(\'' + data.id + '\')"><i class="fa fa-trash" aria-hidden="true"></i></span>';
	    str += '</div>';
	    str += '<div curr_groups="' + data.id + '" style="position: relative;">';
	    str += '<h4>' + data.title + '</h4>';
	    str += '</div>';
	    return str;
	},
	drop: function (id) {
	    this.send('GET', null, this.api_url_drop + '/' + id, false, groups.drop_after);
	},
	drop_after: function (data) {
	    var elem = document.querySelector('[blog_item="' + data.id + '"]');
	    if (elem) {
		elem.parentNode.removeChild(elem);
	    }
	},
	create_open: function () {
	    var str = this.__create_curr_data(this.add_tagname, 'Новая группа фото', null, true, 'groups.save();');

	    modal.show(str, true);
	},
	update_open: function (id) {
	    var data = this.get_curr_data(id);

	    var str = this.__create_curr_data(this.update_tagname, 'Редактирование группы фото', data, true, 'groups.update();');

	    modal.show(str, true, function () {
		setTimeout(function () {
		    $(".group_imgs_list_cont").sortable({
			items: 'div'
		    });
		}, 20);
	    });
	},
	__create_curr_data: function (tagname, title, data, curr_id, action) {
	    var str = '';
	    if (curr_id && data) {
		str += '<input type="hidden" ' + tagname + ' = "curr_id" value="' + data.id + '">';
	    }
	    str += '<h4>' + title + '</h4>';
	    str += '<div class="inputs_cont">';
	    str += '<span>Заголовок</span>';
	    str += '<input type="text" ' + tagname + '="title" value="' + (data && data.title ? data.title : '') + '" />';
	    str += '<input type="hidden" ' + tagname + '="photos" value="" />';
	    str += '</div>';

	    str += '<div class="inputs_cont">';
	    str += '<button type="button" onclick="groups.open_imgs_list();">Добавить фото в группу</button>';
	    str += '<div class="imgs_list_modal ' + this.imgs_list_cont + '">';
	    if (data && data.photos) {
		var arr = data.photos.split(',');
		var curr_data = null;
		var curr_class = '';
		for (var x = 0; x < arr.length; x++) {
		    curr_data = imgs.get_curr_data(arr[x]);
		    if (arr[x] === data.head_img) {
			curr_class = ' class="head_img"';
		    } else {
			curr_class = '';
		    }
		    str += '<div onclick="groups.set_as_head(this);"' + curr_class + ' style="background-image: url(/css/photo/' + arr[x] + '_480.' + curr_data.type + ')" data-img-id="' + arr[x] + '"></div>';
		}
	    }
	    str += '</div>';
	    str += '</div>';

	    str += '<button class="add_button" onclick="' + action + '">Сохранить</button>';

	    return str;
	},
	open_imgs_list: function () {
	    imgs.get(groups.__create_imgs_list);
	},
	__create_imgs_list: function (data) {

	    var selected = groups.get_group_imgs_list();

	    var str = '<div class="imgs_list_modal">';

	    var img_src = '';
	    for (var key in data) {
		if (!data.hasOwnProperty(key)) {
		    continue;
		}
		img_src = key + '_480.' + data[key].type;
		str += '<div style="background-image: url(/css/photo/' + img_src + ')">';
		str += '<input type="checkbox"' + (selected.hasOwnProperty(key) ? ' checked="checked"' : '') + ' add_photo="check" data-img-src="' + img_src + '" data-img-id="' + key + '" />';
		str += '</div>';
	    }

	    str += '</div>';
	    str += '<div style="text-align: center;"><button type="button" onclick="groups.append_imgs(this.parentNode);">Добавить</button></div>';

	    modal.show(str, true);
	},
	append_imgs: function (elem) {
	    var main_cont = document.querySelector('.' + this.imgs_list_cont);


	    var cont = elem.parentNode.querySelector('.imgs_list_modal');
	    var selected = groups.get_group_imgs_list();
	    var arr = cont.querySelectorAll('[add_photo="check"]');
	    var str = '';
	    var img_src = '';
	    var key = '';
	    for (var x = 0; x < arr.length; x++) {
		if (arr[x].checked) {
		    img_src = arr[x].getAttribute('data-img-src');
		    key = arr[x].getAttribute('data-img-id');
		    str += '<div onclick = "groups.set_as_head(this);"' + (selected[key] === 'head_img' ? ' class="head_img"' : '') + ' style="background-image: url(/css/photo/' + img_src + ')" data-img-id="' + key + '"></div>';
		}
	    }

	    if (main_cont) {
		main_cont.innerHTML = str;
		setTimeout(function () {
		    $(".group_imgs_list_cont").sortable({
			items: 'div'
		    });
		}, 20);
	    }
	    modal.remove(elem.parentNode.parentNode);
	},
	get_group_imgs_list: function () {
	    var imgs = [];
	    var cont = document.querySelector('.' + this.imgs_list_cont);
	    var arr = cont.children;
	    var key = '';
	    for (var x = 0; x < arr.length; x++) {
		key = arr[x].getAttribute('data-img-id');
		imgs[key] = arr[x].classList.contains('head_img') ? 'head_img' : '';
	    }

	    return imgs;
	},
	set_as_head: function (elem) {
	    var arr = elem.parentNode.children;
	    for (var x = 0; x < arr.length; x++) {
		arr[x].classList.remove('head_img');
	    }
	    elem.classList.add('head_img');
	},
	update: function () {
	    this.send('POST', this.create_reqdata(this.update_tagname), this.api_url_update, false, groups.update_after);
	},
	update_after: function (data) {
	    for (var x = 0; x < groups.arr.length; x++) {
		if (groups.arr[x].id == data.id) {
		    groups.arr[x].div.innerHTML = groups.current_content(data);
		    data.div = groups.arr[x].div;
		    groups.arr[x] = data;
		}
	    }

	    modal.remove(document.querySelector('.modal_cont'));
	},
	get_curr_data: function (id) {
	    for (var x = 0; x < this.arr.length; x++) {
		if (this.arr[x].id == id) {
		    return this.arr[x];
		}
	    }
	    return null;
	}
    };

    var imgs = {
	api_url_info: '/api/img/info',
	api_url_update: '/api/img/imgdata/update/',
	arr: null,
	get: function (func, curr_id) {
	    this.send('GET', null, this.api_url_info + (curr_id ? '?cid=' + curr_id : ''), func);
	},
	update: function (cont, id) {
	    var form = new FormData();
	    form.append('curr_id', id);
	    form.append('title', cont.querySelector('[img_update="title"]').value);
	    form.append('txt', cont.querySelector('[img_update="txt"]').value);
	    form.append('main', cont.querySelector('[img_update="main"]').value);

	    this.send('POST', form, this.api_url_update, function () {
		modal.remove();
	    });
	},
	send: function (method, form, backend, func) {
	    var self = this;
	    var xhr = new XMLHttpRequest();
	    xhr.open(method, backend, true);
	    xhr.onload = xhr.onerror = function () {
		if (!self.arr) {
		    self.arr = [];
		    load_list.next('imgs');
		}
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
		    self.send_after(data.content);
		}
	    };
	    loader.show();
	    xhr.send(form);
	},
	send_after: function (data) {
	    this.arr = data;
	},
	get_curr_data: function (id) {
	    for (var key in this.arr) {
		if (this.arr.hasOwnProperty(key) && key === id) {
		    return this.arr[key];
		}
	    }
	    return null;
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
	document.querySelector('.add_photo').innerHTML = file_img.create_load_elem('Загрузить новое фото', 'photo="upload"', null, true);

	load_list.add('blog', function () {
	    blog.init();
	});
	load_list.add('groups', function () {
	    groups.init();
	});
	load_list.add('imgs', function () {
	    imgs.get();
	});
	setTimeout(function () {
	    load_list.next();
	}, 20);
    };