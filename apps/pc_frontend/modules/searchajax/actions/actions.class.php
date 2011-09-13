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
    $ad_line = Doctrine_Query::create()->from("ActivityData ad")->where("body LIKE ?","%$q%")->addWhere("public_flag = 1")->orderBy("ad.created_at DESC")->limit(100)->fetchArray();
    $result = "";
    foreach($ad_line as $ad){
      $ad['body'] = str_replace("|","",$ad['body']);
      $ad['body'] = str_replace("\n","",$ad['body']);
      $result .= "{$ad['body']}|{$ad['id']}\n";
    }
    return $this->renderText($result);
  }
  public function executeSearchDiary(sfWebRequest $request){
    return null;
    $q = $request->getParameter("q");
    $ad_line = Doctrine_Query::create()->from("Diary d")->where("body LIKE ?","%$q%")->addWhere("public_flag = 1")->orderBy("d.created_at DESC")->limit(100)->fetchArray();
    $result = "";
    foreach($ad_line as $ad){
      $ad['body'] = str_replace("|","",$ad['body']);
      $result .= "{$ad['body']}|{$ad['id']}\n";
    }
    return $this->renderText($result);
  }
}
