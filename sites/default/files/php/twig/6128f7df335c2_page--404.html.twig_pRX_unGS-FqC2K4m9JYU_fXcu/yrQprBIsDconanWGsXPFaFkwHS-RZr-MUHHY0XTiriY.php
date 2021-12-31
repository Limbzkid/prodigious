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

/* themes/prodigious/templates/page--404.html.twig */
class __TwigTemplate_1ea21a94d03d59dbb78d24dd7087eef9b6b0cdb4028c62d1481104034c2a7068 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
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
        echo "<section class=\"page-not-found-wrap\">
  <div class=\"row\">
    <div class=\"col-12\">
      <h1 class=\"heading heading-theme heading-heavy heading-1 text-center\">404 Page Not Found</h1>
      <p class=\"heading heading-theme heading-6 text-center\">
        Sorry! We couldn’t find this page. <br> It might be an old link or the page was moved.
      </p>
    </div>
  </div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/prodigious/templates/page--404.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"page-not-found-wrap\">
  <div class=\"row\">
    <div class=\"col-12\">
      <h1 class=\"heading heading-theme heading-heavy heading-1 text-center\">404 Page Not Found</h1>
      <p class=\"heading heading-theme heading-6 text-center\">
        Sorry! We couldn’t find this page. <br> It might be an old link or the page was moved.
      </p>
    </div>
  </div>
</section>
", "themes/prodigious/templates/page--404.html.twig", "D:\\prodigious\\themes\\prodigious\\templates\\page--404.html.twig");
    }
}
