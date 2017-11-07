<?php

return [
    'modules' => [
        'guide' => [
            'class' => 'schmunk42\markdocs\Module',
            #'layout' => '@backend/views/layouts/box',
            'enableEmojis' => true,
            'enableMermaid' => true,
            'markdownUrl' => 'file:///docs-phd5/guide',
            'defaultIndexFile' => 'index.md',
        ],
        'help' => [
            'class' => 'schmunk42\markdocs\Module',
            #'layout' => '@backend/views/layouts/box',
            'enableEmojis' => true,
            'enableMermaid' => true,
            'markdownUrl' => 'file:///docs-phd5/help',
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