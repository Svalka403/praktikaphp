<?php
class RenderTemplate {
	
	public $vars;
	public $html;
	public $Tpl;
	function setTpl($teplate)
	{
		$this->Tpl = $teplate;
	}
	function setVar($value)
	{
		$this->vars = $value; 
	}
	function Render()
	{
		
		extract($this->vars);
		ob_start();
		include $this->Tpl;
		return ob_get_clean();
	}
}