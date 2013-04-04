<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'WdevPresentation\Controller\Presentation' => 'WdevPresentation\Controller\PresentationController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'presentation' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/presentation[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'WdevPresentation\Controller\Presentation',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    
    'asset_manager' => array(
        'resolver_configs' => array(
            'paths' => array(
                __DIR__ . '/../../../hakimel/reveal.js/',
            ),
        ),
    ),
    
    'view_manager' => array(
        'template_path_stack' => array(
            'presentation' => __DIR__ . '/../view',
        ),
    ),
);