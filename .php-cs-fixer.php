<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$rules = [
    '@PSR1' => true,
    '@PSR2' => true,
    '@PSR12' => true,
    'array_syntax' => ['syntax' => 'short'],
    'binary_operator_spaces' => [
        'default' => 'align_single_space_minimal',
    ],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
        'statements' => ['return'],
    ],
    'class_attributes_separation' => [
        'elements' => [
            'method' => 'one',
            'property' => 'one',
        ],
    ],
    'concat_space' => ['spacing' => 'one'],
    'declare_equal_normalize' => ['space' => 'none'],
    'elseif' => true,
    'encoding' => true,
    'full_opening_tag' => true,
    'function_declaration' => true,
    'include' => true,
    'increment_style' => ['style' => 'post'],
    'lowercase_cast' => true,
    'constant_case' => ['case' => 'lower'],
    'lowercase_keywords' => true,
    'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
    'no_extra_blank_lines' => [
        'tokens' => [
            'curly_brace_block',
            'extra',
            'parenthesis_brace_block',
            'square_brace_block',
            'throw',
            'use',
        ],
    ],
    'no_leading_namespace_whitespace' => true,
    'no_spaces_around_offset' => true,
    'no_trailing_comma_in_singleline' => true,
    'no_trailing_whitespace' => true,
    'no_whitespace_before_comma_in_array' => true,
    'ordered_imports' => ['sort_algorithm' => 'alpha'],
    'phpdoc_align' => ['align' => 'left'],
    'phpdoc_no_empty_return' => true,
    'phpdoc_order' => true,
    'phpdoc_scalar' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_trim' => true,
    'phpdoc_types' => true,
    'return_type_declaration' => ['space_before' => 'none'],
    'single_blank_line_at_eof' => true,
    'single_class_element_per_statement' => ['elements' => ['property']],
    'single_import_per_statement' => true,
    'single_line_after_imports' => true,
    'single_quote' => true,
    'standardize_not_equals' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline' => ['elements' => ['arrays']],
    'trim_array_spaces' => true,
    'unary_operator_spaces' => true,
    'visibility_required' => ['elements' => ['const', 'method', 'property']],
];

$config = new Config();

$finder = Finder::create()
    ->in(__DIR__)
    ->exclude(['bootstrap', 'storage', 'vendor', 'node_modules'])
    ->notName('*.blade.php');

return $config->setFinder($finder)
    ->setRules($rules)
    ->setRiskyAllowed(true)
    ->setUsingCache(true)
    ->setIndent('    ')
    ->setLineEnding("\n");
