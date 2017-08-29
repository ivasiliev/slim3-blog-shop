<?php

/* admin/header.twig */
class __TwigTemplate_c24a96b230b41ae01f13aa56e8df861a3c976b61a4bfc77a1c42437f3a307154 extends Twig_Template
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
                        <a href=\"/?logout\"><i class=\"fa fa-sign-out\"></i></a>
                </div>
                <div class=\"nav\">
                        <span class=\"active\" nav_elem=\"main\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Основное</span>
                        <span nav_elem=\"photo\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Фото</span>
                        <span nav_elem=\"groups\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Группы</span>
                        <span nav_elem=\"video\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Видео</span>
                        <span nav_elem=\"blog\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Блог</span>
                </div>
        </div>
</div>
<div class=\"m_nav\">
        <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
        <div class=\"links\">
                <a href=\"/?logout\"><i class=\"fa fa-sign-out\"></i></a>
        </div>
        <div class=\"nav\">
                <span class=\"active\" nav_elem=\"main\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Основное</span>
                <span nav_elem=\"photo\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Фото</span>
                <span nav_elem=\"groups\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Группы</span>
                <span nav_elem=\"video\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Видео</span>
                <span nav_elem=\"blog\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Блог</span>
        </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
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
                        <a href=\"/?logout\"><i class=\"fa fa-sign-out\"></i></a>
                </div>
                <div class=\"nav\">
                        <span class=\"active\" nav_elem=\"main\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Основное</span>
                        <span nav_elem=\"photo\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Фото</span>
                        <span nav_elem=\"groups\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Группы</span>
                        <span nav_elem=\"video\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Видео</span>
                        <span nav_elem=\"blog\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Блог</span>
                </div>
        </div>
</div>
<div class=\"m_nav\">
        <div class=\"menu_but\" onclick=\"menu_action('close');\"><i class=\"fa fa-bars\"></i></div>
        <div class=\"links\">
                <a href=\"/?logout\"><i class=\"fa fa-sign-out\"></i></a>
        </div>
        <div class=\"nav\">
                <span class=\"active\" nav_elem=\"main\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Основное</span>
                <span nav_elem=\"photo\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Фото</span>
                <span nav_elem=\"groups\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Группы</span>
                <span nav_elem=\"video\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Видео</span>
                <span nav_elem=\"blog\" onclick=\"tabs_handler.open(this.getAttribute('nav_elem'));\">Блог</span>
        </div>
</div>", "admin/header.twig", "/home/pilotpiru/public_html/app/templates/admin/header.twig");
    }
}
