<?php 
echo PHP_EOL;
echo '<div class="wrap">'.PHP_EOL;
echo "	<h3>".__('Plugin administration', $this->plugin_textDomain)." <strong>« ". $this->plugin_title .' '.$this->plugin_version."</strong> »</h3>".PHP_EOL;



/* Exemple stripped table */

$categories = get_categories( array(
	'hide_empty' 	=> false,
	'orderby' 		=> 'term_group',
	'order'   		=> 'ASC',
	'exclude' 		=> $exclude,
) );

echo '	<table class="widefat striped">'.PHP_EOL;
echo '		<thead><tr><th>'.__('category_name', $this->plugin_textDomain).'</th><th>'.__('category_count', $this->plugin_textDomain).'</th></tr><thead>'.PHP_EOL;
echo '		<tbody>'.PHP_EOL;
foreach( $categories as $category ) :
	echo '			<tr><td>'.$category->name . '</td><td>'. $category->count.'</td></tr>'.PHP_EOL;
endforeach;
echo '		</tbody>'.PHP_EOL;
echo '	</table>'.PHP_EOL;

/* Exemple stripped table */

echo '</div><!-- wrap -->'.PHP_EOL;
