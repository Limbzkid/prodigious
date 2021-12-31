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

/* themes/prodigious/templates/html.html.twig */
class __TwigTemplate_d113febb7382e42dedcaad6115b7691eead076231814b1415b749a3ac1895735 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 27];
        $filters = ["escape" => 29, "raw" => 31, "safe_join" => 32];
        $functions = ["url" => 27, "drupal_block" => 48];

        try {
            $this->sandbox->checkSecurity(
                ['set'],
                ['escape', 'raw', 'safe_join'],
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
        // line 26
        echo "
";
        // line 27
        $context["base_url"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getUrl("<front>");
        // line 28
        echo "<!DOCTYPE html>
<html";
        // line 29
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null)), "html", null, true);
        echo ">
  <head>
    <head-placeholder token=\"";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
    <title>";
        // line 32
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null)), " | "));
        echo "</title>
    <css-placeholder token=\"";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
    <js-placeholder token=\"";
        // line 34
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">

    <script>
      var tPath = '";
        // line 37
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["directory"] ?? null)), "html", null, true);
        echo "';
    </script>

  </head>
  <body";
        // line 41
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo ">
    <div id=\"warning-message\">
      <p>Rotate your device to View</p>
    </div>
    <div class=\"mainWrapper\">
      ";
        // line 46
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null)), "html", null, true);
        echo "
      <header>
        ";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("main_menu"), "html", null, true);
        echo "
      </header>

      <main>
        ";
        // line 52
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null)), "html", null, true);
        echo "
      </main>

      <footer class=\"text-center text-md-left\">
        <div class=\"container-fluid\">
          <div class=\"row no-gutters\">
            <div class=\"col-12\">
              <div class=\"row align-items-center justify-content-between\">
                ";
        // line 60
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\twig_tweak\TwigExtension')->drupalBlock("footer_menu"), "html", null, true);
        echo "
              </div>
            </div>
          </div>
        </div>
      </footer>
      ";
        // line 66
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null)), "html", null, true);
        echo "
    </div>
    <div class=\"lightbox-overlay\"></div>
    <div class=\"lightbox-custom\">
      <a class=\"closebtn\" href=\"javascript:;\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 40 40\">
          <g id=\"Cross\" transform=\"translate(-980 -102)\">
            <path id=\"Path\" d=\"M11.819,1.138a.706.706,0,0,0,0-.943.69.69,0,0,0-.963,0L5.96,5.057,1.144.2A.69.69,0,0,0,.181.2a.706.706,0,0,0,0,.943L5.077,6l-4.9,4.862a.7.7,0,0,0,0,.942.689.689,0,0,0,.963,0L5.96,6.943l4.9,4.862a.689.689,0,0,0,.963,0,.7.7,0,0,0,0-.942L6.923,6Z\" transform=\"translate(994 116.001)\" fill=\"#000000\" stroke=\"#000000\" stroke-width=\"1\"/>
          </g>
        </svg>
      </a>
      <div class=\"lightbox-container\">
      </div>
    </div>
    <js-bottom-placeholder token=\"";
        // line 80
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null)));
        echo "\">
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "themes/prodigious/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 80,  133 => 66,  124 => 60,  113 => 52,  106 => 48,  101 => 46,  93 => 41,  86 => 37,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  63 => 29,  60 => 28,  58 => 27,  55 => 26,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for the basic structure of a single Drupal page.
 *
 * Variables:
 * - logged_in: A flag indicating if user is logged in.
 * - root_path: The root path of the current page (e.g., node, admin, user).
 * - node_type: The content type for the current node, if the page is a node.
 * - head_title: List of text elements that make up the head_title variable.
 *   May contain one or more of the following:
 *   - title: The title of the page.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site.
 * - page_top: Initial rendered markup. This should be printed before 'page'.
 * - page: The rendered page markup.
 * - page_bottom: Closing rendered markup. This variable should be printed after
 *   'page'.
 * - db_offline: A flag indicating if the database is offline.
 * - placeholder_token: The token for generating head, css, js and js-bottom
 *   placeholders.
 *
 * @see template_preprocess_html()
 */
#}

{% set base_url = url('<front>') %}
<!DOCTYPE html>
<html{{ html_attributes }}>
  <head>
    <head-placeholder token=\"{{ placeholder_token|raw }}\">
    <title>{{ head_title|safe_join(' | ') }}</title>
    <css-placeholder token=\"{{ placeholder_token|raw }}\">
    <js-placeholder token=\"{{ placeholder_token|raw }}\">

    <script>
      var tPath = '{{ directory }}';
    </script>

  </head>
  <body{{ attributes }}>
    <div id=\"warning-message\">
      <p>Rotate your device to View</p>
    </div>
    <div class=\"mainWrapper\">
      {{ page_top }}
      <header>
        {{ drupal_block('main_menu') }}
      </header>

      <main>
        {{ page }}
      </main>

      <footer class=\"text-center text-md-left\">
        <div class=\"container-fluid\">
          <div class=\"row no-gutters\">
            <div class=\"col-12\">
              <div class=\"row align-items-center justify-content-between\">
                {{ drupal_block('footer_menu') }}
              </div>
            </div>
          </div>
        </div>
      </footer>
      {{ page_bottom }}
    </div>
    <div class=\"lightbox-overlay\"></div>
    <div class=\"lightbox-custom\">
      <a class=\"closebtn\" href=\"javascript:;\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 40 40\">
          <g id=\"Cross\" transform=\"translate(-980 -102)\">
            <path id=\"Path\" d=\"M11.819,1.138a.706.706,0,0,0,0-.943.69.69,0,0,0-.963,0L5.96,5.057,1.144.2A.69.69,0,0,0,.181.2a.706.706,0,0,0,0,.943L5.077,6l-4.9,4.862a.7.7,0,0,0,0,.942.689.689,0,0,0,.963,0L5.96,6.943l4.9,4.862a.689.689,0,0,0,.963,0,.7.7,0,0,0,0-.942L6.923,6Z\" transform=\"translate(994 116.001)\" fill=\"#000000\" stroke=\"#000000\" stroke-width=\"1\"/>
          </g>
        </svg>
      </a>
      <div class=\"lightbox-container\">
      </div>
    </div>
    <js-bottom-placeholder token=\"{{ placeholder_token|raw }}\">
  </body>
</html>
", "themes/prodigious/templates/html.html.twig", "D:\\prodigious\\themes\\prodigious\\templates\\html.html.twig");
    }
}
