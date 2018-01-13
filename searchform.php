<?php


?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<span class="label"></span>
		<label> 
	  	<input 
	  		type="search" 
	  		autofocus="true"
	  		class="field s" 
	  		name="s" 
	  		value="<?php _e( '', 'frame-blog' ); ?>" 
	  	/>
		</label>
	<input type="hidden" id="searchsubmit" /> 
</form>
