<?php
/**
 * @package            	: Latest Job announcements in PHPClasses.org
 * @source             	: /phpclasses-jobs/index.php
 * @version            	: 1.0.0
 * @created            	: 2024-11-02 07:00:00 UTC+3
 * @updated            	: 
 * @author             	: Drogidis Christos
 * @authorSite         	: www.alexsoft.gr
 * @license 			: AGL-F
 * 
 * @since PHP 5.6.40
 */

$script_path = str_replace('\\', '/', __DIR__);


require_once($script_path.'/libs/config.php');
require_once($script_path.'/libs/libs.php');



$conf = new TPHPClassesConfig;
$lib = new TPHPClassesLib;

require_once($script_path . '/languages//'.$conf->params['lang'].'.php');
$lang = new TPHPClasses_Language;

$feeds = simplexml_load_file('https://www.phpclasses.org/jobs/latest/latest.rss');

$items= [];
$ci = 0;

foreach ($feeds->channel->item as $feed) {
	if ($ci >= $conf->params['count']) break;	
	$items[$ci]['link'] = $feed->link;
	$items[$ci]['title'] = (string) $feed->title;
	if ($conf->params['show_summary']) $items[$ci]['summary'] = $lib->getSummary($feed->description);	
	if ($conf->params['show_days']) $items[$ci]['days'] = $lib->diff_days($feed->pubDate);		
			
	$ci++;
	unset($parts);
}
unset($feeds);

$text = '';
$text .= '<div class="block-phpclasses-jobs-'.$conf->params['theme'].'">';
if ($conf->params['show_title']) { 
	$text .= '<div class="header"><h3>'.$lang->title.'</h3></div><div class="clear"></div>';
}
$text .= '<div class="text"><div class="table">';


foreach ($items as $key => $feed)
{
	$text .= '<div class="row">';
	$text .= '<div class="cell"><a target="_blank" href="'.$feed['link'].'">'.$feed['title'].'</a>';
	if ($conf->params['show_summary']) $text .= '<br>'.$feed['summary'];
	$text .= '</div>';	
	if ($conf->params['show_days']) $text .= "<div class=\"cell right\">".$feed['days']."</div>";		
	$text .= '</div>'; // row
}
unset($items);

$text .= '</div></div>'; // table/text
$text .= '<div class="more"><a target="_blank" href="https://www.phpclasses.org/jobs/"><strong>...'.$lang->more.'</strong></a></div>';
$text .= '</div>'; // block
echo $text;
?>
<script type="text/javascript">
<!--
	jQuery(document).ready(function(){
		jQuery('head').append('<link rel="stylesheet" type="text/css" href="<?php echo 'themes/'.$conf->params['theme'].'/theme.css';?>">');
});
//-->
</script>		