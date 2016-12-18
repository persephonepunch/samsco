<?php

use YOOtheme\Http\Exception;

$config = [

    'name' => 'yootheme/wordpress-theme',

    'main' => 'YOOtheme\\Theme\\Wordpress',

    'events' => [

        'boot' => function () {
            $this['kernel']->addMiddleware(function ($request, $response, $next) {

                $allowed = in_array($request->getParam('p'), ['theme/image'], true);

                // check user capabilities
                if (!$allowed && !current_user_can('edit_theme_options')) {
                    throw new Exception(403, 'Insufficient User Rights.');
                }

                return $next($request, $response);
            });
        },

        'theme.init' => function ($theme) {
            $theme['@config']->merge($this['@config']->get('defaults'), true);
        },

    ],

    'config' => [

        'panels' => [

            'system' => [
                'title' => 'System',
                'width' => 400,
                'fields' => [

                    'disable-wpautop' => [
                        'label' => 'Filter',
                        'description' => 'Disables the <a href="https://developer.wordpress.org/reference/functions/wpautop/" target="_blank">wpautop</a> filter for the_content and the_excerpt.',
                        'type' => 'checkbox',
                        'text' => 'Disable wpautop'
                    ],

                    'yootheme_apikey' => [
                        'label' => 'YOOtheme API Key',
                        'description' => 'In order to update commercial YOOtheme extensions, enter your API Key below. The key can be found in your <a href="http://yootheme.com/account" target="_blank">YOOtheme</a> account. For more details about, please check out the <a href="http://yootheme.com/support/documentation" target="_blank">documentation</a>.',
                        'type' => 'text',
                        'attrs' => [
                            'placeholder' => 'YOOtheme API Key',
                        ]
                    ],

                ],
            ],

            'system-post' => [
                'title' => 'Post',
                'width' => 400,
                'fields' => [

                    'post.image_align' => [
                        'label' => 'Image',
                        'description' => 'Align the image to the top or place it between the title and the content.',
                        'type' => 'select',
                        'options' => [
                            'Top' => 'top',
                            'Between' => 'between',
                        ],
                    ],

                    'post.meta_align' => [
                        'label' => 'Meta',
                        'description' => 'Position the meta text above or below the title.',
                        'type' => 'select',
                        'options' => [
                            'Top' => 'top',
                            'Bottom' => 'bottom',
                        ],
                    ],

                    'post.meta_style' => [
                        'label' => 'Meta Style',
                        'description' => 'Display the meta text in a sentence or a horizontal list.',
                        'type' => 'select',
                        'options' => [
                            'List' => 'list',
                            'Sentence' => 'sentence',
                        ],
                    ],

                    'post.header_align' => [
                        'label' => 'Alignment',
                        'description' => 'The alignment option applies to both, the blog and single posts.',
                        'type' => 'checkbox',
                        'text' => 'Center the header and footer',
                    ],

                    'post.content_width' => [
                        'label' => 'Max Width',
                        'description' => 'Set a smaller width than the image\'s for the content.',
                        'type' => 'checkbox',
                        'text' => 'Small',
                    ],

                    'post.content_dropcap' => [
                        'label' => 'Drop Cap',
                        'description' => 'Set a large initial letter that drops below the first line of the first paragraph.',
                        'type' => 'checkbox',
                        'text' => 'Show drop cap',
                    ],

                    'post.navigation' => [
                        'label' => 'Navigation',
                        'description' => 'Enable a navigation to move to the previous or next post.',
                        'type' => 'checkbox',
                        'text' => 'Show navigation',
                    ],

                    'post.date' => [
                        'label' => 'Display',
                        'type' => 'checkbox',
                        'text' => 'Show date',
                    ],

                    'post.author' => [
                        'type' => 'checkbox',
                        'text' => 'Show author',
                    ],

                    'post.categories' => [
                        'type' => 'checkbox',
                        'text' => 'Show categories',
                    ],

                    'post.tags' => [
                        'description' => 'Show system fields for single posts. This option does not apply to the blog.',
                        'type' => 'checkbox',
                        'text' => 'Show tags',
                    ],

               ],
            ],

            'system-blog' => [
                'title' => 'Blog',
                'width' => 400,
                'fields' => [

                    'blog.column' => [
                        'label' => 'Columns',
                        'description' => 'Set the number of columns.',
                        'type' => 'select',
                        'options' => [
                            '1' => 1,
                            '2' => 2,
                            '3' => 3,
                            '4' => 4,
                        ],
                    ],

                    'blog.column_gutter' => [
                        'type' => 'checkbox',
                        'text' => 'Large gutter',
                        'show' => 'blog.column != "1"',
                    ],

                    'blog.column_divider' => [
                        'description' => 'Set a larger gutter and display dividers between columns.',
                        'type' => 'checkbox',
                        'text' => 'Display dividers between columns',
                        'show' => 'blog.column != "1"',
                    ],

                    'blog.column_order' => [
                        'label' => 'Column Order',
                        'description' => 'Order posts down or accross columns.',
                        'type' => 'select',
                        'options' => [
                            'Down' => 0,
                            'Across' => 1,
                        ],
                        'show' => 'blog.column != "1"',
                    ],

                    'blog.content_align' => [
                        'label' => 'Alignment',
                        'description' => 'This option applies to the blog overview and not to single posts. To center the post\'s header and footer, go to the post settings.',
                        'type' => 'checkbox',
                        'text' => 'Center the content',
                    ],

                    'blog.button_style' => [
                        'label' => 'Button',
                        'description' => 'Select a style for the continue reading button.',
                        'type' => 'select',
                        'options' => [
                            'Default' => 'default',
                            'Primary' => 'primary',
                            'Secondary' => 'secondary',
                            'Danger' => 'danger',
                            'Text' => 'text',
                        ],
                    ],

                    'blog.navigation' => [
                        'label' => 'Navigation',
                        'description' => 'Use a numeric pagination or previous/next links to move between blog pages.',
                        'type' => 'select',
                        'options' => [
                            'Pagination' => 'pagination',
                            'Previous/Next' => 'previous/next',
                        ],
                    ],

                    'blog.date' => [
                        'label' => 'Display',
                        'type' => 'checkbox',
                        'text' => 'Show date',
                    ],

                    'blog.author' => [
                        'type' => 'checkbox',
                        'text' => 'Show author',
                    ],

                    'blog.categories' => [
                        'type' => 'checkbox',
                        'text' => 'Show categories',
                    ],

                    'blog.tags' => [
                        'type' => 'checkbox',
                        'text' => 'Show tags',
                    ],

                    'blog.category_title' => [
                        'type' => 'checkbox',
                        'text' => 'Show archive category title',
                        'description' => 'Show system fields for the blog. This option does not apply to single posts.',
                    ],

                ],
            ],

            'woocommere' => [
                'title' => 'WooCommerce',
                'width' => 400,
                'fields' => [

                    'woocommerce.items' => [
                        'label' => 'Items',
                        'description' => 'Enter the number of items per page.',
                        'type' => 'text',
                        'attrs' => [
                            'placeholder' => 'default',
                        ],
                    ],

                ],
            ],

        ],

        'defaults' => [

            'post' => [

                'image_align' => 'top',
                'meta_align' => 'bottom',
                'meta_style' => 'phrase',
                'header_align' => 0,
                'content_width' => 0,
                'content_dropcap' => 0,
                'navigation' => 1,
                'date' => 1,
                'author' => 1,
                'categories' => 1,
                'tags' => 1,

            ],

            'blog' => [

                'column' => 1,
                'column_gutter' => 0,
                'column_divider' => 0,
                'column_order' => 0,
                'content_align' => 0,
                'button_style' => 'default',
                'navigation' => 'pagination',
                'category_title' => 1,
                'date' => 1,
                'author' => 1,
                'categories' => 1,
                'tags' => 0,

            ],

        ],

    ],

];

return defined('WPINC') ? $config : false;
