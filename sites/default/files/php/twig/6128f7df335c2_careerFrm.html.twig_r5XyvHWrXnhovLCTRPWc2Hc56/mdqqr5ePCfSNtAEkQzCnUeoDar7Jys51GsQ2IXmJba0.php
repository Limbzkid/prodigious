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

/* modules/custom/custom_blocks/templates/careerFrm.html.twig */
class __TwigTemplate_dfaad68e3c786e4555cb1850de222663a991ed466772cd813664d924fa19a64d extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = ["escape" => 5];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
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
        echo "
  <div class=\"form-row align-items-end\">
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"name\">Name:</label>
      ";
        // line 5
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "name", [])), "html", null, true);
        echo "
      <div class=\"nameErr invalid-feedback\"></div>
    </div>
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"email\">EMAIL:</label>
      ";
        // line 10
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "email", [])), "html", null, true);
        echo "
      <div class=\"mailErr invalid-feedback\"></div>
    </div>
  </div>
  ";
        // line 14
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "fids", [])), "html", null, true);
        echo "
  <div class=\"form-row\">
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"inputlocation\">City, Company:</label>
      ";
        // line 18
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "location", [])), "html", null, true);
        echo "
      <div class=\"locErr invalid-feedback\"></div>
    </div>
    <div class=\"form-group col-6 py-4 attachments\">
        <label for=\"inputlocation\" style=\"opacity:0\">Upload CV:</label>
      <div class=\"input-file \">
        <span class=\"icon-upload\"></span> Upload CV<input type=\"file\" id=\"careerFile\" data-fid=\"\"/>
      </div>
      <div class=\"fidErr invalid-feedback\">asdasdasd</div>
      <ul></ul>
    </div>
  </div>

  <div class=\"form-group py-4\">
    <label for=\"message\">Message</label>
    ";
        // line 33
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "message", [])), "html", null, true);
        echo "
    <div class=\"msgErr invalid-feedback\"></div>
  </div>

  <div class=\"form-group\">
    <div class=\"feedback text-orange\"></div>
  </div>
  <div class=\"form-row\">
    <div class=\"form-group col-md-6 pt-4 mb-0\">
      ";
        // line 42
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "submit", [])), "html", null, true);
        echo "
    </div>
  </div>



";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_id", [])), "html", null, true);
        echo "
";
        // line 49
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_build_id", [])), "html", null, true);
        echo "
";
        // line 50
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["form"] ?? null), "form_token", [])), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/custom/custom_blocks/templates/careerFrm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 50,  126 => 49,  122 => 48,  113 => 42,  101 => 33,  83 => 18,  76 => 14,  69 => 10,  61 => 5,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("
  <div class=\"form-row align-items-end\">
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"name\">Name:</label>
      {{ form.name }}
      <div class=\"nameErr invalid-feedback\"></div>
    </div>
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"email\">EMAIL:</label>
      {{ form.email }}
      <div class=\"mailErr invalid-feedback\"></div>
    </div>
  </div>
  {{ form.fids }}
  <div class=\"form-row\">
    <div class=\"form-group col-md-6 py-4\">
      <label for=\"inputlocation\">City, Company:</label>
      {{ form.location }}
      <div class=\"locErr invalid-feedback\"></div>
    </div>
    <div class=\"form-group col-6 py-4 attachments\">
        <label for=\"inputlocation\" style=\"opacity:0\">Upload CV:</label>
      <div class=\"input-file \">
        <span class=\"icon-upload\"></span> Upload CV<input type=\"file\" id=\"careerFile\" data-fid=\"\"/>
      </div>
      <div class=\"fidErr invalid-feedback\">asdasdasd</div>
      <ul></ul>
    </div>
  </div>

  <div class=\"form-group py-4\">
    <label for=\"message\">Message</label>
    {{ form.message}}
    <div class=\"msgErr invalid-feedback\"></div>
  </div>

  <div class=\"form-group\">
    <div class=\"feedback text-orange\"></div>
  </div>
  <div class=\"form-row\">
    <div class=\"form-group col-md-6 pt-4 mb-0\">
      {{ form.submit }}
    </div>
  </div>



{{ form.form_id }}
{{ form.form_build_id }}
{{ form.form_token }}
", "modules/custom/custom_blocks/templates/careerFrm.html.twig", "D:\\prodigious\\modules\\custom\\custom_blocks\\templates\\careerFrm.html.twig");
    }
}
