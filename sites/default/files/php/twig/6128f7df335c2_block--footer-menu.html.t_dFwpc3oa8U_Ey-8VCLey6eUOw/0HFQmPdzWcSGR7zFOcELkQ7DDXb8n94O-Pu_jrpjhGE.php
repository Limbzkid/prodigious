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

/* themes/prodigious/templates/block/block--footer-menu.html.twig */
class __TwigTemplate_1e9c29e8ce8a594d5f5dc00bfda0ef09ae4dd2ea4bf1fdebbde7503ceb26334a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1, "for" => 7, "if" => 8];
        $filters = ["escape" => 3, "replace" => 14, "lower" => 14];
        $functions = ["url" => 1];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['escape', 'replace', 'lower'],
                ['url']
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
        echo "<div class=\"col-md-auto\">
  <a href=\"";
        // line 3
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo "\"><img src=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_url"] ?? null)), "html", null, true);
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/logo-icon.png\" class=\"footer-logo\" alt=\"Prodigious\" title=\"Prodigious\" /></a>
</div>
<div class=\"col-md-auto d-flex align-items-center justify-content-center\">
  <ul class=\"nav py-5 py-md-0\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["content"] ?? null), "#data_obj", [], "array"));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 8
            echo "      ";
            if (($this->getAttribute($context["item"], "link", []) != "")) {
                // line 9
                echo "        <li class=\"nav-item \">
            <a href=\"";
                // line 10
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "link", [])), "html", null, true);
                echo "\" class=\"nav-link\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
                echo " </a>
        </li>
      ";
            } else {
                // line 13
                echo "        <li class=\"nav-item \">
            <a href=\"javascript:;\" class=\"nav-link animate-scroll\" data-animate=\"#";
                // line 14
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter(twig_lower_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", []))), [" " => ""]), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), "html", null, true);
                echo " </a>
        </li>
      ";
            }
            // line 17
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/prodigious/templates/block/block--footer-menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 18,  99 => 17,  91 => 14,  88 => 13,  80 => 10,  77 => 9,  74 => 8,  70 => 7,  60 => 3,  57 => 2,  55 => 1,);
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
<div class=\"col-md-auto\">
  <a href=\"{{ base_url }}\"><img src=\"{{ base_url }}{{ directory }}/images/logo-icon.png\" class=\"footer-logo\" alt=\"Prodigious\" title=\"Prodigious\" /></a>
</div>
<div class=\"col-md-auto d-flex align-items-center justify-content-center\">
  <ul class=\"nav py-5 py-md-0\">
    {% for item in content['#data_obj'] %}
      {% if item.link != '' %}
        <li class=\"nav-item \">
            <a href=\"{{ item.link }}\" class=\"nav-link\">{{ item.title}} </a>
        </li>
      {% else %}
        <li class=\"nav-item \">
            <a href=\"javascript:;\" class=\"nav-link animate-scroll\" data-animate=\"#{{ item.title | lower | replace({' ': ''}) }}\">{{ item.title}} </a>
        </li>
      {% endif %}
    {% endfor %}
  </ul>
</div>
", "themes/prodigious/templates/block/block--footer-menu.html.twig", "D:\\prodigious\\themes\\prodigious\\templates\\block\\block--footer-menu.html.twig");
    }
}
