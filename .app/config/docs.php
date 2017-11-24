<?php

use schmunk42\markdocs\commands\DocsController;
use yii\base\Event;

Event::on(
    '\yii\web\View',
    'afterRender',
    // TOOD: hotfixes for markdown images
    function ($event) {
        $event->output = str_replace('src="file:///phd5-docs/help',
            'style="width: 100%" src="/img/stream/help',
            $event->output);
        $event->output = str_replace('.jpg"', '.jpg,p"', $event->output);
        $event->output = str_replace('.png"', '.png,p"', $event->output);
    });

return [
    'aliases' => [
        'schmunk42/markdocs/commands' => __DIR__.'/../src/modules/docs/commands'
    ],
    'controllerMap' => [
        'markdocs' => DocsController::class,
    ],
    'components' => [
        'fsLocal' => [
            'class' => 'creocoder\flysystem\LocalFilesystem',
            'path' => '/phd5-docs',
        ],
    ],
    'modules' => [
        'guide' => [
            'class' => 'schmunk42\markdocs\Module',
            #'layout' => '@backend/views/layouts/box',
            'enableEmojis' => true,
            'enableMermaid' => true,
            'markdownUrl' => 'file:///phd5-docs/guide',
            'defaultIndexFile' => 'index.md',
        ],
        'help' => [
            'class' => 'schmunk42\markdocs\Module',
            #'layout' => '@backend/views/layouts/box',
            'enableEmojis' => true,
            'enableMermaid' => true,
            'markdownUrl' => 'file:///phd5-docs/help',
            'defaultIndexFile' => 'index.md',
        ],
        'cookbook' => [
            'class' => 'schmunk42\markdocs\Module',
            #'layout' => '@backend/views/layouts/box',
            'enableEmojis' => true,
            'enableMermaid' => true,
            'markdownUrl' => 'https://raw.githubusercontent.com/samdark/yii2-cookbook/master/book',
            'defaultIndexFile' => 'README.md',
        ],
    ],
];