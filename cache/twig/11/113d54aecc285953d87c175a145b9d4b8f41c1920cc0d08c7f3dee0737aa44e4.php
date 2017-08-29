<?php

/* header.twig */
class __TwigTemplate_607289c558dc10fbd17fc59a3d859f8804f31034d4807ac7794a692641f71dd8 extends Twig_Template
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
                <div class=\"links\">
                        <a href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "links", array()), "instagram", array()), "html", null, true);
        echo "\"><i class=\"fa fa-facebook\"></i></a>
                        <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "links", array()), "twitter", array()), "html", null, true);
        echo "\"><i class=\"fa fa-twitter\"></i></a>
                        <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "links", array()), "youtube", array()), "html", null, true);
        echo "\"><i class=\"fa fa-youtube\"></i></a>
                </div>
                <div class=\"nav\">
                        <span";
        // line 11
        if ((($context["nav_current"] ?? null) == "home")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/';\"";
        }
        echo ">Home</span>
                        <span";
        // line 12
        if ((($context["nav_current"] ?? null) == "portfolio")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/portfolio/';\"";
        }
        echo ">Портфолио</span>
                        ";
        // line 14
        echo "                        <span";
        if ((($context["nav_current"] ?? null) == "blog")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/blog/';\"";
        }
        echo ">Блог</span>
                        <span";
        // line 15
        if ((($context["nav_current"] ?? null) == "instagram")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/instagram/';\"";
        }
        echo ">Инстаграм</span>
                        <span";
        // line 16
        if ((($context["nav_current"] ?? null) == "contacts")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/contacts/';\"";
        }
        echo ">Контакты</span>
                </div>
        </div>
</div>
<div class=\"m_nav\">
        <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
        <div class=\"links\">
                <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
                <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
                <a href=\"\"><i class=\"fa fa-youtube\"></i></a>
        </div>
        <div class=\"nav\">
                <span";
        // line 28
        if ((($context["nav_current"] ?? null) == "home")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/';\"";
        }
        echo ">Home</span>
                <span";
        // line 29
        if ((($context["nav_current"] ?? null) == "portfolio")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/portfolio/';\"";
        }
        echo ">Портфолио</span>
                ";
        // line 31
        echo "                <span";
        if ((($context["nav_current"] ?? null) == "blog")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/blog/';\"";
        }
        echo ">Блог</span>
                <span";
        // line 32
        if ((($context["nav_current"] ?? null) == "instagram")) {
            echo " class=\"active\"";
        } else {
            echo " onclick=\"location.href = '/instagram/';\"";
        }
        echo ">Инстаграм</span>
                <span";
        // line 33
        if ((($context["nav_current"] ?? null) == "contacts")) {
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
        return array (  128 => 33,  120 => 32,  111 => 31,  103 => 29,  95 => 28,  76 => 16,  68 => 15,  59 => 14,  51 => 12,  43 => 11,  37 => 8,  33 => 7,  29 => 6,  23 => 3,  19 => 1,);
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
                <div class=\"links\">
                        <a href=\"{{ data.links.instagram }}\"><i class=\"fa fa-facebook\"></i></a>
                        <a href=\"{{ data.links.twitter }}\"><i class=\"fa fa-twitter\"></i></a>
                        <a href=\"{{ data.links.youtube }}\"><i class=\"fa fa-youtube\"></i></a>
                </div>
                <div class=\"nav\">
                        <span{% if nav_current == \"home\" %} class=\"active\"{% else %} onclick=\"location.href = '/';\"{% endif %}>Home</span>
                        <span{% if nav_current == \"portfolio\" %} class=\"active\"{% else %} onclick=\"location.href = '/portfolio/';\"{% endif %}>Портфолио</span>
                        {#<span{% if nav_current == \"video\" %} class=\"active\"{% else %} onclick=\"location.href = '/video/';\"{% endif %}>Видео</span>#}
                        <span{% if nav_current == \"blog\" %} class=\"active\"{% else %} onclick=\"location.href = '/blog/';\"{% endif %}>Блог</span>
                        <span{% if nav_current == \"instagram\" %} class=\"active\"{% else %} onclick=\"location.href = '/instagram/';\"{% endif %}>Инстаграм</span>
                        <span{% if nav_current == \"contacts\" %} class=\"active\"{% else %} onclick=\"location.href = '/contacts/';\"{% endif %}>Контакты</span>
                </div>
        </div>
</div>
<div class=\"m_nav\">
        <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
        <div class=\"links\">
                <a href=\"\"><i class=\"fa fa-facebook\"></i></a>
                <a href=\"\"><i class=\"fa fa-twitter\"></i></a>
                <a href=\"\"><i class=\"fa fa-youtube\"></i></a>
        </div>
        <div class=\"nav\">
                <span{% if nav_current == \"home\" %} class=\"active\"{% else %} onclick=\"location.href = '/';\"{% endif %}>Home</span>
                <span{% if nav_current == \"portfolio\" %} class=\"active\"{% else %} onclick=\"location.href = '/portfolio/';\"{% endif %}>Портфолио</span>
                {#<span{% if nav_current == \"video\" %} class=\"active\"{% else %} onclick=\"location.href = '/video/';\"{% endif %}>Видео</span>#}
                <span{% if nav_current == \"blog\" %} class=\"active\"{% else %} onclick=\"location.href = '/blog/';\"{% endif %}>Блог</span>
                <span{% if nav_current == \"instagram\" %} class=\"active\"{% else %} onclick=\"location.href = '/instagram/';\"{% endif %}>Инстаграм</span>
                <span{% if nav_current == \"contacts\" %} class=\"active\"{% else %} onclick=\"location.href = '/contacts/';\"{% endif %}>Контакты</span>
        </div>
</div>", "header.twig", "/home/pilotpiru/public_html/app/templates/header.twig");
    }
}
