<?php

/* video.twig */
class __TwigTemplate_c82086d973c3a442334359a76ed76e2d3c168bfd93d945e2350308534cf0f726 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "video.twig", 1);
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
    }

    // line 6
    public function block_container($context, array $blocks = array())
    {
        // line 7
        echo "        <h2><a href=\"/video/\">Видео</a></h2>
        <div class=\"video_elem\"></div>
        <div class=\"imgs_galery video\">
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
        return "video.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  34 => 6,  29 => 3,  11 => 1,);
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

{% block title %}
{% endblock %}

{% block container %}
        <h2><a href=\"/video/\">Видео</a></h2>
        <div class=\"video_elem\"></div>
        <div class=\"imgs_galery video\">
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
{% endblock %}", "video.twig", "/home/u0138138/www/site4/public_html/app/templates/video.twig");
    }
}
