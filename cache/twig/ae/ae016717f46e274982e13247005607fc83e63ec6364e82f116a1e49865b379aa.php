<?php

/* portfolio.twig */
class __TwigTemplate_2731f0aa7e5734579ca17f24ddad54fc5982291619fa432bce5cc46edb7127c3 extends Twig_Template
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
        echo "        <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div style=\"width: 66%;\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
        </div>
        <div class=\"imgs_galery\">
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div style=\"width: 66%;\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
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

{% block title %}Портфолио{% endblock %}

{% block container %}
        <div class=\"imgs_galery\" style=\"margin-top: 30px;\">
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div style=\"width: 66%;\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
        </div>
        <div class=\"imgs_galery\">
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div style=\"width: 66%;\"></div>
                </div>
                <div class=\"imgs_row\">
                        <div></div>
                        <div></div>
                        <div></div>
                </div>
        </div>
{% endblock %}", "portfolio.twig", "/home/u0138138/www/site4/public_html/app/templates/portfolio.twig");
    }
}
