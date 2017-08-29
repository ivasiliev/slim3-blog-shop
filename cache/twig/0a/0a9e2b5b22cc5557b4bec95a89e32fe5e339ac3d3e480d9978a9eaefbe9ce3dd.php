<?php

/* main.twig */
class __TwigTemplate_b682d7be82452e14eef34e7ca3ae89a963d7c7be5917a70723dde2b044c57a8e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "main.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Номе";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <div class=\"main_img\" data-img=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 0, array(), "array"), "html", null, true);
        echo "\"></div>
        <div class=\"submenu\">
                ";
        // line 15
        echo "        </div>
        <div class=\"imgs_galery\">
                <div class=\"imgs_row\">
                        <div data-img=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 1, array(), "array"), "html", null, true);
        echo "\"></div>
                        <div data-img=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 2, array(), "array"), "html", null, true);
        echo "\"></div>
                        <div data-img=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 3, array(), "array"), "html", null, true);
        echo "\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div data-img=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 4, array(), "array"), "html", null, true);
        echo "\"></div>
                        <div data-img=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 5, array(), "array"), "html", null, true);
        echo "\" class=\"w_66\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div data-img=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 6, array(), "array"), "html", null, true);
        echo "\"></div>
                        <div data-img=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 7, array(), "array"), "html", null, true);
        echo "\"></div>
                        <div data-img=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["imgs"] ?? null), 8, array(), "array"), "html", null, true);
        echo "\"></div>
                </div>
        </div>
        ";
        // line 74
        echo "        <h2><a href=\"/contacts/\">Контакты</a></h2>
        <div class=\"contacts\">
                <div>e-mail :: <a href=\"mailto:";
        // line 76
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "email", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "email", array()), "html", null, true);
        echo "</a></div>
                <div>whatsApp :: <a href=\"whatsapp://tel:";
        // line 77
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "whatsApp", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "whatsApp", array()), "html", null, true);
        echo "</a></div>
                <div>instagram :: <a href=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "instagram", array()), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "instagram", array()), "html", null, true);
        echo "</a></div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 78,  97 => 77,  91 => 76,  87 => 74,  81 => 29,  77 => 28,  73 => 27,  67 => 24,  63 => 23,  57 => 20,  53 => 19,  49 => 18,  44 => 15,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"base.twig\" %}

{% block title %}Номе{% endblock %}

{% block container %}
        <div class=\"main_img\" data-img=\"{{imgs[0]}}\"></div>
        <div class=\"submenu\">
                {#
                <span class=\"active\">avia</span>
                <span>landscapes</span>
                <span>portraits</span>
                <span>sport</span>
                <span>travel</span>
         #}
        </div>
        <div class=\"imgs_galery\">
                <div class=\"imgs_row\">
                        <div data-img=\"{{imgs[1]}}\"></div>
                        <div data-img=\"{{imgs[2]}}\"></div>
                        <div data-img=\"{{imgs[3]}}\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div data-img=\"{{imgs[4]}}\"></div>
                        <div data-img=\"{{imgs[5]}}\" class=\"w_66\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div data-img=\"{{imgs[6]}}\"></div>
                        <div data-img=\"{{imgs[7]}}\"></div>
                        <div data-img=\"{{imgs[8]}}\"></div>
                </div>
        </div>
        {#
            <h2><a href=\"/video/\">Видео</a></h2>
            <div class=\"video_elem\"></div>
        
            <h2><a href=\"/blog/\">Блог</a></h2>
            <div class=\"imgs_list\">
                    <div class=\"imgs_block\">
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                    </div>
                    <div class=\"imgs_block\">
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                            <div class=\"imgs_row\">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            </div>
                    </div>
            </div>
        #}
        <h2><a href=\"/contacts/\">Контакты</a></h2>
        <div class=\"contacts\">
                <div>e-mail :: <a href=\"mailto:{{ data.contacts.email }}\">{{ data.contacts.email }}</a></div>
                <div>whatsApp :: <a href=\"whatsapp://tel:{{ data.contacts.whatsApp }}\">{{ data.contacts.whatsApp }}</a></div>
                <div>instagram :: <a href=\"{{ data.contacts.instagram }}\" target=\"_blank\">{{ data.contacts.instagram }}</a></div>
        </div>
{% endblock %}", "main.twig", "/home/pilotpiru/public_html/app/templates/main.twig");
    }
}
