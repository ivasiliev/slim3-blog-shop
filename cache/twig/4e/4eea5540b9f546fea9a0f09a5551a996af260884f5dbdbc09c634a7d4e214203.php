<?php

/* blog_curr.twig */
class __TwigTemplate_830502c4938e3477e075cd345e1cbbbaf09447ed209470c6a9470fa93a4711ed extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "blog_curr.twig", 1);
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
        echo "        <div class=\"blog_curr_content\">
        ";
        // line 7
        if (((isset($context["blog"]) ? $context["blog"] : null) && $this->getAttribute((isset($context["blog"]) ? $context["blog"] : null), "txt", array()))) {
            // line 8
            echo "                ";
            echo $this->getAttribute((isset($context["blog"]) ? $context["blog"] : null), "txt", array());
            echo "
        ";
        } else {
            // line 10
            echo "                <div style=\"text-align: center;\">Жаль, но такой страницы нет</div>
        ";
        }
        // line 12
        echo "        </div>
";
    }

    public function getTemplateName()
    {
        return "blog_curr.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 12,  49 => 10,  43 => 8,  41 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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
        <div class=\"blog_curr_content\">
        {% if blog and blog.txt %}
                {{ blog.txt|raw }}
        {% else %}
                <div style=\"text-align: center;\">Жаль, но такой страницы нет</div>
        {% endif %}
        </div>
{% endblock %}", "blog_curr.twig", "/home/pilotpiru/public_html/app/templates/blog_curr.twig");
    }
}
