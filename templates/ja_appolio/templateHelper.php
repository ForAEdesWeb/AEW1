<?php
/**
 * ------------------------------------------------------------------------
 * JA Fixel Template
 * ------------------------------------------------------------------------
 * Copyright (C) 2004-2011 J.O.O.M Solutions Co., Ltd. All Rights Reserved.
 * @license - Copyrighted Commercial Software
 * Author: J.O.O.M Solutions Co., Ltd
 * Websites:  http://www.joomlart.com -  http://www.joomlancers.com
 * This file may not be redistributed in whole or significant part.
 * ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
jimport('joomla.image.image');

class JAAppolioHelper {
    public static function image($item){
         if(preg_match_all('#<img[^>]+>#iU', $item, $imgs)){
            //remove the text
            $result = new stdClass;
            if(count($imgs)>0){
            	$result->img = $imgs[0][0];
            }
            $result->des = preg_replace('#<img[^>]+>#iU', '', $item);
            
            return $result;
        }
        return;
    }
    
  public static function loadmodules( $position, $style=-2,$ovparams=null){
        $document   = JFactory::getDocument();
        $renderer   = $document->loadRenderer('module');

        $params      = array('style'=>$style);
        $contents = '';
        foreach (JModuleHelper::getModules($position) as $mod)
        {
            if($ovparams){
                $modparams = json_decode($mod->params);
                $modparams->created_by = $ovparams->created_by;
                $mod->params = json_encode($modparams);
            }
            $contents .= $renderer->render($mod, $params);
        }
        return $contents;
    }
}
