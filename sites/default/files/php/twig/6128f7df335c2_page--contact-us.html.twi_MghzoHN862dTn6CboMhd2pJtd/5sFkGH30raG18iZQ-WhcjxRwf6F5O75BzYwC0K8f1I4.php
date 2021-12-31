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

/* themes/prodigious/templates/page--contact-us.html.twig */
class __TwigTemplate_10c8ba58d40ea518fff0d0a290581895934253955dd2a26d174ccde0a5514e4a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 2, "raw" => 7, "striptags" => 7];
        $functions = ["file_url" => 2, "drupal_block" => 18];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 'raw', 'striptags'],
                ['file_url', 'drupal_block']
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
        echo "<section class=\"p-0 pb-lg-5\">
  <div class=\"hero-banner banner-auto\" style=\"background-image: url(";
        // line 2
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["node"] ?? null), "field_image", []), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo ");\">
    <div class=\"container-fluid  heig100\">
      <div class=\"row no-gutters align-items-center justify-content-between cust-padd heig100\">
        <div class=\"col-lg-4 text-center text-lg-left\">
          <img src=\"";
        // line 6
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "/images/header-logo-white.png\" class=\" w-50 mb-md-3\" />
          <p class=\"p20 font-light text-white my-5\">";
        // line 7
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(strip_tags($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "body", []), "value", [])), "<br>"));
        echo " </p>
          <h1 class=\"heading-1 font-regular text-white mb-5 mb-md-0\">";
        // line 8
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["node"] ?? null), "title", []), "value", [])), "html", null, true);
        echo "</h1>
        </div>
        <div class=\"col-lg-7\">
        <div class=\"tabs-Wrap mt-5 mt-md-0\">
          <ul class=\"tabs\">
            <li>  New Business</li>
            <li class=\"active\">Careers</li>
            <li>General Enquiry</li>
          </ul>
            <div class=\"tab-contentWrap\">
              ";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("contact_us"), "html", null, true);
        echo "
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class=\"social-icons\">
      <li><a href=\"javascript:;\" class=\"facebook\"></a></li>
      <li><a href=\"javascript:;\" class=\"twitter\"></a></li>
      <li><a href=\"javascript:;\" class=\"instagram\"></a></li>
      <li><a href=\"javascript:;\" class=\"youtube\"></a></li>
    </ul>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/prodigious/templates/page--contact-us.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 18,  73 => 8,  69 => 7,  65 => 6,  58 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"p-0 pb-lg-5\">
  <div class=\"hero-banner banner-auto\" style=\"background-image: url({{ file_url(node.field_image.entity.uri.value) }});\">
    <div class=\"container-fluid  heig100\">
      <div class=\"row no-gutters align-items-center justify-content-between cust-padd heig100\">
        <div class=\"col-lg-4 text-center text-lg-left\">
          <img src=\"{{directory }}/images/header-logo-white.png\" class=\" w-50 mb-md-3\" />
          <p class=\"p20 font-light text-white my-5\">{{ node.body.value |striptags('<br>') | raw }} </p>
          <h1 class=\"heading-1 font-regular text-white mb-5 mb-md-0\">{{ node.title.value }}</h1>
        </div>
        <div class=\"col-lg-7\">
        <div class=\"tabs-Wrap mt-5 mt-md-0\">
          <ul class=\"tabs\">
            <li>  New Business</li>
            <li class=\"active\">Careers</li>
            <li>General Enquiry</li>
          </ul>
            <div class=\"tab-contentWrap\">
              {{ drupal_block('contact_us') }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <ul class=\"social-icons\">
      <li><a href=\"javascript:;\" class=\"facebook\"></a></li>
      <li><a href=\"javascript:;\" class=\"twitter\"></a></li>
      <li><a href=\"javascript:;\" class=\"instagram\"></a></li>
      <li><a href=\"javascript:;\" class=\"youtube\"></a></li>
    </ul>
  </div>
</section>
", "themes/prodigious/templates/page--contact-us.html.twig", "D:\\prodigious\\themes\\prodigious\\templates\\page--contact-us.html.twig");
    }
}
