<?php

/* blog.twig */
class __TwigTemplate_5061a0982d2afb42aafa6a2ef3e85680af94a34830175785ef01f9ab93fc24ab extends Twig_Template
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
    }

    // line 6
    public function block_container($context, array $blocks = array())
    {
        // line 7
        echo "        <h2><a href=\"/blog/\">Блог</a></h2>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
";
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
        <h2><a href=\"/blog/\">Блог</a></h2>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
        <div class=\"imgs_list\">
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
                <div class=\"imgs_block\">
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                        <div class=\"imgs_row\">
                                <div></div>
                                <div></div>
                                <div></div>
                        </div>
                </div>
        </div>
{% endblock %}", "blog.twig", "/home/u0138138/www/site4/public_html/app/templates/blog.twig");
    }
}
