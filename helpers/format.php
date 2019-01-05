<?php
class format{
	public function formatdate($date){
	 return date('F j, Y,g:i a', strtotime($date));
	}
	public function formatdate1($date){
	 return date('F j, Y ', strtotime($date));
	}
    public function formatdate2($date){
	 return date('j ', strtotime($date));
	}
	public function textshorten($text, $limit = 200){
		$text = $text. "";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text,' '));
		$text = $text.".........";
		return $text;
	}

	public function textshorten2($text, $limit = 100){
		$text = $text. "";
		$text = substr($text, 0, $limit);
		$text = substr($text, 0, strrpos($text,' '));
		$text = $text.".........";
		return $text;
	}

}
?>