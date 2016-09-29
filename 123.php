<?php 
class RenderTemplate {
	
	public $vars;
	public $html;
	public $Tpl;
	function setTpl($teplate)
	{
		# code...
		#$this->html = file_get_contents($teplate);
		$this->Tpl = $teplate;
	}
	function setVar($value)
	{
		# code...
		$this->vars = $value; 
	}
	function Render()
	{
		# code...
		
		/*foreach ($this->vars as $key => $value) {
			# code...
			$this->html = str_replace($key, $value, $this->html);
		}
		$reg = "%{[A-Za-z]+}%";
		$this->html = preg_replace($reg, "", $this->html);
		return $this->html;*/
		extract($this->vars);
		ob_start();
		include $this->Tpl;
		return ob_get_clean();
	}
}
$arrey = array('imya' => "Igor", 'familiya' => "Shlext", 'otchestvo' => "Gennad'evich");
$p = new RenderTemplate();
$p->setTpl('index.php');
$p->setVar($arrey);
 echo $p->Render();
?>