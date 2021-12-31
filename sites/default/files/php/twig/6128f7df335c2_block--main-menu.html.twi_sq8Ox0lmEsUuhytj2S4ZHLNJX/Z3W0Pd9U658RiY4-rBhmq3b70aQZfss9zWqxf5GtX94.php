<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/prodigious/templates/block/block--main-menu.html.twig */
class __TwigTemplate_af630f905fb01035bcc84e57e0847e16620ba8b3552d48d08d5c7f692a41bc4b extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1, "for" => 19, "if" => 20];
        $filters = ["escape" => 4, "replace" => 26, "lower" => 26];
        $functions = ["url" => 1, "drupal_block" => 34];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['escape', 'replace', 'lower'],
                ['url', 'drupal_block']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["base_url"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<front>");
        // line 2
        echo "<nav class=\"navbar navbar-expand-lg\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"";
        // line 4
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo "\">
      <picture>
        <source media=\"(min-width: 60em)\" srcset=\"";
        // line 6
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/header-logo.png\">
        <img src=\"";
        // line 7
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/header-logo.png\" alt=\"Prodigious\" title=\"Prodigious\">
      </picture>
      </a>
      <a href=\"javascript:;\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </a>
      <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
        <div class=\"d-lg-none text-center pb-5\">
          <a href=\"";
        // line 15
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo "\" class=\"closebtn\"><img src=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/icons/close.png\" alt=\"close\" title=\"close\"/></a>
          <img src=\"";
        // line 16
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/logo-icon.png\" alt=\"Prodigious\" title=\"Prodigious\" />
        </div>
        <ul class=\"navbar-nav ml-auto pt-5 pt-lg-0\">
          ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 20
            echo "            ";
            if (($this->getAttribute($context["item"], "link", []) != "")) {
                // line 21
                echo "              <li class=\"nav-item";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "class", [])), "html", null, true);
                echo "\">
                  <a href=\"";
                // line 22
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "link", [])), "html", null, true);
                echo "\" class=\"nav-link\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
                echo " </a>
              </li>
            ";
            } else {
                // line 25
                echo "              <li class=\"nav-item \">
                <a href=\"javascript:;\" class=\"nav-link animate-scroll\" data-animate=\"#";
                // line 26
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter(twig_lower_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", []))), [" " => ""]), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
                echo " </a>
              </li>
            ";
            }
            // line 29
            echo "          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "        </ul>
      <div class=\"ml-4\">
        <a href=\"javascript:;\" class=\"searchBtn \"></a>
        <div class=\"searchinputbox\">
          ";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("search_form_block", [], false), "html", null, true);
        echo "
        </div>
      </div>
    </div>
  </div>
</nav>
";
    }

    public function getTemplateName()
    {
        return "themes/prodigious/templates/block/block--main-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 34,  134 => 30,  128 => 29,  120 => 26,  117 => 25,  109 => 22,  104 => 21,  101 => 20,  97 => 19,  90 => 16,  83 => 15,  71 => 7,  66 => 6,  61 => 4,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set base_url = url('<front>') %}
<nav class=\"navbar navbar-expand-lg\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"{{ base_url }}\">
      <picture>
        <source media=\"(min-width: 60em)\" srcset=\"{{ base_url }}{{ directory }}/images/header-logo.png\">
        <img src=\"{{ base_url }}{{ directory }}/images/header-logo.png\" alt=\"Prodigious\" title=\"Prodigious\">
      </picture>
      </a>
      <a href=\"javascript:;\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\" aria-controls=\"navbarCollapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </a>
      <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
        <div class=\"d-lg-none text-center pb-5\">
          <a href=\"{{ base_url }}\" class=\"closebtn\"><img src=\"{{ base_url }}{{ directory }}/images/icons/close.png\" alt=\"close\" title=\"close\"/></a>
          <img src=\"{{ base_url }}{{ directory }}/images/logo-icon.png\" alt=\"Prodigious\" title=\"Prodigious\" />
        </div>
        <ul class=\"navbar-nav ml-auto pt-5 pt-lg-0\">
          {% for item in content['#data_obj'] %}
            {% if item.link != '' %}
              <li class=\"nav-item{{ item.class}}\">
                  <a href=\"{{ item.link }}\" class=\"nav-link\">{{ item.title}} </a>
              </li>
            {% else %}
              <li class=\"nav-item \">
                <a href=\"javascript:;\" class=\"nav-link animate-scroll\" data-animate=\"#{{ item.title | lower | replace({' ': ''}) }}\">{{ item.title}} </a>
              </li>
            {% endif %}
          {% endfor %}
        </ul>
      <div class=\"ml-4\">
        <a href=\"javascript:;\" class=\"searchBtn \"></a>
        <div class=\"searchinputbox\">
          {{ drupal_block('search_form_block', wrapper=false)}}
        </div>
      </div>
    </div>
  </div>
</nav>
", "themes/prodigious/templates/block/block--main-menu.html.twig", "D:\\prodigious\\themes\\prodigious\\templates\\block\\block--main-menu.html.twig");
    }
}
