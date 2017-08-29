<?php

/* portfolio.twig */
class __TwigTemplate_7b31000fd8ae09229608877b06992a42fe727dd5fd1359e67563dea7169adce2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "portfolio.twig", 1);
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
        echo "Портфолио";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <div class=\"group_selector\">
                <label>
                        <select onchange=\"groups.init(this.value);\">
                                <option value=\"all\">Все</option>
                                ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["groups"]) ? $context["groups"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 11
            echo "                                        ";
            if ( !$this->getAttribute($context["group"], "drop", array())) {
                // line 12
                echo "                                        <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "title", array()), "html", null, true);
                echo "</option>
                                        ";
            }
            // line 14
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                        </select>
                        <i class=\"fa fa-caret-down\"></i>
                </label>
        </div>
        <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
                <div class=\"imgs_row\">
                        ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["imgs"]) ? $context["imgs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
            // line 22
            echo "                                <div data-img=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["img"], "url", array()), "html", null, true);
            echo "\"></div>
                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "                </div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "portfolio.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 24,  77 => 22,  73 => 21,  65 => 15,  59 => 14,  51 => 12,  48 => 11,  44 => 10,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Портфолио{% endblock %}

{% block container %}
        <div class=\"group_selector\">
                <label>
                        <select onchange=\"groups.init(this.value);\">
                                <option value=\"all\">Все</option>
                                {% for group in groups %}
                                        {% if not group.drop %}
                                        <option value=\"{{ group.id }}\">{{ group.title }}</option>
                                        {% endif %}
                                {% endfor %}
                        </select>
                        <i class=\"fa fa-caret-down\"></i>
                </label>
        </div>
        <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
                <div class=\"imgs_row\">
                        {% for img in imgs %}
                                <div data-img=\"{{ img.url }}\"></div>
                        {% endfor %}
                </div>
        </div>
{% endblock %}", "portfolio.twig", "/home/pilotpiru/public_html/app/templates/portfolio.twig");
    }
}
