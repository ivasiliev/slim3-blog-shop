<?php

/* blog.twig */
class __TwigTemplate_de6546f1e52cd14343be5e426d005aa0af550e3c8743369d37f5954e966072c0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "blog.twig", 1);
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
        echo "Блог";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <h2><a href=\"/blog/\">Блог</a></h2>
        ";
        // line 7
        if (((isset($context["blog"]) ? $context["blog"] : null) && (twig_length_filter($this->env, (isset($context["blog"]) ? $context["blog"] : null)) > 0))) {
            // line 8
            echo "                <div>Запись в блоге</div>
        ";
        } else {
            // line 10
            echo "                <div style=\"text-align: center;\">В блоге пока нет записей</div>
        ";
        }
    }

    public function getTemplateName()
    {
        return "blog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Блог{% endblock %}

{% block container %}
        <h2><a href=\"/blog/\">Блог</a></h2>
        {% if blog and blog|length > 0 %}
                <div>Запись в блоге</div>
        {% else %}
                <div style=\"text-align: center;\">В блоге пока нет записей</div>
        {% endif %}
{% endblock %}", "blog.twig", "/home/pilotpiru/public_html/app/templates/blog.twig");
    }
}
