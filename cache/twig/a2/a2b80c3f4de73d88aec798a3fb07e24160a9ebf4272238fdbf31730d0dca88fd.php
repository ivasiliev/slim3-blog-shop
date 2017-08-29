<?php

/* contacts.twig */
class __TwigTemplate_8ec89cdb6559ffcf0d5c83aea85bbcab61ab141e148279a4f443056624334d26 extends Twig_Template
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
                <div>e-mail :: <a href=\"mailto:";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "email", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "email", array()), "html", null, true);
        echo "</a></div>
                <div>whatsApp :: <a href=\"whatsapp://tel:";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "whatsApp", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "whatsApp", array()), "html", null, true);
        echo "</a></div>
                <div>instagram :: <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "instagram", array()), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["data"] ?? null), "contacts", array()), "instagram", array()), "html", null, true);
        echo "</a></div>
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
        return array (  54 => 10,  48 => 9,  42 => 8,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
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
                <div>e-mail :: <a href=\"mailto:{{ data.contacts.email }}\">{{ data.contacts.email }}</a></div>
                <div>whatsApp :: <a href=\"whatsapp://tel:{{ data.contacts.whatsApp }}\">{{ data.contacts.whatsApp }}</a></div>
                <div>instagram :: <a href=\"{{ data.contacts.instagram }}\" target=\"_blank\">{{ data.contacts.instagram }}</a></div>
        </div>
{% endblock %}", "contacts.twig", "/home/pilotpiru/public_html/app/templates/contacts.twig");
    }
}
