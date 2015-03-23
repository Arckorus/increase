<?php
namespace Ajax\ui\Components;
use Ajax\JsUtils;
use Ajax\common\SimpleComponent;
/**
 * Composant JQuery UI Tabs
 * @author jc
 * @version 1.001
 */
class Tabs extends SimpleComponent {

	public function __construct(JsUtils $js){
		parent::__construct($js);
		$this->uiName="tabs";
	}
}