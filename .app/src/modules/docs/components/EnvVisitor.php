<?php

namespace schmunk42\markdocs\components;

use PhpParser\Node;
use PhpParser\NodeVisitorAbstract;
use yii\base\ErrorException;

/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2017 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class EnvVisitor extends NodeVisitorAbstract
{
    private $_envVariables = [];

    public function leaveNode(Node $node)
    {
        if ($node instanceof Node\Expr\FuncCall) {
            try {
                if (isset($node->name->parts[0]) && $node->name->parts[0] === 'getenv') {
                    $value = $node->args[0]->value;
                    $this->_envVariables[$value->value] = ['line' => $value->getAttribute('startLine')];
                }
            } catch (ErrorException $e) {
                var_dump($node);
            }

        }
    }

    public function getEnvVariables()
    {
        return $this->_envVariables;
    }
}