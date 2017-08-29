<?php

/* main.twig */
class __TwigTemplate_fad4d0a025bd3edc55a8f56409578e9d106bd2695ed22a49b5b0117b2418e656 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.twig", "main.twig", 1);
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
        echo "Номе";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "        <div class=\"main_img\"></div>
        <div class=\"submenu\">
                <span class=\"active\">avia</span>
                <span>landscapes</span>
                <span>portraits</span>
                <span>sport</span>
                <span>travel</span>
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

        <h2><a href=\"/video/\">Видео</a></h2>
        <div class=\"video_elem\"></div>

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

        <h2><a href=\"/contacts/\">Контакты</a></h2>
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
        return "main.twig";
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

{% block title %}Номе{% endblock %}

{% block container %}
        <div class=\"main_img\"></div>
        <div class=\"submenu\">
                <span class=\"active\">avia</span>
                <span>landscapes</span>
                <span>portraits</span>
                <span>sport</span>
                <span>travel</span>
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

        <h2><a href=\"/video/\">Видео</a></h2>
        <div class=\"video_elem\"></div>

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

        <h2><a href=\"/contacts/\">Контакты</a></h2>
        <div class=\"contacts\">
                <div>e-mail :: <a href=\"mailto:tasamaja.mazayka@gmail.com\">tasamaja.mazayka@gmail.com</a></div>
                <div>WhatsApp. :: <a href=\"whatsapp://send?text=message\">+7 921 752 44 86</a></div>
                <div>tumblr :: <a href=\"http://maorimaoricult.tumblr.com\" target=\"_blank\">http://maorimaoricult.tumblr.com</a></div>
                <div>web :: <a href=\"http://maorimaori.com\" target=\"_blank\">maorimaori.com</a></div>
                <div>facebook :: <a href=\"https://www.facebook.com/maorimaoricult\" target=\"_blank\">https://www.facebook.com/maorimaoricult</a></div>
        </div>
{% endblock %}", "main.twig", "/home/u0138138/www/site4/public_html/app/templates/main.twig");
    }
}
