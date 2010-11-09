<?php

class Markdown {

	private static $_filename;

	public static function parseTitleAndHeads($content) {
		$return = array('title' => '', 'heads' => array());
		preg_match_all('/^# (.*)/m', $content, $title);
		if (!empty($title[1][0])) {
			$return['title'] = $title[1][0];
		}

		preg_match_all('/^## (.*)/m', $content, $heads);
		if (!empty($heads[1][0])) {
			$return['heads'] = $heads[1];
		}

		return $return;
	}

	public static function getFiles() {
		static $contents;
		if (empty($contents)) {
			$contents = array();
			foreach(glob('data/*.md') as $file) {
				$contents[pathinfo($file, PATHINFO_BASENAME)] = file_get_contents($file);
			}
		}
		return $contents;
	}

	public static function parseFiles() {
		$contents = self::getFiles();
		$titleAndHeads = array();
		foreach($contents as $filename => $content) {
			$titleAndHeads[$filename] = self::parseTitleAndHeads($content);
		}

		return $titleAndHeads;
	}

	public static function parseFile($filename) {
		$filename = preg_replace('/\.+/', '.', $filename);
		if (!file_exists('data/'.$filename)) {
			return 'doc file not found';
		}
		self::$_filename = $filename;
		$content = markdown(file_get_contents('data/'.$filename));
		$content = str_replace('<pre', '<pre class="prettyprint"', $content);
		return preg_replace_callback('/^<h2>(.*)<\/h2>/mU', 'self::genHeaderId', $content);
	}

	public static function genHeaderId($matches) {
		static $i = 0;
		++$i;
		$href = '?file='.self::$_filename.'#header-'.$i;
		return '<h2 id="header-'.$i.'"><a href="'.$href.'">#</a> &nbsp;'.$matches[1].'</h2>';
	}
}
