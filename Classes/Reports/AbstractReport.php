<?php

namespace Sng\AdditionalReports\Reports;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This class provides a base for all the reports
 */
class AbstractReport
{

    /**
     * Back-reference to the calling reports module
     *
     * @var    object $reportObject
     */
    protected $reportObject;

    /**
     * Constructor for class \Sng\AdditionalReports\Reports\AbstractReport
     *
     * @param object    Back-reference to the calling reports module
     */
    public function __construct($reportObject)
    {
        $this->reportObject = $reportObject;
        $this->setCss(\Sng\AdditionalReports\Main::getCss());
        $GLOBALS['LANG']->includeLLFile('EXT:additional_reports/Resources/Private/Language/locallang.xlf');
    }

    /**
     * Set a Css
     *
     * @param $path
     * @return void
     */
    public function setCss($path)
    {
        if (isset($this->reportObject->doc)) {
            $this->reportObject->doc->getPageRenderer()->addCssFile($path);
        }
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addCssFile($path);
    }

    /**
     * Set a Js
     *
     * @param $path
     * @return void
     */
    public function setJs($path)
    {
        if (isset($this->reportObject->doc)) {
            $this->reportObject->doc->getPageRenderer()->addJsFile($path);
        }
        $pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);
        $pageRenderer->addJsFile($path);
    }

}

?>