<?php

/* themes/custom/bearded/templates/page.html.twig */
class __TwigTemplate_275fd31105160486ef0ce413142a76d2ffcdd7bc41221933713b251ca8ad0061 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'navbar' => array($this, 'block_navbar'),
            'slider' => array($this, 'block_slider'),
            'banner' => array($this, 'block_banner'),
            'main' => array($this, 'block_main'),
            'header' => array($this, 'block_header'),
            'sidebar_first' => array($this, 'block_sidebar_first'),
            'highlighted' => array($this, 'block_highlighted'),
            'breadcrumb' => array($this, 'block_breadcrumb'),
            'action_links' => array($this, 'block_action_links'),
            'help' => array($this, 'block_help'),
            'content' => array($this, 'block_content'),
            'topwidget_first' => array($this, 'block_topwidget_first'),
            'topwidget_second' => array($this, 'block_topwidget_second'),
            'topwidget_third' => array($this, 'block_topwidget_third'),
            'clients' => array($this, 'block_clients'),
            'sidebar_second' => array($this, 'block_sidebar_second'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("set" => 59, "if" => 61, "block" => 62);
        $filters = array("clean_class" => 67, "t" => 79);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'if', 'block'),
                array('clean_class', 't'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 59
        $context["container"] = (($this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "fluid_container", array())) ? ("container-fluid") : ("container"));
        // line 61
        if (($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation", array()) || $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation_collapsible", array()))) {
            // line 62
            echo "    ";
            $this->displayBlock('navbar', $context, $blocks);
        }
        // line 99
        echo "
";
        // line 100
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slider", array())) {
            // line 101
            echo "    ";
            $this->displayBlock('slider', $context, $blocks);
        }
        // line 107
        echo "
";
        // line 108
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "banner", array())) {
            // line 109
            echo "    ";
            $this->displayBlock('banner', $context, $blocks);
        }
        // line 115
        echo "
";
        // line 117
        $this->displayBlock('main', $context, $blocks);
        // line 224
        echo "
