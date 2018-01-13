<?php


?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="label"></span>
		<label class="search-label"> 
			Type your search and press enter...
		</label>
  	<input 
  		type="search" 
  		autofocus="true"
  		class="field s" 
  		name="s" 
  		value="<?php _e( '', 'frame-blog' ); ?>" 
  	/>
	<input type="hidden" id="searchsubmit" /> 
</form>
