<?php

/* header.twig */
class __TwigTemplate_ae524e5134ecc02ea26623026d8af9e336788c4532a7afda601dad031747649b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"header\">
    <div class=\"menu_but\" onclick=\"menu_action('open');\"><i class=\"fa fa-bars\"></i></div>
    <div class=\"logo\"><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->baseUrl(), "html", null, true);
        echo "/css/img/logo-b.png\" alt=\"\" /></div>
    <div class=\"right\">
\t<div class=\"links\">
\t    <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
\t    <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
\t    <a href=\"\"><i class=\"fa fa-youtube\"></i></a>
\t</div>
\t<div class=\"nav\">
\t    <span";
        // line 11
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "home")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/';\"";
        }
        echo ">Home</span>
\t    <span";
        // line 12
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "portfolio")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/portfolio/';\"";
        }
        echo ">Портфолио</span>
\t    <span";
        // line 13
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "video")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/video/';\"";
        }
        echo ">Видео</span>
\t    <span";
        // line 14
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "blog")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/blog/';\"";
        }
        echo ">Блог</span>
\t    <span";
        // line 15
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "contacts")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/contacts/';\"";
        }
        echo ">Контакты</span>
\t</div>
    </div>
</div>
<div class=\"m_nav\">
    <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
    <div class=\"links\">
\t<a href=\"\"><i class=\"fa fa-facebook\"></i></a>
\t<a href=\"\"><i class=\"fa fa-twitter\"></i></a>
\t<a href=\"\"><i class=\"fa fa-youtube\"></i></a>
    </div>
    <div class=\"nav\">
\t<span";
        // line 27
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "home")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/';\"";
        }
        echo ">Home</span>
\t<span";
        // line 28
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "portfolio")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/portfolio/';\"";
        }
        echo ">Портфолио</span>
\t<span";
        // line 29
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "video")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/video/';\"";
        }
        echo ">Видео</span>
\t<span";
        // line 30
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "blog")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/blog/';\"";
        }
        echo ">Блог</span>
\t<span";
        // line 31
        if (((isset($context["nav_current"]) ? $context["nav_current"] : null) == "contacts")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/contacts/';\"";
        }
        echo ">Контакты</span>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 31,  109 => 30,  101 => 29,  93 => 28,  85 => 27,  66 => 15,  58 => 14,  50 => 13,  42 => 12,  34 => 11,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"header\">
    <div class=\"menu_but\" onclick=\"menu_action('open');\"><i class=\"fa fa-bars\"></i></div>
    <div class=\"logo\"><img src=\"{{ base_url() }}/css/img/logo-b.png\" alt=\"\" /></div>
    <div class=\"right\">
\t<div class=\"links\">
\t    <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
\t    <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
\t    <a href=\"\"><i class=\"fa fa-youtube\"></i></a>
\t</div>
\t<div class=\"nav\">
\t    <span{% if nav_current == \"home\" %} class=\"active\"{% else %} onclick=\"location.href = '/';\"{% endif %}>Home</span>
\t    <span{% if nav_current == \"portfolio\" %} class=\"active\"{% else %} onclick=\"location.href = '/portfolio/';\"{% endif %}>Портфолио</span>
\t    <span{% if nav_current == \"video\" %} class=\"active\"{% else %} onclick=\"location.href = '/video/';\"{% endif %}>Видео</span>
\t    <span{% if nav_current == \"blog\" %} class=\"active\"{% else %} onclick=\"location.href = '/blog/';\"{% endif %}>Блог</span>
\t    <span{% if nav_current == \"contacts\" %} class=\"active\"{% else %} onclick=\"location.href = '/contacts/';\"{% endif %}>Контакты</span>
\t</div>
    </div>
</div>
<div class=\"m_nav\">
    <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
    <div class=\"links\">
\t<a href=\"\"><i class=\"fa fa-facebook\"></i></a>
\t<a href=\"\"><i class=\"fa fa-twitter\"></i></a>
\t<a href=\"\"><i class=\"fa fa-youtube\"></i></a>
    </div>
    <div class=\"nav\">
\t<span{% if nav_current == \"home\" %} class=\"active\"{% else %} onclick=\"location.href = '/';\"{% endif %}>Home</span>
\t<span{% if nav_current == \"portfolio\" %} class=\"active\"{% else %} onclick=\"location.href = '/portfolio/';\"{% endif %}>Портфолио</span>
\t<span{% if nav_current == \"video\" %} class=\"active\"{% else %} onclick=\"location.href = '/video/';\"{% endif %}>Видео</span>
\t<span{% if nav_current == \"blog\" %} class=\"active\"{% else %} onclick=\"location.href = '/blog/';\"{% endif %}>Блог</span>
\t<span{% if nav_current == \"contacts\" %} class=\"active\"{% else %} onclick=\"location.href = '/contacts/';\"{% endif %}>Контакты</span>
    </div>
</div>", "header.twig", "/home/u0138138/www/site4/public_html/app/templates/header.twig");
    }
}
