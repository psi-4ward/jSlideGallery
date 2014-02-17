--
-- Table `tl_content`
--

CREATE TABLE `tl_content` (
  `jSlideGallery_duration` int(10) unsigned NOT NULL default '0',
  `jSlideGallery_wait` int(10) unsigned NOT NULL default '0',
  `jSlideGallery_size` blob NULL,
  `jSlideGallery_items` blob NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
