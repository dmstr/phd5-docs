<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2017 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace schmunk42\markdocs\commands;

use yii\console\Controller;
use yii\helpers\FileHelper;
use yii\helpers\Markdown;


class DocsController extends Controller
{
    private $_basePath;
    private $_toc;

    public function actionIndex($path)
    {
        $this->_basePath = \Yii::getAlias($path);
        $this->stdout('Docs'.PHP_EOL);
        $tocLinks = $this->parseToc();
        $files = FileHelper::findFiles($path, ['only' => ['*.md']]);
        foreach ($files AS $file) {
            #\Yii::trace("Processing {$file}...");
            $this->stdout("Processing {$file}...".PHP_EOL);
            $links[] = str_replace($path, '', $file);
        }
        #var_dump($links, $tocLinks);
        $notInToc = array_diff($links, $tocLinks);
        $brokenLinks = array_diff($tocLinks, $links);
        var_dump($notInToc, $brokenLinks);
    }

    private function markdownFileAsDomDocument($file)
    {
        $html = Markdown::process(file_get_contents($file));
        if (!$html) {
            $this->stdout("EMPTY!");
            return false;
        }
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->strictErrorChecking = false;
        $doc->loadHtml($html);
        echo $html;
        return $doc;

    }

    private function getMarkdownFiles()
    {

    }

    private function parseToc($tocFile = 'README.md')
    {
        echo $this->_basePath.'/'.$tocFile;
        $xpath = new \DOMXPath($this->markdownFileAsDomDocument($this->_basePath.'/'.$tocFile));
        $list = $xpath->query('//a');
        foreach ($list AS $element) {
            $links[] = $element->getAttribute('href');
        }
        return $links;
    }
}