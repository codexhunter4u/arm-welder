<div class="profile_details">		
	<ul>
		<li class="dropdown profile_details_drop">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<div class="profile_img">	
					<span class="prfil-img"><img src="<?php echo base_url('avtar/user_'.$user['userdata']->user_id.'.jpg');?>" alt="<?php echo $user['userdata']->username; ?>"> </span>
					<div class="user-name">
						<p><?php echo $user['userdata']->username; ?></p>
						<span><?php echo $user['userdata']->role_name; ?></span>
					</div>
					<i class="fa fa-angle-down lnr"></i>
					<i class="fa fa-angle-up lnr"></i>
					<div class="clearfix"></div>	
				</div>	
			</a>
			<ul class="dropdown-menu drp-mnu">
				<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li> 
				<li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li> 
				<li> <a href="<?php  echo base_url('profileController'); ?>"><i class="fa fa-suitcase"></i> Profile</a> </li> 
				<li> <a href="<?php  echo base_url('loggerController/logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
			</ul>
		</li>
	</ul>
</div>