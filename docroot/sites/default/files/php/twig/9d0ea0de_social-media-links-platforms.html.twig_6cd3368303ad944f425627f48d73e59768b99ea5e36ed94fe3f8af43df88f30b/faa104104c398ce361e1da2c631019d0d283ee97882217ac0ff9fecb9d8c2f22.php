<?php

/* modules/social_media_links/templates/social-media-links-platforms.html.twig */
class __TwigTemplate_48506cbad9d233638eaa9aea293ceecd9cf96c498d382aab07f55a875e062d28 extends Twig_Template
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
        $tags = array("set" => 8, "for" => 15, "if" => 21);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('set', 'for', 'if'),
                array(),
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

        // line 6
        echo "
";
        // line 8
        $context["classes"] = array(0 => "platforms", 1 => ((($this->getAttribute(        // line 10
(isset($context["appearance"]) ? $context["appearance"] : null), "orientation", array()) == "h")) ? ("inline horizontal") : ("vertical")));
        // line 13
        echo "
<ul";
        // line 14
        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["platforms"]) ? $context["platforms"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["platform"]) {
            // line 16
            echo "    <li>
      <a href=\"";
            // line 17
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["platform"], "url", array()), "html", null, true));
            echo "\" ";
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["platform"], "attributes", array()), "html", null, true));
            echo " >
        ";
            // line 18
            echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["platform"], "element", array()), "html", null, true));
            echo "
      </a>

      ";
            // line 21
            if ($this->getAttribute((isset($context["appearance"]) ? $context["appearance"] : null), "show_name", array())) {
                // line 22
                echo "        ";
                if (($this->getAttribute((isset($context["appearance"]) ? $context["appearance"] : null), "orientation", array()) == "h")) {
                    // line 23
                    echo "          <br />
        ";
                }
                // line 25
                echo "
        <span><a href=\"";
                // line 26
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["platform"], "url", array()), "html", null, true));
                echo "\" ";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (isset($context["link_attributes"]) ? $context["link_attributes"] : null), "html", null, true));
                echo ">";
                echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["platform"], "name", array()), "html", null, true));
                echo "</a></span>
      ";
            }
            // line 28
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['platform'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "modules/social_media_links/templates/social-media-links-platforms.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 30,  96 => 28,  87 => 26,  84 => 25,  80 => 23,  77 => 22,  75 => 21,  69 => 18,  63 => 17,  60 => 16,  56 => 15,  52 => 14,  49 => 13,  47 => 10,  46 => 8,  43 => 6,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "modules/social_media_links/templates/social-media-links-platforms.html.twig", "/var/www/angrycactus/social-commerce/docroot/modules/social_media_links/templates/social-media-links-platforms.html.twig");
    }
}
