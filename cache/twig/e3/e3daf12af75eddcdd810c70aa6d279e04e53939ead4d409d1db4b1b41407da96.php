<?php

/* admin/content.twig */
class __TwigTemplate_d998f8f417fb6671ee56603ef963a061702e149e2112883634f3bbf4d1d797b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"main nav_content_block active\">
        <h4>Контакты<span onclick=\"main_data.save();\">сохранить</span></h4>
        <div class=\"inputs_cont\">
                <span>e-mail</span>
                <input type=\"text\" main_data=\"contacts_email\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "contacts", array()), "email", array()), "html", null, true);
        echo "\">
        </div>
        <div class=\"inputs_cont\">
                <span>whatsApp</span>
                <input type=\"text\" main_data=\"contacts_whatsApp\" value=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "contacts", array()), "whatsApp", array()), "html", null, true);
        echo "\">
        </div>
        <div class=\"inputs_cont\">
                <span>instagram</span>
                <input type=\"text\" main_data=\"contacts_instagram\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "contacts", array()), "instagram", array()), "html", null, true);
        echo "\">
        </div>

        <h4>Ссылки<span onclick=\"main_data.save();\">сохранить</span></h4>
        <div class=\"inputs_cont\">
                <span>instagram</span>
                <input type=\"text\" main_data=\"links_instagram\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "links", array()), "instagram", array()), "html", null, true);
        echo "\">
        </div>
        <div class=\"inputs_cont\">
                <span>twitter</span>
                <input type=\"text\" main_data=\"links_twitter\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "links", array()), "twitter", array()), "html", null, true);
        echo "\">
        </div>
        <div class=\"inputs_cont\">
                <span>youtube</span>
                <input type=\"text\" main_data=\"links_youtube\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "links", array()), "youtube", array()), "html", null, true);
        echo "\">
        </div>
</div>

