<div class="fixed-sm-200 fixed-lg-250 pull-sm-left">
	<div class="panel">
		<!-- Simple profile -->
		<div class="text-center pad-all bord-btm">
			<div class="pad-ver">
				<img src="<?=base_url()?>uploads/profile_image/<?=$image[0]['thumb']?>" class="img-lg img-border img-circle" alt="Profile Picture">
			</div>
			<h4 class="text-lg text-overflow mar-no"><?=$value->first_name." ".$value->last_name?></h4>
			<p class="text-sm">
				<?=$education_and_career[0]['occupation']?>
			</p>
			<p class="text-sm">
				<?=$this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']);?>, <?=$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);?>
			</p>
			<div class="pad-ver btn-groups">
				<a href="#" id="demo-dt-delete-btn" data-target='#package_modal' data-toggle='modal' class="btn btn-info btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="Packages" onclick='view_package(<?=$value->member_id?>)'><i class="fa fa-object-ungroup"></i></a>
				<?php
				if ($value->is_blocked == 'no') {
				?>
				<a href="#" id="demo-dt-block-btn" data-target='#block_modal' data-toggle='modal' class="btn btn-dark btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="<?=translate('block_user')?>" onclick="block('<?=$value->is_blocked?>', <?=$value->member_id?>)"><i class="fa fa-ban"></i></a>
				<?php
				}
				else {
				?>
				<a href="#" id="demo-dt-block-btn" data-target='#block_modal' data-toggle='modal' class="btn btn-success btn-sm add-tooltip" data-toggle="tooltip" data-placement="top" title="<?=translate('unblock_user')?>" onclick="block('<?=$value->is_blocked?>', <?=$value->member_id?>)"><i class="fa fa-check"></i></a>
				<?php
				}
				?>
			</div>
			<div class="profile-stats clearfix" style="padding: 15px;">
	            <div class="stats-entry col-sm-12 text-center">
	                <span class="stats-count"><?=$value->follower?></span><br>
	                <span class="stats-label text-uppercase"><?php echo translate('follower(s)')?></span>
	            </div>
	        </div>
	        <div class="text-center">
            	<?php if ($value->is_closed == "yes")
				{
					echo "<span class='badge badge-danger' >".translate('closed_account')."</span>";
				}
				elseif ($value->is_closed == "no") {
					echo "<span class='badge badge-success' >".translate('active_account')."</span>";
				} ?>
            </div>
		</div>
	</div>
</div>
