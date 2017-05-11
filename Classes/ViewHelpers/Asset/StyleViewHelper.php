<?php
namespace Codemonkey1988\ScriptStylePush\ViewHelpers\Asset;

/***************************************************************
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3Fluid\Fluid\Core\ViewHelper\Exception;

/**
 * Class StyleViewHelper
 *
 * @package Codemonkey1988\ScriptStylePush\ViewHelpers\Asset
 * @author  Tim Schreiner <schreiner.tim@gmail.com>
 */
class StyleViewHelper extends AbstractAssetViewHelper
{
    /**
     * Initialize arguments
     *
     * @return void
     * @throws Exception
     */
    public function initializeArguments()
    {
        parent::initializeArguments();

        $this->registerArgument('media', 'string', '', false);
    }

    /**
     * @param string $filePath
     * @return string
     */
    protected function buildTag($filePath)
    {
        $this->tag->reset();
        $this->tag->setTagName('link');
        $this->tag->forceClosingTag(false);

        // Build the tag.
        $this->tag->addAttribute('href', $filePath);
        $this->tag->addAttribute('type', 'text/css');
        $this->tag->addAttribute('rel', 'stylesheet');

        if ($this->arguments['media']) {
            $this->tag->addAttribute('media', $this->arguments['media']);
        }

        return $this->tag->render();
    }
}