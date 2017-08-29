<?php

/* base.twig */
class __TwigTemplate_91416768efb4ea80b8b137ef68318076ad61a018b62029268547bcae0d8b0ce2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'styles' => array($this, 'block_styles'),
            'container' => array($this, 'block_container'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo " - Pilot Pi</title>
        <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
        <link href='";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->baseUrl(), "html", null, true);
        echo "/css/style.css' rel='stylesheet' type='text/css'>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->baseUrl(), "html", null, true);
        echo "/css/font-awesome.min.css\">
\t";
        // line 10
        $this->displayBlock('styles', $context, $blocks);
        // line 12
        echo "    </head>
    <body>
        <div class=\"wrapper\">
\t    <div class=\"container\">
\t\t";
        // line 16
        $this->loadTemplate("header.twig", "base.twig", 16)->display($context);
        // line 17
        echo "
\t\t";
        // line 18
        $this->displayBlock('container', $context, $blocks);
        // line 20
        echo "\t    </div>
\t    <div class=\"footer\"></div>
\t</div>
\t<div class=\"shadow\" onclick=\"menu_action('close');\"></div>
    </body>
    <script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Slim\Views\TwigExtension')->baseUrl(), "html", null, true);
        echo "/js/main.js\"></script>
    ";
        // line 26
        $this->displayBlock('scripts', $context, $blocks);
        // line 28
        echo "</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_styles($context, array $blocks = array())
    {
        // line 11
        echo "\t";
    }

    // line 18
    public function block_container($context, array $blocks = array())
    {
        // line 19
        echo "\t\t";
    }

    // line 26
    public function block_scripts($context, array $blocks = array())
    {
        // line 27
        echo "    ";
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
        return array (  97 => 27,  94 => 26,  90 => 19,  87 => 18,  83 => 11,  80 => 10,  75 => 6,  71 => 28,  69 => 26,  65 => 25,  58 => 20,  56 => 18,  53 => 17,  51 => 16,  45 => 12,  43 => 10,  39 => 9,  35 => 8,  30 => 6,  23 => 1,);
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
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
        <title>{% block title %}{% endblock %} - Pilot Pi</title>
        <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
        <link href='{{ base_url() }}/css/style.css' rel='stylesheet' type='text/css'>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"{{ base_url() }}/css/font-awesome.min.css\">
\t{% block styles %}
\t{% endblock %}
    </head>
    <body>
        <div class=\"wrapper\">
\t    <div class=\"container\">
\t\t{% include 'header.twig' %}

\t\t{% block container %}
\t\t{% endblock %}
\t    </div>
\t    <div class=\"footer\"></div>
\t</div>
\t<div class=\"shadow\" onclick=\"menu_action('close');\"></div>
    </body>
    <script type=\"text/javascript\" src=\"{{ base_url() }}/js/main.js\"></script>
    {% block scripts %}
    {% endblock %}
</html>", "base.twig", "/home/u0138138/www/site4/public_html/app/templates/base.twig");
    }
}
