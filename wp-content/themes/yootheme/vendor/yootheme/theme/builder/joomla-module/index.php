<?php

$config = [

    'name' => 'yootheme/builder-joomla-module',

    'builder' => 'joomla_module',

    'main' => function () {

        $this['mods'] = function () {
            return $this['db']->fetchAllObjects("SELECT id, title, module, position, content, showtitle, params FROM @modules WHERE client_id = 0 AND published != -2");
        };

    },

    'render' => function ($element) {

        foreach ($this['mods'] as $module) {
            if ($module->id == $element['module']) {
                $element->title = $module->title;
                $element->content = JModuleHelper::renderModule($module);
                $element->props = $this['modules']->get('yootheme/joomla-modules')->prepareModule($module)->config->merge($element->props, true);
                break;
            }
        }

        return $this['view']->render('@builder/joomla-module/template', compact('element'));
    },

    'events' => [

        'theme.admin' => function () {

            $modules = ['- Select Module -' => ''];

            foreach ($this['mods'] as $module) {
                $modules[$module->position ?: 'none'][$module->title] = $module->id;
            }

            $this['@config']->set('tabs.0.fields.module.options', $modules);
        }

    ],

    'config' => [

        'title' => 'J! Module',
        'width' => 600,
        'element' => true,
        'mixins' => ['element'],
        'tabs' => [

            [

                'title' => 'Content',
                'fields' => [

                    'module' => [
                        'label' => 'Module',
                        'description' => 'Any Joomla module can be displayed in your custom layout.',
                        'type' => 'select',
                        'default' => '',
                        'options' => [],
                    ],

                ],

            ],

            [

                'title' => 'Settings',
                'fields' => [

                    'style' => [
                        'label' => 'Style',
                        'description' => 'Select one of the boxed card styles or a blank module.',
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            'Blank' => '',
                            'Card Default' => 'card-default',
                            'Card Primary' => 'card-primary',
                            'Card Secondary' => 'card-secondary',
                            'Card Hover' => 'card-hover',
                        ],
                    ],

                    'title_style' => [
                        'label' => 'Title Style',
                        'description' => 'Title styles differ in font-size but also may come with a predefined color, size and font.',
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            'Default' => '',
                            'Primary' => 'heading-primary',
                            'H1' => 'h1',
                            'H2' => 'h2',
                            'H3' => 'h3',
                            'H4' => 'h4',
                            'H5' => 'h5',
                            'H6' => 'h6',
                        ],
                    ],

                    'title_decoration' => [
                        'label' => 'Title Decoration',
                        'description' => 'Decorate the title with a divider, bullet or a line that is vertically centered to the heading.',
                        'type' => 'select',
                        'default' => '',
                        'options' => [
                            'None' => '',
                            'Divider' => 'divider',
                            'Bullet' => 'bullet',
                            'Line' => 'line',
                        ],
                    ],

                    'text_align' => '{text_align_justify}',

                    'text_align_breakpoint' => '{text_align_breakpoint}',

                    'text_align_fallback' => '{text_align_justify_fallback}',

                    'maxwidth' => '{maxwidth}',

                    'maxwidth_align' => '{maxwidth_align}',

                    'margin' => '{margin}',

                    'margin_remove_top' => '{margin_remove_top}',

                    'margin_remove_bottom' => '{margin_remove_bottom}',

                    'animation' => '{animation}',

                    'visibility' => '{visibility}',

                    'id' => '{id}',

                    'class' => '{class}',

                    'name' => '{name}',

                ],

            ],

        ],

    ],

];

return defined('_JEXEC') ? $config : false;
