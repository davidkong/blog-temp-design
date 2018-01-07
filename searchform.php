<?php


?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">

	<span class="label"></span>
	<label> 
        <input type="search" placeholder = "TYPE YOUR SEARCH AND HIT ENTER" class="field s" name="s" value="<?php _e( 'TYPE YOUR SEARCH AND HIT ENTER', 'frame-blog' ); ?>" onfocus="if (this.value == '<?php _e( 'TYPE YOUR SEARCH AND HIT ENTER', 'frame-blog' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'TYPE YOUR SEARCH AND HIT ENTER', 'frame-blog' ); ?>';}" />
		
	</label>
	<input type="hidden" id="searchsubmit" /> 
</form>
