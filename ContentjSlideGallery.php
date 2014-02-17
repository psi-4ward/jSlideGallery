<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */
 
class ContentjSlideGallery extends ContentElement
{

	protected $strTemplate = 'ce_jSlideGallery';

	/**
	 * Compile the current element
	 */
	protected function compile()
	{
		if(TL_MODE=='FE')
		{
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/jSlideGallery/html/easing.js';
			$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/jSlideGallery/html/rhinoslider.js';
			$GLOBALS['TL_CSS'][] = 'system/modules/jSlideGallery/html/rhinoslider.css';
		}

		$this->Template->wait = $this->jSlideGallery_wait;
		$this->Template->duration = $this->jSlideGallery_duration;

		$size = deserialize($this->jSlideGallery_size, true);
		$this->Template->width = $size[0];
		$this->Template->height = $size[1];

		$images = deserialize($this->jSlideGallery_items, true);
		foreach($images as $k=>$v)
		{
			if(version_compare(VERSION, '3.2', '>='))
			{
				$images[$k]['img'] = \FilesModel::findByUuid($v['img'])->path;
				$images[$k]['thumb'] = \Image::get($images[$k]['img'], $size[0], $size[1], $size[2]);
			}
			else {
				$images[$k]['thumb'] = $this->getImage($v['img'], $size[0], $size[1], $size[2]);
			}
		}

		echo (serialize($images)); exit;

		$this->Template->items = $images;

		// forece ID
		if(!$this->cssID[0])
		{
			$this->cssID = array('jSliderGallery'.$this->id, $this->cssID[1]);
		}
		$this->Template->elemID = $this->cssID[0];

	}
}