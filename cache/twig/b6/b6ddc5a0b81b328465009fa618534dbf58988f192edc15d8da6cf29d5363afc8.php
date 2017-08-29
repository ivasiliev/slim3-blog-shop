<?php

/* instagram.twig */
class __TwigTemplate_64e299ca81717e5113bb9593187e16cb3e3957fce09a4c16e93a64e912b0b916 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "instagram.twig", 1);
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
        echo "Инстаграм";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <h2><a href=\"/blog/\">загрузка с инстраграма...</a></h2>
        <div class=\"inwidet_cont\">
                <iframe src='/inwidget/index.php?width=800&inline=5&view=50&toolbar=false&preview=fullsize' scrolling='no' frameborder='no' class=\"inwidet_iframe\"></iframe>
        </div>
";
    }

    public function getTemplateName()
    {
        return "instagram.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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

{% block title %}Инстаграм{% endblock %}

{% block container %}
        <h2><a href=\"/blog/\">загрузка с инстраграма...</a></h2>
        <div class=\"inwidet_cont\">
                <iframe src='/inwidget/index.php?width=800&inline=5&view=50&toolbar=false&preview=fullsize' scrolling='no' frameborder='no' class=\"inwidet_iframe\"></iframe>
        </div>
{% endblock %}", "instagram.twig", "/home/pilotpiru/public_html/app/templates/instagram.twig");
    }
}
