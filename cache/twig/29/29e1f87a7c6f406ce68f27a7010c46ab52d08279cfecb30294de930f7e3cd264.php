<?php

/* contacts.twig */
class __TwigTemplate_b3283d6d6fce0ef94e217f8e8d2bdbf6fbbe31ab7a2fb12b9be6e97ef3772b82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "contacts.twig", 1);
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
        echo "Контакты";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <h2><a href=\"/contacts/\">Контакты</a></h2>
        <div class=\"contacts\">
                <div>e-mail :: <a href=\"mailto:tasamaja.mazayka@gmail.com\">tasamaja.mazayka@gmail.com</a></div>
                <div>WhatsApp. :: <a href=\"whatsapp://send?text=message\">+7 921 752 44 86</a></div>
                <div>tumblr :: <a href=\"http://maorimaoricult.tumblr.com\" target=\"_blank\">http://maorimaoricult.tumblr.com</a></div>
                <div>web :: <a href=\"http://maorimaori.com\" target=\"_blank\">maorimaori.com</a></div>
                <div>facebook :: <a href=\"https://www.facebook.com/maorimaoricult\" target=\"_blank\">https://www.facebook.com/maorimaoricult</a></div>
        </div>
";
    }

    public function getTemplateName()
    {
        return "contacts.twig";
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

{% block title %}Контакты{% endblock %}

{% block container %}
        <h2><a href=\"/contacts/\">Контакты</a></h2>
        <div class=\"contacts\">
                <div>e-mail :: <a href=\"mailto:tasamaja.mazayka@gmail.com\">tasamaja.mazayka@gmail.com</a></div>
                <div>WhatsApp. :: <a href=\"whatsapp://send?text=message\">+7 921 752 44 86</a></div>
                <div>tumblr :: <a href=\"http://maorimaoricult.tumblr.com\" target=\"_blank\">http://maorimaoricult.tumblr.com</a></div>
                <div>web :: <a href=\"http://maorimaori.com\" target=\"_blank\">maorimaori.com</a></div>
                <div>facebook :: <a href=\"https://www.facebook.com/maorimaoricult\" target=\"_blank\">https://www.facebook.com/maorimaoricult</a></div>
        </div>
{% endblock %}", "contacts.twig", "/home/u0138138/www/site4/public_html/app/templates/contacts.twig");
    }
}
