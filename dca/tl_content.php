<?php

/**
 * @copyright 4ward.media 2013 <http://www.4wardmedia.de>
 * @author Christoph Wiechert <wio@psitrax.de>
 */


// Palette
$GLOBALS['TL_DCA']['tl_content']['palettes']['jSlideGallery'] = '{type_legend},type,headline;{jSliderGallery_items_legend},jSlideGallery_items;{jSliderGallery_config_legend},jSlideGallery_duration,jSlideGallery_wait,jSlideGallery_size;{protected_legend:hide},protected;{expert_legend:hide},guests,invisible,cssID,space';


// Fields
$GLOBALS['TL_DCA']['tl_content']['fields']['jSlideGallery_duration'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_duration'],
	'exclude'   => true,
	'inputType' => 'text',
	'eval'      => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['jSlideGallery_wait'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_wait'],
	'exclude'   => true,
	'inputType' => 'text',
	'eval'      => array('mandatory'=>true, 'rgxp'=>'digit', 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['jSlideGallery_size'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_size'],
	'exclude'   => true,
	'inputType' => 'imageSize',
	'options'   => $GLOBALS['TL_CROP'],
	'reference' => &$GLOBALS['TL_LANG']['MSC'],
	'eval'      => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_content']['fields']['jSlideGallery_items'] = array
(
	'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items'],
	'exclude'   => true,
	'inputType' => 'multiColumnWizard',
	'eval'      => array
	(
		'columnFields' => array
		(
			'img' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items_img'],
				'inputType' => (version_compare(VERSION, '3.2', '>=')) ? 'fileTree' : 'filepicker4ward',
				'eval'      => array('filesOnly' => true, 'fieldType' => 'radio', 'mandatory' => true, 'extensions'=>'jpg,png')
			),
			'alt' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items_alt'],
				'inputType' => 'text',
				'eval'      => array('style'=>'width:150px')
			),
			'wait' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items_wait'],
				'inputType' => 'text',
				'eval'      => array('style'=>'width:50px', 'rgxp'=>'digit')
			),
			'url' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items_url'],
				'inputType' => 'text',
				'eval'      => array('style'=>'width:150px', 'rgxp'=>'url')
			),
			'blank' => array
			(
				'label'     => &$GLOBALS['TL_LANG']['tl_content']['jSlideGallery_items_blank'],
				'inputType' => 'checkbox',
				'eval'      => array('style'=>'width:60px; text-align:center')
			)
		)
	)
);
