<?php 
/**
 * @package Ifuturz_Adminlogin
 */
require_once 'Mage/Adminhtml/controllers/IndexController.php';

class Ifuturz_Adminlogin_indexcontroller extends Mage_Adminhtml_IndexController
{
    
  protected function _outTemplate($tplName, $data=array())
  {
    $this->_initLayoutMessages('adminhtml/session');
    $status = Mage::getStoreConfig('adminlogin/adminloginconfig/adminlogin_status');
    if($status)
    {		if($tplName=="login")
      		$block = $this->getLayout()->createBlock('adminhtml/template')
                      ->setTemplate("$tplName.phtml");      
    }
    else if($tplName=='forgotpassword')
      $block = $this->getLayout()->createBlock('adminhtml/template')
                      ->setTemplate("$tplName.phtml");
    else 
      $block = $this->getLayout()->createBlock('adminhtml/template')
                   ->setTemplate("$tplName.phtml");
    
    foreach ($data as $index=>$value) {
        $block->assign($index, $value);
    }
    $html = $block->toHtml();
    Mage::getSingleton('core/translate_inline')
                  ->processResponseBody($html);
    $this->getResponse()->setBody($html);

    }  
}