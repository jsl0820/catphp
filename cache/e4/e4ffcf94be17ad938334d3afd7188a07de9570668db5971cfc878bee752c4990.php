<?php

/* index.html */
class __TwigTemplate_943cef90d3ef5c8ccf631dad79b012e7fa528ba7adb5dadab2d417f438dbda72 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title>Document2112244</title>
</head>
<body>
\t";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["info"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 9
            echo "\t\t";
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo "
\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "</body>
</html>";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 11,  32 => 9,  28 => 8,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<meta charset=\"UTF-8\">
\t<title>Document2112244</title>
</head>
<body>
\t{% for value in info %}
\t\t{{value}}
\t{% endfor %}
</body>
</html>", "index.html", "D:\\phpStudy\\WWW\\catphp\\app\\View\\Home\\index.html");
    }
}
