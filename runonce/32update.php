<?php
/**
 * @copyright 4ward.media 2014 <http://www.4wardmedia.de>
 * @author christoph wiechert <wio@psitrax.de>
 */

if(version_compare(VERSION, '3.2', '<')) return;

class jSlideGalleryUpdate extends \Contao\Database\Updater
{

	public function __construct()
	{
		$DB = \Database::getInstance();
		$objErg = $DB->execute('SELECT id, jSlideGallery_items FROM tl_content WHERE jSlideGallery_items IS NOT NULL');
		while($objErg->next())
		{
			$items = unserialize($objErg->jSlideGallery_items);
			if(!count($items)) continue;
			foreach($items as $k => $item)
			{
				foreach(array('img', 'thumb') as $fld)
				{
					$objHelper = self::generateHelperObject($item[$fld]);

					// UUID already
					if($objHelper->isUuid)
					{
						return;
					}

					if($objHelper->isNumeric)
					{
						// Numeric ID to UUID
						$objFile = \FilesModel::findByPk($objHelper->value);
						$items[$k][$fld] = $objFile->uuid;
					}
					else
					{
						// Path to UUID
						$objFile = \FilesModel::findByPath($objHelper->value);
						$items[$k][$fld] = $objFile->uuid;
					}
				}
			}
		}
		$DB->prepare('UPDATE tl_content SET jSlideGallery_items=? WHERE id=?')->execute(serialize($items), $objErg->id);
	}

}

new jSlideGalleryUpdate();