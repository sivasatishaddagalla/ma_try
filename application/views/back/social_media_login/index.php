<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<div id="page-head">
		<!--Page Title-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div id="page-title">
			<h1 class="page-header text-overflow"><?= translate('social_login_configurations')?></h1>

		</div>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End page title-->
		<!--Breadcrumb-->
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<ol class="breadcrumb">
			<li><a href="#"><?= translate('home')?></a></li>
			<li><a href="#"><?= translate('configuration')?></a></li>
			<li><a href="#"><?= translate('social_login_configurations')?></a></li>
		</ol>
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<!--End breadcrumb-->
	</div>
	<!--Page content-->
	<!--===================================================-->


	<div id="page-content">
		<div class="panel">
			<?php if (!empty($success_alert)): ?>
				<div class="alert alert-success" id="success_alert" style="display: block">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <?=$success_alert?>
        </div>
			<?php endif ?>
			<?php if (!empty($danger_alert)): ?>
				<div class="alert alert-danger" id="danger_alert" style="display: block">
            <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
            <?=$danger_alert?>
        </div>
			<?php endif ?>
		</div>
	</div>
	<div class="col-md-6" id="page-content">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><?= translate('google_login_configuration')?></h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" id="captcha_settings_form" method="POST" action="<?=base_url()?>admin/update_social_media_configurations/google">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="g_login_activation"><b><?= translate('google_login_activation')?></b></label>
						<div class="col-sm-8">
							<div class="checkbox">
		                <input id="g_login_activation" name="g_login_activation" class="magic-checkbox" type="checkbox" <?php if($this->db->get_where('third_party_settings', array('type' => 'g_login_set'))->row()->value == "ok"){ ?>checked<?php } ?>>
		                <label for="g_login_activation"></label>
		            </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="g_client_id"><b><?= translate('client_ID')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="g_client_id" value="<?=$this->db->get_where('third_party_settings', array('type' => 'g_client_id'))->row()->value;?>" placeholder="<?php echo translate('client_ID')?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="g_client_secret"><b><?= translate('client_secret')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="g_client_secret" value="<?=$this->db->get_where('third_party_settings', array('type' => 'g_client_secret'))->row()->value;?>" placeholder="<?php echo translate('client_secret')?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8 text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"><?php echo translate('save')?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6" id="page-content">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><?= translate('facebook_login_configuration')?></h3>
			</div>
			<div class="panel-body">
    		<form class="form-horizontal" id="facebook_login_settings_form" method="POST" action="<?=base_url()?>admin/update_social_media_configurations/facebook">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="fb_login_activation"><b><?= translate('facebook_login_activation')?></b></label>
						<div class="col-sm-8">
							<div class="checkbox">
		                <input id="fb_login_activation" name="fb_login_activation" class="magic-checkbox" type="checkbox" <?php if($this->db->get_where('third_party_settings', array('type' => 'fb_login_set'))->row()->value == "ok"){ ?>checked<?php } ?>>
		                <label for="fb_login_activation"></label>
		            </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="fb_appid"><b><?= translate('app_ID')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="fb_appid" value="<?=$this->db->get_where('third_party_settings', array('type' => 'fb_appid'))->row()->value;?>" placeholder="<?php echo translate('app_ID')?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="fb_secret"><b><?= translate('app_secret')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="fb_secret" value="<?=$this->db->get_where('third_party_settings', array('type' => 'fb_secret'))->row()->value;?>" placeholder="<?php echo translate('secret')?>">
							<br>
							<span class="text-danger"><?php echo translate('If the member account is created by phone number, then they will not get any mail'); ?>.</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8 text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"><?php echo translate('save')?></button>
						</div>
					</div>
			</form>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-6" id="page-content">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><?= translate('twitter_login_configuration')?></h3>
			</div>
			<div class="panel-body">
    		<form class="form-horizontal" id="twitter_login_settings_form" method="POST" action="<?=base_url()?>admin/update_social_media_configurations/twitter">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="twitter_login_activation"><b><?= translate('twitter_login_activation')?></b></label>
						<div class="col-sm-8">
							<div class="checkbox">
		                <input id="twitter_login_activation" name="twitter_login_activation" class="magic-checkbox" type="checkbox" <?php if($this->db->get_where('third_party_settings', array('type' => 'twitter_login_set'))->row()->value == "ok"){ ?>checked<?php } ?>>
		                <label for="twitter_login_activation"></label>
		            </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="twitter_app_key"><b><?= translate('app_key')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="twitter_app_key" value="<?=$this->db->get_where('third_party_settings', array('type' => 'twitter_app_key'))->row()->value;?>" placeholder="<?php echo translate('app_key')?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="twitter_app_secret"><b><?= translate('app_secret')?> </b></label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="twitter_app_secret" value="<?=$this->db->get_where('third_party_settings', array('type' => 'twitter_app_secret'))->row()->value;?>" placeholder="<?php echo translate('app_secret')?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-8 text-right">
							<button type="submit" class="btn btn-primary btn-sm btn-labeled fa fa-save"><?php echo translate('save')?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> -->
</div>
<script>
	setTimeout(function() {
	    $('#success_alert').fadeOut('fast');
	    $('#danger_alert').fadeOut('fast');
	}, 5000); // <-- time in milliseconds
</script>
