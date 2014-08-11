<?php
/**
 * Created by JetBrains PhpStorm.
 * User: roseannsolano
 * Date: 8/10/14
 * Time: 6:13 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Framework;


interface ViewInterface
{
    public function __construct($template,$variables);
    public function setTemplate($template);
    public function getTemplate();
    public function setVariables($variables);
    public function getVariables();
    public function extract($variables);
}