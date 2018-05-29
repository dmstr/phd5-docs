<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2017 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace schmunk42\markdocs\helpers;

use PhpParser\Lexer;
use PhpParser\Parser;
use schmunk42\markdocs\components\EnvVisitor;
use yii\helpers\FileHelper;
use yii\helpers\Markdown;

class DocsHelper
{
    public static function findEnvVariables($files)
    {
        $traverser = new \PhpParser\NodeTraverser();

        $parser = new Parser(new Lexer);
        foreach ($files as $file) {
            $envVisitior = new EnvVisitor();
            $traverser->addVisitor($envVisitior);

            $code = file_get_contents($file);
            try {
                $ast = $parser->parse($code);
                $traverser->traverse($ast);
                $occurrences = $envVisitior->getEnvVariables();
                foreach ($occurrences as $var => $occurrence) {
                    $list[$var][] = ['file' => $file, 'line' => $occurrence['line']];
                }
            } catch (\Error $error) {
                \Yii::error("Parse error: {$error->getMessage()}");
                return;
            }
        }
        ksort($list);
        return $list;
    }

    public static function getSourceFiles($path)
    {
        return FileHelper::findFiles($path, ['only' => ['*.php']]);
    }

    public static function parseToc($basePath, $tocFile = 'README.md')
    {
        echo $basePath.'/'.$tocFile;
        $xpath = new \DOMXPath(self::markdownFileAsDomDocument($basePath.'/'.$tocFile));
        $list = $xpath->query('//a');
        foreach ($list AS $element) {
            $links[] = ltrim($element->getAttribute('href'),'/ ');
        }
        return $links;
    }

    private static function markdownFileAsDomDocument($file)
    {
        $html = Markdown::process(file_get_contents($file));
        if (!$html) {
            return false;
        }
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->strictErrorChecking = false;
        $doc->loadHtml($html);
        return $doc;

    }

    private function getMarkdownFiles()
    {

    }
}