";
        // line 225
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array())) {
            // line 226
            echo "    ";
            $this->displayBlock('footer', $context, $blocks);
        }
    }

    // line 62
    public function block_navbar($context, array $blocks = array())
    {
        // line 63
        echo "        ";
        // line 64
        $context["navbar_classes"] = array(0 => "navbar", 1 => (($this->getAttribute($this->getAttribute(        // line 66
(isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "navbar_inverse", array())) ? ("navbar-inverse") : ("navbar-default")), 2 => (($this->getAttribute($this->getAttribute(        // line 67
(isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "navbar_position", array())) ? (("navbar-" . \Drupal\Component\Utility\Html::getClass($this->getAttribute($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "settings", array()), "navbar_position", array())))) : ((isset($context["container"]) ? $context["container"] : null))));
        // line 70
        echo "        <header";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["navbar_attributes"]) ? $context["navbar_attributes"] : null), "addClass", array(0 => (isset($context["navbar_classes"]) ? $context["navbar_classes"] : null)), "method"), "html", null, true));
        echo " id=\"navbar\" role=\"banner\">
            ";
        // line 71
        if ( !$this->getAttribute((isset($context["navbar_attributes"]) ? $context["navbar_attributes"] : null), "hasClass", array(0 => "container"), "method")) {
            // line 72
            echo "                <div class=\"";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true));
            echo "\">
                ";
        }
        // line 74
        echo "                <div class=\"navbar-header\">
                    ";
        // line 75
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation", array()), "html", null, true));
        echo "
                    ";
        // line 77
        echo "                    ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation_collapsible", array())) {
            // line 78
            echo "                        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\">
                            <span class=\"sr-only\">";
            // line 79
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Toggle navigation")));
            echo "</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                    ";
        }
        // line 85
        echo "                </div>

                ";
        // line 88
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation_collapsible", array())) {
            // line 89
            echo "                    <div id=\"navbar-collapse\" class=\"navbar-collapse collapse\">
                        ";
            // line 90
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "navigation_collapsible", array()), "html", null, true));
            echo "
                    </div>
                ";
        }
        // line 93
        echo "                ";
        if ( !$this->getAttribute((isset($context["navbar_attributes"]) ? $context["navbar_attributes"] : null), "hasClass", array(0 => "container"), "method")) {
            // line 94
            echo "                </div>
            ";
        }
        // line 96
        echo "        </header>
    ";
    }

    // line 101
    public function block_slider($context, array $blocks = array())
    {
        // line 102
        echo "        <div class=\"slider ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true));
        echo "\" role=\"contentinfo\">
            ";
        // line 103
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "slider", array()), "html", null, true));
        echo "
        </div>
    ";
    }

    // line 109
    public function block_banner($context, array $blocks = array())
    {
        // line 110
        echo "        <div class=\"banner ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true));
        echo "\" role=\"contentinfo\">
            ";
        // line 111
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "banner", array()), "html", null, true));
        echo "
        </div>
    ";
    }

    // line 117
    public function block_main($context, array $blocks = array())
    {
        // line 118
        echo "    <div role=\"main\" class=\"main-container ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true));
        echo " js-quickedit-main-content\">
        <div class=\"row\">

            ";
        // line 122
        echo "            ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array())) {
            // line 123
            echo "                ";
            $this->displayBlock('header', $context, $blocks);
            // line 128
            echo "            ";
        }
        // line 129
        echo "
            ";
        // line 131
        echo "            ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) {
            // line 132
            echo "                ";
            $this->displayBlock('sidebar_first', $context, $blocks);
            // line 137
            echo "            ";
        }
        // line 138
        echo "
            ";
        // line 140
        echo "            ";
        // line 141
        $context["content_classes"] = array(0 => ((($this->getAttribute(        // line 142
(isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()) && $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()))) ? ("col-sm-6") : ("")), 1 => ((($this->getAttribute(        // line 143
(isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()) && twig_test_empty($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())))) ? ("col-sm-9") : ("")), 2 => ((($this->getAttribute(        // line 144
(isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()) && twig_test_empty($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())))) ? ("col-sm-9") : ("")), 3 => (((twig_test_empty($this->getAttribute(        // line 145
(isset($context["page"]) ? $context["page"] : null), "sidebar_first", array())) && twig_test_empty($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())))) ? ("col-sm-12") : ("")));
        // line 148
        echo "            <section";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["content_attributes"]) ? $context["content_attributes"] : null), "addClass", array(0 => (isset($context["content_classes"]) ? $context["content_classes"] : null)), "method"), "html", null, true));
        echo ">

                ";
        // line 151
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array())) {
            // line 152
            echo "                    ";
            $this->displayBlock('highlighted', $context, $blocks);
            // line 155
            echo "                ";
        }
        // line 156
        echo "
                ";
        // line 158
        echo "                ";
        if ((isset($context["breadcrumb"]) ? $context["breadcrumb"] : null)) {
            // line 159
            echo "                    ";
            $this->displayBlock('breadcrumb', $context, $blocks);
            // line 162
            echo "                ";
        }
        // line 163
        echo "
                ";
        // line 165
        echo "                ";
        if ((isset($context["action_links"]) ? $context["action_links"] : null)) {
            // line 166
            echo "                    ";
            $this->displayBlock('action_links', $context, $blocks);
            // line 169
            echo "                ";
        }
        // line 170
        echo "
                ";
        // line 172
        echo "                ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array())) {
            // line 173
            echo "                    ";
            $this->displayBlock('help', $context, $blocks);
            // line 176
            echo "                ";
        }
        // line 177
        echo "
                ";
        // line 179
        echo "                ";
        $this->displayBlock('content', $context, $blocks);
        // line 183
        echo "
                ";
        // line 184
        if ((isset($context["is_front"]) ? $context["is_front"] : null)) {
            // line 185
            echo "                    ";
            // line 186
            echo "                    ";
            $this->displayBlock('topwidget_first', $context, $blocks);
            // line 189
            echo "                    ";
            // line 190
            echo "
                    ";
            // line 192
            echo "                    ";
            $this->displayBlock('topwidget_second', $context, $blocks);
            // line 195
            echo "                    ";
            // line 196
            echo "
                    ";
            // line 198
            echo "                    ";
            $this->displayBlock('topwidget_third', $context, $blocks);
            // line 201
            echo "                    ";
            // line 202
            echo "
                    ";
            // line 204
            echo "                    ";
            if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "clients", array())) {
                echo "               
                        ";
                // line 205
                $this->displayBlock('clients', $context, $blocks);
                // line 208
                echo "                    ";
            }
            // line 209
            echo "                    ";
            // line 210
            echo "                ";
        }
        // line 211
        echo "            </section>

            ";
        // line 214
        echo "            ";
        if ($this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array())) {
            // line 215
            echo "                ";
            $this->displayBlock('sidebar_second', $context, $blocks);
            // line 220
            echo "            ";
        }
        // line 221
        echo "        </div>
    </div>
