<?php

$rules = [
    '@Symfony' => true,

    /** Array Notation */
    'whitespace_after_comma_in_array' => ['ensure_single_space' => true],

    /** Cast Notation */
    'cast_spaces' => ['space' => 'none'],

    /** Class Notation */
    'ordered_class_elements' => true,
    // 'class_definition' => true,

    /** Function Notation */
    'method_argument_space' => true,

    /** List Notation */
    'list_syntax' => true,

    /** Return Notation */
    'no_useless_return' => true,

    /** String Notation */
    'explicit_string_variable' => true,

    /** Control Structure */
    'yoda_style' => false,
    'no_useless_else' => true,

    /** Import */
    'global_namespace_import' => true,

    /** Language Construct */
    'combine_consecutive_unsets' => true,
    'declare_equal_normalize' => ['space' => 'single'],

    /** Operator */
    'concat_space' => ['spacing' => 'one'],
    'ternary_to_null_coalescing' => true,

    /** Semicolon */
    'multiline_whitespace_before_semicolons' => true,

    /** Whitespace */
    'array_indentation' => true,
    'blank_line_before_statement' => true,
    'method_chaining_indentation' => true,

    /** PHPDoc */
    'phpdoc_to_comment' => false,
    'phpdoc_var_annotation_correct_order' => true,
    // 'phpdoc_add_missing_param_annotation' => true,
];

$finder = PhpCsFixer\Finder::create();

// ignore laravel blade file
$finder->exclude(['vendor'])
    ->notName('*.blade.php');

return (new PhpCsFixer\Config())
    ->setRules($rules)
    // ->setIndent("\t")
    ->setLineEnding("\n")
    ->setFinder($finder);
