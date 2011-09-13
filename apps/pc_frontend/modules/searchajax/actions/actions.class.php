<?php

/**
 * search actions.
 *
 * @package    OpenPNE
 * @subpackage search
 * @author     Your name here
 */
class searchajaxActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  }
  public function executeSearchActivity(sfWebRequest $request)
  {
    $q = $request->getParameter("q");
    $ad_line = Doctrine_Query::create()->from("ActivityData ad")->where("body LIKE ?","%$q%")->limit(100)->fetchArray();
    $result = "";
    foreach($ad_line as $ad){
      $ad['body'] = str_replace("|","",$ad['body']);
      $result .= "{$ad['body']}|{$ad['id']}\n";
    }
    return $this->renderText($result);
  }
  public function executeSearchDiary(sfWebRequest $request){
    $q = $request->getParameter("q");
    $ad_line = Doctrine_Query::create()->from("Diary d")->where("body LIKE ?","%$q%")->limit(100)->fetchArray();
    $result = "";
    foreach($ad_line as $ad){
      $ad['body'] = str_replace("|","",$ad['body']);
      $result .= "{$ad['body']}|{$ad['id']}\n";
    }
    return $this->renderText($result);
  }
}