";
    }

    // line 123
    public function block_header($context, array $blocks = array())
    {
        // line 124
        echo "                    <div class=\"col-sm-12\" role=\"heading\">
                        ";
        // line 125
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "header", array()), "html", null, true));
        echo "
                    </div>
                ";
    }

    // line 132
    public function block_sidebar_first($context, array $blocks = array())
    {
        // line 133
        echo "                    <aside class=\"col-sm-3\" role=\"complementary\">
                        ";
        // line 134
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_first", array()), "html", null, true));
        echo "
                    </aside>
                ";
    }

    // line 152
    public function block_highlighted($context, array $blocks = array())
    {
        // line 153
        echo "                        <div class=\"highlighted\">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "highlighted", array()), "html", null, true));
        echo "</div>
                    ";
    }

    // line 159
    public function block_breadcrumb($context, array $blocks = array())
    {
        // line 160
        echo "                        ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["breadcrumb"]) ? $context["breadcrumb"] : null), "html", null, true));
        echo "
                    ";
    }

    // line 166
    public function block_action_links($context, array $blocks = array())
    {
        // line 167
        echo "                        <ul class=\"action-links\">";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["action_links"]) ? $context["action_links"] : null), "html", null, true));
        echo "</ul>
                    ";
    }

    // line 173
    public function block_help($context, array $blocks = array())
    {
        // line 174
        echo "                        ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "help", array()), "html", null, true));
        echo "
                    ";
    }

    // line 179
    public function block_content($context, array $blocks = array())
    {
        // line 180
        echo "                    <a id=\"main-content\"></a>
                    ";
        // line 181
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "content", array()), "html", null, true));
        echo "
                ";
    }

    // line 186
    public function block_topwidget_first($context, array $blocks = array())
    {
        // line 187
        echo "                        ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "topwidget_first", array()), "html", null, true));
        echo "
                    ";
    }

    // line 192
    public function block_topwidget_second($context, array $blocks = array())
    {
        // line 193
        echo "                        ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "topwidget_second", array()), "html", null, true));
        echo "
                    ";
    }

    // line 198
    public function block_topwidget_third($context, array $blocks = array())
    {
        // line 199
        echo "                        ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "topwidget_third", array()), "html", null, true));
        echo "
                    ";
    }

    // line 205
    public function block_clients($context, array $blocks = array())
    {
        // line 206
        echo "                            ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "clients", array()), "html", null, true));
        echo "
                        ";
    }

    // line 215
    public function block_sidebar_second($context, array $blocks = array())
    {
        // line 216
        echo "                    <aside class=\"col-sm-3\" role=\"complementary\">
                        ";
        // line 217
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "sidebar_second", array()), "html", null, true));
        echo "
                    </aside>
                ";
    }

    // line 226
    public function block_footer($context, array $blocks = array())
    {
        // line 227
        echo "        <footer class=\"footer ";
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["container"]) ? $context["container"] : null), "html", null, true));
        echo "\" role=\"contentinfo\">
            ";
        // line 228
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["page"]) ? $context["page"] : null), "footer", array()), "html", null, true));
        echo "
        </footer>
    ";
    }

    public function getTemplateName()
    {
        return "themes/custom/bearded/templates/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  507 => 228,  502 => 227,  499 => 226,  492 => 217,  489 => 216,  486 => 215,  479 => 206,  476 => 205,  469 => 199,  466 => 198,  459 => 193,  456 => 192,  449 => 187,  446 => 186,  440 => 181,  437 => 180,  434 => 179,  427 => 174,  424 => 173,  417 => 167,  414 => 166,  407 => 160,  404 => 159,  397 => 153,  394 => 152,  387 => 134,  384 => 133,  381 => 132,  374 => 125,  371 => 124,  368 => 123,  362 => 221,  359 => 220,  356 => 215,  353 => 214,  349 => 211,  346 => 210,  344 => 209,  341 => 208,  339 => 205,  334 => 204,  331 => 202,  329 => 201,  326 => 198,  323 => 196,  321 => 195,  318 => 192,  315 => 190,  313 => 189,  310 => 186,  308 => 185,  306 => 184,  303 => 183,  300 => 179,  297 => 177,  294 => 176,  291 => 173,  288 => 172,  285 => 170,  282 => 169,  279 => 166,  276 => 165,  273 => 163,  270 => 162,  267 => 159,  264 => 158,  261 => 156,  258 => 155,  255 => 152,  252 => 151,  246 => 148,  244 => 145,  243 => 144,  242 => 143,  241 => 142,  240 => 141,  238 => 140,  235 => 138,  232 => 137,  229 => 132,  226 => 131,  223 => 129,  220 => 128,  217 => 123,  214 => 122,  207 => 118,  204 => 117,  197 => 111,  192 => 110,  189 => 109,  182 => 103,  177 => 102,  174 => 101,  169 => 96,  165 => 94,  162 => 93,  156 => 90,  153 => 89,  150 => 88,  146 => 85,  137 => 79,  134 => 78,  131 => 77,  127 => 75,  124 => 74,  118 => 72,  116 => 71,  111 => 70,  109 => 67,  108 => 66,  107 => 64,  105 => 63,  102 => 62,  96 => 226,  94 => 225,  91 => 224,  89 => 117,  86 => 115,  82 => 109,  80 => 108,  77 => 107,  73 => 101,  71 => 100,  68 => 99,  64 => 62,  62 => 61,  60 => 59,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "themes/custom/bearded/templates/page.html.twig", "/var/www/angrycactus/social-commerce/docroot/themes/custom/bearded/templates/page.html.twig");
    }
}
