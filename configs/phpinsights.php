<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the `Metrics` and `Insights` below in this configuration file.
    |
    | Supported: "default", "laravel", "symfony", "magento2", "drupal"
    |
    */

    'preset' => 'symfony',

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. You can either add, remove or configure `Insights`. Keep in
    | mind, that all added `Insights` must belong to a specific `Metric`.
    |
    */

    'exclude' => [
        'Legacy/',
        'Migrations/',
        '/assets/',
        '/bin/',
        '/elm-stuff/',
        '/node_modules/',
        '/private/',
        '/public/',
        '/translations/',
        '/templates/',
        '/var/',
        '/vendor/',
    ],

    'add' => [
    ],

    'remove' => [
        \NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousAbstractClassNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowYodaComparisonSniff::class,
        \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowArrayTypeHintSyntaxSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class,
        \ObjectCalisthenics\Sniffs\Files\FunctionLengthSniff::class,
        \ObjectCalisthenics\Sniffs\Metrics\MethodPerClassLimitSniff::class,
        \ObjectCalisthenics\Sniffs\Files\ClassTraitAndInterfaceLengthSniff::class,
        \ObjectCalisthenics\Sniffs\NamingConventions\ElementNameMinimalLengthSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\UselessFunctionDocCommentSniff::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class,
        \ObjectCalisthenics\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        \NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class,
        \SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class,
        \PhpCsFixer\Fixer\ReturnNotation\ReturnAssignmentFixer::class,
        \PHP_CodeSniffer\Standards\PSR2\Sniffs\Files\EndFileNewlineSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\DisallowLateStaticBindingForConstantsSniff::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousTraitNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyStatementSniff::class,

    ],

    'config' => [
        \SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class => [
            'enableNativeTypeHint' => false,
            'exclude'              => [
                'src/Search/Engine/Query/AggregationQuery.php',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\Classes\UnusedPrivateElementsSniff::class => [
            'exclude' => [
            ],
        ],
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class => [
            'exclude' => [
            ],
        ],
        \NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class => [
            'exclude' => [
                'src/Search/Dto/In/CommonSearchData.php',
                'src/Search/Dto/In/ProductSearchData.php',
            ],
        ],
        \ObjectCalisthenics\Sniffs\Classes\ForbiddenPublicPropertySniff::class => [
            'exclude' => [
                'src/Search/ElasticSearch/Transformer/ProductTransformer.php',
                'src/Search/Dto/Out/ProductSearchResultData.php',
                'src/Search/Dto/In/ProductSearchData.php',
                'src/Search/ElasticSearch/Transformer/AbstractTransformer.php',
                'src/Search/Engine/ProductSearchEngine.php',
                'src/Search/Dto/In/CommonSearchData.php',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\Classes\DisallowLateStaticBindingForConstantsSniff::class => [
            'exclude' => [
                'src/Search/Engine/Query/Aggregation/AbstractAggregation.php',
                'src/Search/Engine/Query/Aggregation/BrandAggregation.php',
                'src/Search/ElasticSearch/Transformer/AbstractTransformer.php',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\DeclareStrictTypesSniff::class => [
            'newlinesCountBetweenOpenTagAndDeclare' => 0,
        ],
        \PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer::class => [
            'align_double_arrow' => true,
        ],
        \SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class => [
            'linesCountBetweenAnnotationsGroups' => 0,
            'annotationsGroups'                  => [
                ['@package', '@author', '@copyright'],
            ],
        ],
        \PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class => [
            'order' => [ // List of strings defining order of elements.
                'use_trait',
                'constant_public',
                'constant_protected',
                'constant_private',
                'property_public_static',
                'property_protected_static',
                'property_private_static',
                'property_public',
                'property_protected',
                'property_private',
                'construct',
                'destruct',
                'magic',
                'phpunit',
                'method_public',
                'method_protected',
                'method_private',
            ],
            'sortAlgorithm' => 'none' // possible values ['none', 'alpha']
        ],
        \ObjectCalisthenics\Sniffs\Metrics\PropertyPerClassLimitSniff::class => [
            'maxCount' => 30,
        ],
    ],
];
