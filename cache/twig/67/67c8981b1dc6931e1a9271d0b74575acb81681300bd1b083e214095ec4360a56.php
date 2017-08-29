<?php

/* admin/login.twig */
class __TwigTemplate_94f9c01e444060b63cee3b7f8e4a112e25dabd38fb028da1d4333deedb0697e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
\t<meta name=\"http-equiv\" content=\"Content-type: text/html; charset=UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
\t<title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - Pilot Pi</title>
\t<link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
\t<link href='/css/admin/style.css' rel='stylesheet' type='text/css'>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
\t";
        // line 10
        $this->displayBlock('styles', $context, $blocks);
        // line 12
        echo "\t";
        $this->displayBlock('scripts', $context, $blocks);
        // line 14
        echo "\t<script>
\t\tvar login = {
\t\t    api_url_create: '/checklogin',
\t\t    api_url_info: '',
\t\t    arr: [],
\t\t    tagname: \"login_data\",
\t\t    check: function () {
\t\t\tthis.send('POST', this.create_reqdata(this.tagname), this.api_url_create);
\t\t    },
\t\t    create_reqdata: function (tagname) {
\t\t\tvar form = new FormData();

\t\t\tvar arr = document.querySelectorAll('[' + tagname + ']');
\t\t\tfor (var x = 0; x < arr.length; x++) {
\t\t\t    form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
\t\t\t    arr[x].value = '';
\t\t\t}

\t\t\treturn form;
\t\t    },
\t\t    send: function (method, form, backend) {
\t\t\tvar self = this;
\t\t\tvar xhr = new XMLHttpRequest();
\t\t\txhr.open(method, backend, true);
\t\t\txhr.onload = xhr.onerror = function () {
\t\t\t    if (Number(this.status) === 200) {
\t\t\t\tvar data = JSON.parse(this.responseText);
\t\t\t\tif (data[0] === false) {
\t\t\t\t    alert('error answer');
\t\t\t\t    return false;
\t\t\t\t}
\t\t\t    } else {
\t\t\t\tconsole.log(\"error \" + this.status);
\t\t\t\talert('error request: ' + this.status);
\t\t\t    }

\t\t\t    self.send_after(data.content);
\t\t\t};
\t\t\txhr.send(form);
\t\t    },
\t\t    send_after: function (data) {
\t\t\tif (data === 'success') {
\t\t\t    createCookie('_pilotpi_id_v', '111', 365);
\t\t\t    location.href = \"/admin/lk\";
\t\t\t    return;
\t\t\t}
\t\t    }
\t\t};
\t\tfunction createCookie(name, value, days) {
\t\t    var expires = \"\";
\t\t    if (days) {
\t\t\tvar date = new Date();
\t\t\tdate.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
\t\t\texpires = \"; expires=\" + date.toUTCString();
\t\t    }
\t\t    document.cookie = name + \"=\" + value + expires + \"; path=/\";
\t\t}
\t</script>
    </head>
    <body>
\t<div class=\"wrapper\">
\t    <div class=\"container\">
\t\t<div class=\"login_cont\">
\t\t    <div class=\"inputs_cont\"><span>Логин</span><input type=\"text\" login_data=\"login\"></div>
\t\t    <div class=\"inputs_cont\"><span>Пароль</span><input type=\"password\" login_data=\"pass\"></div>
\t\t    <button type=\"button\" onclick=\"login.check();\">Войти</button>
\t\t</div>
\t    </div>
\t    <div class=\"footer\"></div>
\t</div>
\t<div class=\"shadow\" onclick=\"menu_action('close');\"></div>
    </body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_styles($context, array $blocks = array())
    {
        // line 11
        echo "\t";
    }

    // line 12
    public function block_scripts($context, array $blocks = array())
    {
        // line 13
        echo "\t";
    }

    public function getTemplateName()
    {
        return "admin/login.twig";
    }

    public function getDebugInfo()
    {
        return array (  132 => 13,  129 => 12,  125 => 11,  122 => 10,  117 => 6,  41 => 14,  38 => 12,  36 => 10,  29 => 6,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
\t<meta name=\"http-equiv\" content=\"Content-type: text/html; charset=UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
\t<title>{% block title %}{% endblock %} - Pilot Pi</title>
\t<link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
\t<link href='/css/admin/style.css' rel='stylesheet' type='text/css'>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
\t{% block styles %}
\t{% endblock %}
\t{% block scripts %}
\t{% endblock %}
\t<script>
\t\tvar login = {
\t\t    api_url_create: '/checklogin',
\t\t    api_url_info: '',
\t\t    arr: [],
\t\t    tagname: \"login_data\",
\t\t    check: function () {
\t\t\tthis.send('POST', this.create_reqdata(this.tagname), this.api_url_create);
\t\t    },
\t\t    create_reqdata: function (tagname) {
\t\t\tvar form = new FormData();

\t\t\tvar arr = document.querySelectorAll('[' + tagname + ']');
\t\t\tfor (var x = 0; x < arr.length; x++) {
\t\t\t    form.append(arr[x].getAttribute(tagname), (arr[x].getAttribute('type') && arr[x].getAttribute('type') === 'file' ? arr[x].file[0] : arr[x].value));
\t\t\t    arr[x].value = '';
\t\t\t}

\t\t\treturn form;
\t\t    },
\t\t    send: function (method, form, backend) {
\t\t\tvar self = this;
\t\t\tvar xhr = new XMLHttpRequest();
\t\t\txhr.open(method, backend, true);
\t\t\txhr.onload = xhr.onerror = function () {
\t\t\t    if (Number(this.status) === 200) {
\t\t\t\tvar data = JSON.parse(this.responseText);
\t\t\t\tif (data[0] === false) {
\t\t\t\t    alert('error answer');
\t\t\t\t    return false;
\t\t\t\t}
\t\t\t    } else {
\t\t\t\tconsole.log(\"error \" + this.status);
\t\t\t\talert('error request: ' + this.status);
\t\t\t    }

\t\t\t    self.send_after(data.content);
\t\t\t};
\t\t\txhr.send(form);
\t\t    },
\t\t    send_after: function (data) {
\t\t\tif (data === 'success') {
\t\t\t    createCookie('_pilotpi_id_v', '111', 365);
\t\t\t    location.href = \"/admin/lk\";
\t\t\t    return;
\t\t\t}
\t\t    }
\t\t};
\t\tfunction createCookie(name, value, days) {
\t\t    var expires = \"\";
\t\t    if (days) {
\t\t\tvar date = new Date();
\t\t\tdate.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
\t\t\texpires = \"; expires=\" + date.toUTCString();
\t\t    }
\t\t    document.cookie = name + \"=\" + value + expires + \"; path=/\";
\t\t}
\t</script>
    </head>
    <body>
\t<div class=\"wrapper\">
\t    <div class=\"container\">
\t\t<div class=\"login_cont\">
\t\t    <div class=\"inputs_cont\"><span>Логин</span><input type=\"text\" login_data=\"login\"></div>
\t\t    <div class=\"inputs_cont\"><span>Пароль</span><input type=\"password\" login_data=\"pass\"></div>
\t\t    <button type=\"button\" onclick=\"login.check();\">Войти</button>
\t\t</div>
\t    </div>
\t    <div class=\"footer\"></div>
\t</div>
\t<div class=\"shadow\" onclick=\"menu_action('close');\"></div>
    </body>
</html>", "admin/login.twig", "/home/pilotpiru/public_html/app/templates/admin/login.twig");
    }
}
