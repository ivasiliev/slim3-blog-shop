<?php

/* admin/base.twig */
class __TwigTemplate_b3f78d4ad4d6b44f85ff5cc6b66f1a2228ca1f0db4827312fac858f282609679 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'styles' => array($this, 'block_styles'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
        <head>
                <meta name=\"http-equiv\" content=\"Content-type: text/html; charset=UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
                <title>Админка - Pilot Pi</title>
                <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
                <link href='/css/admin/style.css?2' rel='stylesheet' type='text/css'>
                <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
                ";
        // line 10
        $this->displayBlock('styles', $context, $blocks);
        // line 12
        echo "                <script src=\"/js/admin/main.js?2\" charset=\"utf-8\"></script>
                <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
                <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
                <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e7x7zk635m3yq3kf455olw89p5gr9yf9mie9tx32keeye1ao\"></script>
                ";
        // line 16
        $this->displayBlock('scripts', $context, $blocks);
        // line 18
        echo "        </head>
        <body>
                <div class=\"wrapper\">
                        <div class=\"container\">
                                ";
        // line 22
        $this->loadTemplate("admin/header.twig", "admin/base.twig", 22)->display($context);
        // line 23
        echo "                                ";
        $this->loadTemplate("admin/content.twig", "admin/base.twig", 23)->display($context);
        // line 24
        echo "                        </div>
                        <div class=\"footer\"></div>
                </div>
                <div class=\"shadow\" onclick=\"menu_action('close');\"></div>
        </body>
</html>";
    }

    // line 10
    public function block_styles($context, array $blocks = array())
    {
        // line 11
        echo "                ";
    }

    // line 16
    public function block_scripts($context, array $blocks = array())
    {
        // line 17
        echo "                ";
    }

    public function getTemplateName()
    {
        return "admin/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 17,  69 => 16,  65 => 11,  62 => 10,  53 => 24,  50 => 23,  48 => 22,  42 => 18,  40 => 16,  34 => 12,  32 => 10,  21 => 1,);
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
                <meta name=\"http-equiv\" content=\"Content-type: text/html; charset=UTF-8\">
                <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">
                <title>Админка - Pilot Pi</title>
                <link href=\"https://fonts.googleapis.com/css?family=Roboto:400,700,900&amp;subset=cyrillic\" rel=\"stylesheet\">
                <link href='/css/admin/style.css?2' rel='stylesheet' type='text/css'>
                <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/font-awesome.min.css\">
                {% block styles %}
                {% endblock %}
                <script src=\"/js/admin/main.js?2\" charset=\"utf-8\"></script>
                <script src=\"https://code.jquery.com/jquery-1.12.4.js\"></script>
                <script src=\"https://code.jquery.com/ui/1.12.1/jquery-ui.js\"></script>
                <script src=\"https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=e7x7zk635m3yq3kf455olw89p5gr9yf9mie9tx32keeye1ao\"></script>
                {% block scripts %}
                {% endblock %}
        </head>
        <body>
                <div class=\"wrapper\">
                        <div class=\"container\">
                                {% include 'admin/header.twig' %}
                                {% include 'admin/content.twig' %}
                        </div>
                        <div class=\"footer\"></div>
                </div>
                <div class=\"shadow\" onclick=\"menu_action('close');\"></div>
        </body>
</html>", "admin/base.twig", "/home/pilotpiru/public_html/app/templates/admin/base.twig");
    }
}
