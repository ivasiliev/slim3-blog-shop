<?php

/* main.twig */
class __TwigTemplate_bda2b1ac99a25b772f4cce3a0128ad56f50c6fb98889321ae79716d5ec7297ce extends Twig_Template
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
        echo "    <div class=\"main_img\" data-img=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["main_img"]) ? $context["main_img"] : null), "url", array()), "html", null, true);
        echo "\"></div>
    ";
        // line 15
        echo "    <div class=\"group_selector\">
\t<label>
\t    <select onchange=\"groups.init(this.value);\">
\t\t<option value=\"all\">Все</option>
\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 20
            echo "\t\t    ";
            if ( !$this->getAttribute($context["group"], "drop", array())) {
                // line 21
                echo "\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "title", array()), "html", null, true);
                echo "</option>
\t\t    ";
            }
            // line 23
            echo "\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "\t    </select>
\t    <i class=\"fa fa-caret-down\"></i>
\t</label>
    </div>
    <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
\t<div class=\"imgs_row\">
\t    ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["imgs"]) ? $context["imgs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
            // line 31
            echo "\t\t<div data-img=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["img"], "url", array()), "html", null, true);
            echo "\"></div>
\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "\t</div>
    </div>
    ";
        // line 53
        echo "    ";
        // line 95
        echo "    <h2><a href=\"/contacts/\">Контакты</a></h2>
    <div class=\"contacts\">
\t<div>e-mail :: <a href=\"mailto:";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "email", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "email", array()), "html", null, true);
        echo "</a></div>
\t<div>whatsApp :: <a href=\"whatsapp://tel:";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "whatsApp", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "whatsApp", array()), "html", null, true);
        echo "</a></div>
\t<div>instagram :: <a href=\"";
        // line 99
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "instagram", array()), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["contacts"]) ? $context["contacts"] : null), "instagram", array()), "html", null, true);
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
        return array (  113 => 99,  107 => 98,  101 => 97,  97 => 95,  95 => 53,  91 => 33,  82 => 31,  78 => 30,  70 => 24,  64 => 23,  56 => 21,  53 => 20,  49 => 19,  43 => 15,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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
    <div class=\"main_img\" data-img=\"{{ main_img.url }}\"></div>
    {#
    <div class=\"submenu\">
\t    <span class=\"active\">avia</span>
\t    <span>landscapes</span>
\t    <span>portraits</span>
\t    <span>sport</span>
\t    <span>travel</span>
    </div>#}
    <div class=\"group_selector\">
\t<label>
\t    <select onchange=\"groups.init(this.value);\">
\t\t<option value=\"all\">Все</option>
\t\t{% for group in groups %}
\t\t    {% if not group.drop %}
\t\t\t<option value=\"{{ group.id }}\">{{ group.title }}</option>
\t\t    {% endif %}
\t\t{% endfor %}
\t    </select>
\t    <i class=\"fa fa-caret-down\"></i>
\t</label>
    </div>
    <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
\t<div class=\"imgs_row\">
\t    {% for img in imgs %}
\t\t<div data-img=\"{{ img.url }}\"></div>
\t    {% endfor %}
\t</div>
    </div>
    {#
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
#}
    {#
\t<h2><a href=\"/video/\">Видео</a></h2>
\t<div class=\"video_elem\"></div>
    
\t<h2><a href=\"/blog/\">Блог</a></h2>
\t<div class=\"imgs_list\">
\t\t<div class=\"imgs_block\">
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"imgs_block\">
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t\t<div class=\"imgs_row\">
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t\t<div></div>
\t\t\t</div>
\t\t</div>
\t</div>
    #}
    <h2><a href=\"/contacts/\">Контакты</a></h2>
    <div class=\"contacts\">
\t<div>e-mail :: <a href=\"mailto:{{ contacts.email }}\">{{ contacts.email }}</a></div>
\t<div>whatsApp :: <a href=\"whatsapp://tel:{{ contacts.whatsApp }}\">{{ contacts.whatsApp }}</a></div>
\t<div>instagram :: <a href=\"{{ contacts.instagram }}\" target=\"_blank\">{{ contacts.instagram }}</a></div>
    </div>
{% endblock %}", "main.twig", "/home/pilotpiru/public_html/app/templates/main.twig");
    }
}
