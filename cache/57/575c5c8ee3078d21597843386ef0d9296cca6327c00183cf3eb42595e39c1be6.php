<?php

/* index2.html */
class __TwigTemplate_94f3933ca0022af7cce0b017d362741b9568a413de6eae04529dcdefb2695c8a extends Twig_Template
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
\t<title>Document21133</title>
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
        return "index2.html";
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
        return new Twig_Source("", "index2.html", "D:\\phpStudy\\WWW\\catphp\\app\\View\\Home\\index2.html");
    }
}
