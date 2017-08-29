<?php

/* base.twig */
class __TwigTemplate_e4911019661357ec15156e5f283ad9a6d19ee6c2e46d54a0e8ca8eb27c6da959 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'container' => array($this, 'block_container'),
            'scripts' => array($this, 'block_scripts'),
            'styles' => array($this, 'block_styles'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
        <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
                <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - Pilot Pi</title>
        </head>
        <body>
                <div class=\"wrapper\">
                        <div class=\"container\">
                                ";
        // line 11
        $this->loadTemplate("header.twig", "base.twig", 11)->display($context);
        // line 12
        echo "
                                ";
        // line 13
        $this->displayBlock('container', $context, $blocks);
        // line 15
        echo "                        </div>
                        <div class=\"footer\"></div>
                </div>
                <div class=\"shadow\" onclick=\"menu_action('close');\"></div>
        </body>
        <script async type=\"text/javascript\" src=\"/js/main.js?3\"></script>
        ";
        // line 21
        $this->displayBlock('scripts', $context, $blocks);
        // line 23
        echo "</html>
<link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
<link href='/css/style.css?2' rel='stylesheet' type='text/css'>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
";
        // line 27
        $this->displayBlock('styles', $context, $blocks);
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 13
    public function block_container($context, array $blocks = array())
    {
        // line 14
        echo "                                ";
    }

    // line 21
    public function block_scripts($context, array $blocks = array())
    {
        // line 22
        echo "        ";
    }

    // line 27
    public function block_styles($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 27,  80 => 22,  77 => 21,  73 => 14,  70 => 13,  65 => 6,  61 => 27,  55 => 23,  53 => 21,  45 => 15,  43 => 13,  40 => 12,  38 => 11,  30 => 6,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
        <head>
                <meta charset=\"UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
                <title>{% block title %}{% endblock %} - Pilot Pi</title>
        </head>
        <body>
                <div class=\"wrapper\">
                        <div class=\"container\">
                                {% include 'header.twig' %}

                                {% block container %}
                                {% endblock %}
                        </div>
                        <div class=\"footer\"></div>
                </div>
                <div class=\"shadow\" onclick=\"menu_action('close');\"></div>
        </body>
        <script async type=\"text/javascript\" src=\"/js/main.js?3\"></script>
        {% block scripts %}
        {% endblock %}
</html>
<link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
<link href='/css/style.css?2' rel='stylesheet' type='text/css'>
<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
{% block styles %}
{% endblock %}", "base.twig", "/home/pilotpiru/public_html/app/templates/base.twig");
    }
}
