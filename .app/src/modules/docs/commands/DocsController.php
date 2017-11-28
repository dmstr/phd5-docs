<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2017 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace schmunk42\markdocs\commands;

use schmunk42\markdocs\helpers\DocsHelper;
use yii\console\Controller;
use yii\helpers\FileHelper;


class DocsController extends Controller
{
    public $verbose = false;

    private $_basePath;
    private $_toc;

    public function options($actionID)
    {
        return ['verbose'];
    }

    public function actionCheckToc($path)
    {
        $this->_basePath = \Yii::getAlias($path);
        $this->stdout('Docs'.PHP_EOL);
        $tocLinks = DocsHelper::parseToc($path, 'README.md');
        $files = FileHelper::findFiles($path, ['only' => ['*.md']]);
        foreach ($files AS $file) {
            \Yii::trace("Processing {$file}...");
            $links[] = str_replace($path, '', $file);
        }
        $notInToc = array_diff($links, $tocLinks);
        $brokenLinks = array_diff($tocLinks, $links);

        var_dump($notInToc, $brokenLinks);
    }

    public function actionEnvList($path)
    {
        $files = FileHelper::findFiles($path, ['only' => ['*.php'], 'except' => ['tests/']]);
        $list = DocsHelper::findEnvVariables($files);

        foreach ($list as $var => $occurences) {
            $this->stdout("- `{$var}` ");
            if ($this->verbose) {
                $this->stdout("[".count($occurences)."] ");
                foreach ($occurences as $occurence) {
                    $this->stdout($occurence['file'].":".$occurence['line'].";");
                }
            }
            $this->stdout(PHP_EOL);
        }
    }


}