<div class=\"photo nav_content_block\">
        <div class=\"buttons_cont\">
                <button type=\"button\" onclick=\"file_img.drop_init(this.parentNode);\" drop_photo=\"open\">Выбрать фото для удаления</button>
                <button type=\"button\" onclick=\"file_img.drop_cancel(this.parentNode);\" drop_photo=\"cancel\" style=\"display: none;\">Отмена</button>
                <button type=\"button\" onclick=\"file_img.drop_send(this.parentNode);\" drop_photo=\"drop\" style=\"display: none;\">Удалить</button>
        </div>
        <div class=\"add_photo\"></div>
        <h4>Добавленные сейчас фото</h4>
        <div class=\"imgs_elem_cont uploaded_photo_preview\">
        </div>
        <h4>Загруженные фото</h4>
        <div class=\"imgs_elem_cont\">
                ";
        // line 43
        $context["counter"] = 0;
        // line 44
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["imgs"]) ? $context["imgs"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["img"]) {
            if (((isset($context["counter"]) ? $context["counter"] : null) < 5)) {
                // line 45
                echo "                        <div class=\"img_elem_show\" data-img=\"";
                echo twig_escape_filter($this->env, $context["img"], "html", null, true);
                echo "\"></div>
                        ";
                // line 47
                echo "                ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['img'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "        </div>
</div>

<div class=\"video nav_content_block\">
        <div class=\"inputs_cont\">
                <span>Добавить видео</span>
                <input type=\"text\" video_data=\"video_link\" oninput=\"video.check_video_url(this);\">
                <font class=\"add_elem_button\" onclick=\"video.save();\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i></font>
        </div>
        <h4>Добавленные видео</h4>
        <div class=\"video_cont\">
                ";
        // line 59
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "video", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["curr_video"]) {
            // line 60
            echo "                        <div><iframe width=\"100%\" height=\"100%\" src=\"";
            echo twig_escape_filter($this->env, $context["curr_video"], "html", null, true);
            echo "\" frameborder=\"0\" allowfullscreen></iframe></div>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['curr_video'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "        </div>
</div>

<div class=\"blog nav_content_block\">
        <button class=\"add_button\" onclick=\"blog.create_open();\">Добавить</button>
        <h4>Записи в блоге</h4>
        <div class=\"blog_added_block\">
        </div>
</div>

<div class=\"groups nav_content_block\">
        <button class=\"add_button\" onclick=\"groups.create_open();\">Добавить</button>
        <h4>Группы фото</h4>
        <div class=\"groups_added_block\">
        </div>
</div>";
    }

    public function getTemplateName()
    {
        return "admin/content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 62,  118 => 60,  114 => 59,  101 => 48,  94 => 47,  89 => 45,  83 => 44,  81 => 43,  62 => 27,  55 => 23,  48 => 19,  39 => 13,  32 => 9,  25 => 5,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"main nav_content_block active\">
        <h4>Контакты<span onclick=\"main_data.save();\">сохранить</span></h4>
        <div class=\"inputs_cont\">
                <span>e-mail</span>
                <input type=\"text\" main_data=\"contacts_email\" value=\"{{ data.contacts.email }}\">
        </div>
        <div class=\"inputs_cont\">
                <span>whatsApp</span>
                <input type=\"text\" main_data=\"contacts_whatsApp\" value=\"{{ data.contacts.whatsApp }}\">
        </div>
        <div class=\"inputs_cont\">
                <span>instagram</span>
                <input type=\"text\" main_data=\"contacts_instagram\" value=\"{{ data.contacts.instagram }}\">
        </div>

        <h4>Ссылки<span onclick=\"main_data.save();\">сохранить</span></h4>
        <div class=\"inputs_cont\">
                <span>instagram</span>
                <input type=\"text\" main_data=\"links_instagram\" value=\"{{ data.links.instagram }}\">
        </div>
        <div class=\"inputs_cont\">
                <span>twitter</span>
                <input type=\"text\" main_data=\"links_twitter\" value=\"{{ data.links.twitter }}\">
        </div>
        <div class=\"inputs_cont\">
                <span>youtube</span>
                <input type=\"text\" main_data=\"links_youtube\" value=\"{{ data.links.youtube }}\">
        </div>
</div>

<div class=\"photo nav_content_block\">
        <div class=\"buttons_cont\">
                <button type=\"button\" onclick=\"file_img.drop_init(this.parentNode);\" drop_photo=\"open\">Выбрать фото для удаления</button>
                <button type=\"button\" onclick=\"file_img.drop_cancel(this.parentNode);\" drop_photo=\"cancel\" style=\"display: none;\">Отмена</button>
                <button type=\"button\" onclick=\"file_img.drop_send(this.parentNode);\" drop_photo=\"drop\" style=\"display: none;\">Удалить</button>
        </div>
        <div class=\"add_photo\"></div>
        <h4>Добавленные сейчас фото</h4>
        <div class=\"imgs_elem_cont uploaded_photo_preview\">
        </div>
        <h4>Загруженные фото</h4>
        <div class=\"imgs_elem_cont\">
                {% set counter = 0 %}
                {% for img in imgs if counter < 5 %}
                        <div class=\"img_elem_show\" data-img=\"{{ img }}\"></div>
                        {# {% set counter = counter + 1 %} #}
                {% endfor %}
        </div>
</div>

<div class=\"video nav_content_block\">
        <div class=\"inputs_cont\">
                <span>Добавить видео</span>
                <input type=\"text\" video_data=\"video_link\" oninput=\"video.check_video_url(this);\">
                <font class=\"add_elem_button\" onclick=\"video.save();\"><i class=\"fa fa-plus\" aria-hidden=\"true\"></i></font>
        </div>
        <h4>Добавленные видео</h4>
        <div class=\"video_cont\">
                {% for curr_video in data.video %}
                        <div><iframe width=\"100%\" height=\"100%\" src=\"{{ curr_video }}\" frameborder=\"0\" allowfullscreen></iframe></div>
                                {% endfor %}
        </div>
</div>

<div class=\"blog nav_content_block\">
        <button class=\"add_button\" onclick=\"blog.create_open();\">Добавить</button>
        <h4>Записи в блоге</h4>
        <div class=\"blog_added_block\">
        </div>
</div>

<div class=\"groups nav_content_block\">
        <button class=\"add_button\" onclick=\"groups.create_open();\">Добавить</button>
        <h4>Группы фото</h4>
        <div class=\"groups_added_block\">
        </div>
</div>", "admin/content.twig", "/home/pilotpiru/public_html/app/templates/admin/content.twig");
    }
}
