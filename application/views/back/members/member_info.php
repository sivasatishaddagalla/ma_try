<div class="fluid">
	<div class="fixed-fluid">
		<div class="fluid">
			<div class="panel">
				<div class="panel-body">

					<!--Dark Panel-->
			        <!--===================================================-->
			        <div class="pull-right">
						<button data-target='#delete_modal' data-toggle='modal' class='btn btn-danger btn-sm btn-labeled fa fa-trash' data-toggle='tooltip' data-placement='top' title='".translate('delete_member')."' onclick='delete_member("<?=$value->member_id?>")'><?php echo translate('delete')?></i></button>
						<a href="<?=base_url()?>admin/members/<?=$parameter?>/edit_member/<?=$value->member_id?>" class="btn btn-primary btn-sm btn-labeled fa fa-edit" type="button"><?php echo translate('edit')?></a>
					</div>

			        <div class="text-left">
			        	<h4>Member ID - <?=$value->member_profile_id?></h4>
			        </div>

			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('introduction')?></h3>
			            </div>
			            <div class="panel-body">
			                <p><?=$value->introduction?></p>
			            </div>
			        </div>

			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('basic_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table table-condenced">
							<tr>
								<td>
									<b><?php echo translate('first_name')?></b>
								</td>
								<td>
									<?=$value->first_name?>
								</td>
								<td>
									<b><?php echo translate('last_name')?></b>
								</td>
								<td>
									<?=$value->last_name?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('gender')?></b>
								</td>
								<td>
                            		<?=$this->Crud_model->get_type_name_by_id('gender', $value->gender)?>
								</td>
								<td>
									<b><?php echo translate('email')?></b>
								</td>
								<td>
									<?=$value->email?>
									<?php if($member_email_verification = $this->db->get_where('general_settings', array('type' => 'member_email_verification'))->row()->value == "on"){ ?>
										<br>
										<?php if ($value->email_verification_status == 1)
											{
												echo "<span class='badge badge-success' >".translate('email_verified')."</span>";
											}
											elseif ($value->is_closed == "no") {
												echo "<span class='badge badge-danger' >".translate('email_not_verified')."</span>";
											}
										?>
									<?php } ?>
								</td>

							</tr>
							<tr>
								<td>
									<b><?php echo translate('age')?></b>
								</td>
								<td>
									<?php
										$bday = new DateTime(date('d.m.Y', $value->date_of_birth));
										$today = new Datetime(date('d.m.Y'));
										$diff = $today->diff($bday);
										printf($diff->y);
									?>
									<!-- <?=$calculated_age = (date('Y') - date('Y', $value->date_of_birth));?> -->
								</td>
								<td>
									<b><?php echo translate('marital_status')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('marital_status', $basic_info[0]['marital_status'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('number_of_children')?></b>
								</td>
								<td>
									<?=$basic_info[0]['number_of_children']?>
								</td>
								<td>
									<b><?php echo translate('area')?></b>
								</td>
								<td>
									<?=$basic_info[0]['area']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('mobile')?></b>
								</td>
								<td>
									<?=$value->mobile?>
								</td>
								<td>
									<b><?php echo translate('onbehalf')?></b>
								</td>
								<td>
									 <?=$this->Crud_model->get_type_name_by_id('on_behalf', $basic_info[0]['on_behalf']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('date_of_birth')?></b>
								</td>
								<td>
									<?=date('d/m/Y', $value->date_of_birth)?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'present_address'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('present_address')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('country')?></b>
								</td>
								<td>
                            		<?=$this->Crud_model->get_type_name_by_id('country', $present_address[0]['country']);?>
								</td>
								<td>
									<b><?php echo translate('state')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('state', $present_address[0]['state']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('city')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('city', $present_address[0]['city']);?>
								</td>
								<td>
									<b><?php echo translate('postal-Code')?></b>
								</td>
								<td>
									<?=$present_address[0]['postal_code']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'education_and_career'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('education_&_career')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('highest_education')?></b>
								</td>
								<td>
									<?=$education_and_career[0]['highest_education']?>
								</td>
								<td>
									<b><?php echo translate('occupation')?></b>
								</td>
								<td>
									<?=$education_and_career[0]['occupation']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('annual_income')?></b>
								</td>
								<td>
									<?=$education_and_career[0]['annual_income']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'physical_attributes'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('physical_attributes')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('height')?></b>
								</td>
								<td>
									<?=$value->height.' '.translate('feet')?>
								</td>
								<td>
									<b><?php echo translate('weight')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['weight']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('eye_color')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['eye_color']?>
								</td>
								<td>
									<b><?php echo translate('hair_color')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['hair_color']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('complexion')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['complexion']?>
								</td>
								<td>
									<b><?php echo translate('blood_group')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['blood_group']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('body_type')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['body_type']?>
								</td>
								<td>
									<b><?php echo translate('body_art')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['body_art']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('any_disability')?></b>
								</td>
								<td>
									<?=$physical_attributes[0]['any_disability']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'language'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('language')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('mother_tongue')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['mother_tongue']);?>
								</td>
								<td>
									<b><?php echo translate('language')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['language']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('speak')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['speak']);?>
								</td>
								<td>
									<b><?php echo translate('read')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('language', $language[0]['read']);?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'hobbies_and_interests'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('hobbies_&_interest')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('hobby')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['hobby']?>
								</td>
								<td>
									<b><?php echo translate('interest')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['interest']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('music')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['music']?>
								</td>
								<td>
									<b><?php echo translate('books')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['books']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('movie')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['movie']?>
								</td>
								<td>
									<b><?php echo translate('TV_show')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['tv_show']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('sports_show')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['sports_show']?>
								</td>
								<td>
									<b><?php echo translate('fitness_activity')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['fitness_activity']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('cuisine')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['cuisine']?>
								</td>
								<td>
									<b><?php echo translate('dress_style')?></b>
								</td>
								<td>
									<?=$hobbies_and_interest[0]['dress_style']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'personal_attitude_and_behavior'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('personal_attitude_&_behavior')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('affection')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['affection']?>
								</td>
								<td>
									<b><?php echo translate('humor')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['humor']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('political_view')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['political_view']?>
								</td>
								<td>
									<b><?php echo translate('religious_service')?></b>
								</td>
								<td>
									<?=$personal_attitude_and_behavior[0]['religious_service']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'residency_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('residency_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('birth_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['birth_country']);?>
								</td>
								<td>
									<b><?php echo translate('residency_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['residency_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('citizenship_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['citizenship_country']);?>
								</td>
								<td>
									<b><?php echo translate('grow_up_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $residency_information[0]['grow_up_country']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('immigration_status')?></b>
								</td>
								<td>
									<?=$residency_information[0]['immigration_status']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'spiritual_and_social_background'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('spiritual_&_social_background')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('religion')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('religion', $spiritual_and_social_background[0]['religion']);?>
								</td>
								<td>
									<b><?php echo translate('caste_/_sect')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('caste', $spiritual_and_social_background[0]['caste'], 'caste_name');?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('sub-Caste')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('sub_caste', $spiritual_and_social_background[0]['sub_caste'], 'sub_caste_name');?>
								</td>
								<td>
									<b><?php echo translate('ethnicity')?></b>
								</td>
								<td>
									<?=$spiritual_and_social_background[0]['ethnicity']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('personal_value')?></b>
								</td>
								<td>
									<?=$spiritual_and_social_background[0]['personal_value']?>
								</td>
								<td>
									<b><?php echo translate('family_value')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('family_value', $spiritual_and_social_background[0]['family_value']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('community_value')?></b>
								</td>
								<td>
									<?=$spiritual_and_social_background[0]['community_value']?>
								</td>
								<td>
									<b><?php echo translate('family_status')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('family_status', $spiritual_and_social_background[0]['family_status']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('manglik')?></b>
								</td>
								<td>
									<?php $u_manglik=$spiritual_and_social_background[0]['u_manglik'];
	                                    if($u_manglik == 1){
	                                        echo "Yes";
	                                    }elseif($u_manglik == 2){
	                                        echo "No";
	                                    }
	                                    elseif($u_manglik == 3){
	                                        echo "I don't know";
	                                    }else{
	                                        echo " ";
	                                    }
	                                ?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
			        <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'life_style'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('life_style')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('diet')?></b>
								</td>
								<td>
									<?=$life_style[0]['diet']?>
								</td>
								<td>
									<b><?php echo translate('drink')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $life_style[0]['drink'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('smoke')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $life_style[0]['smoke'])?>
								</td>
								<td>
									<b><?php echo translate('living_with')?></b>
								</td>
								<td>
									<?=$life_style[0]['living_with']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'astronomic_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('astronomic_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('sun_sign')?></b>
								</td>
								<td>
									<?=$astronomic_information[0]['sun_sign']?>
								</td>
								<td>
									<b><?php echo translate('moon_sign')?></b>
								</td>
								<td>
									<?=$astronomic_information[0]['moon_sign']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('time_of_birth')?></b>
								</td>
								<td>
									<?=$astronomic_information[0]['time_of_birth']?>
								</td>
								<td>
									<b><?php echo translate('city_of_birth')?></b>
								</td>
								<td>
									<?=$astronomic_information[0]['city_of_birth']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'permanent_address'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('permanent_address')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $permanent_address[0]['permanent_country']);?>
								</td>
								<td>
									<b><?php echo translate('state')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('state', $permanent_address[0]['permanent_state']);?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('city')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('city', $permanent_address[0]['permanent_city']);?>
								</td>
								<td>
									<b><?php echo translate('postal-Code')?></b>
								</td>
								<td>
									<?=$permanent_address[0]['permanent_postal_code']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'family_information'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('family_information')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('father')?></b>
								</td>
								<td>
									<?=$family_info[0]['father']?>
								</td>
								<td>
									<b><?php echo translate('mother')?></b>
								</td>
								<td>
									<?=$family_info[0]['mother']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('brother_/_sister')?></b>
								</td>
								<td>
									<?=$family_info[0]['brother_sister']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'additional_personal_details'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('additional_personal_details')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('home_district')?></b>
								</td>
								<td>
									<?=$additional_personal_details[0]['home_district']?>
								</td>
								<td>
									<b><?php echo translate('family_residence')?></b>
								</td>
								<td>
									<?=$additional_personal_details[0]['family_residence']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate("father's_occupation")?></b>
								</td>
								<td>
									<?=$additional_personal_details[0]['fathers_occupation']?>
								</td>
								<td>
									<b><?php echo translate('special_circumstances')?></b>
								</td>
								<td>
									<?=$additional_personal_details[0]['special_circumstances']?>
								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
                    <?php
                        if ($this->db->get_where('frontend_settings', array('type' => 'partner_expectation'))->row()->value == "yes") {
                    ?>
			        <div class="panel panel-dark">
			            <div class="panel-heading">
			                <h3 class="panel-title"><?php echo translate('partner_expectation')?></h3>
			            </div>
			            <div class="panel-body">
			                <table class="table">
							<tr>
								<td>
									<b><?php echo translate('general_requirement')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['general_requirement']?>
								</td>
								<td>
									<b><?php echo translate('age')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_age']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('height')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_height']?>
								</td>
								<td>
									<b><?php echo translate('weight')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_weight']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('marital_status')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('marital_status', $partner_expectation[0]['partner_marital_status'])?>
								</td>
								<td>
									<b><?php echo translate('with_children_acceptables')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['with_children_acceptables'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('country_of_residence')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $partner_expectation[0]['partner_country_of_residence'])?>
								</td>
								<td>
									<b><?php echo translate('religion')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('religion', $partner_expectation[0]['partner_religion'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('sub_caste')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('sub_caste', $partner_expectation[0]['partner_sub_caste'], 'sub_caste_name');?>
								</td>
								<td>
									<b><?php echo translate('caste_/_sect')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('caste', $partner_expectation[0]['partner_caste'], 'caste_name');?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('education')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_education']?>
								</td>
								<td>
									<b><?php echo translate('profession')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_profession']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('drinking_habits')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_drinking_habits'])?>
								</td>
								<td>
									<b><?php echo translate('smoking_habits')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('decision', $partner_expectation[0]['partner_smoking_habits'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('diet')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_diet']?>
								</td>
								<td>
									<b><?php echo translate('body_type')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_body_type']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('personal_value')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_personal_value']?>
								</td>
								<td>
									<b><?php echo translate('manglik')?></b>
								</td>
								<td>
									<?php $manglik=$partner_expectation[0]['manglik'];
	                                    if($manglik == 1){
	                                        echo "Yes";
	                                    }elseif($manglik == 2){
	                                        echo "No";
	                                    }
	                                    elseif($manglik == 3){
	                                        echo "I don't know";
	                                    }else{
	                                        echo " ";
	                                    }
	                                ?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('any_disability')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_any_disability']?>
								</td>
								<td>
									<b><?php echo translate('mother_tongue')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('language', $partner_expectation[0]['partner_mother_tongue'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('family_value')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_family_value']?>
								</td>
								<td>
									<b><?php echo translate('prefered_country')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('country', $partner_expectation[0]['prefered_country'])?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('prefered_state')?></b>
								</td>
								<td>
									<?=$this->Crud_model->get_type_name_by_id('state', $partner_expectation[0]['prefered_state']);?>
								</td>
								<td>
									<b><?php echo translate('prefered_status')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['prefered_status']?>
								</td>
							</tr>
							<tr>
								<td>
									<b><?php echo translate('complexion')?></b>
								</td>
								<td>
									<?=$partner_expectation[0]['partner_complexion']?>
								</td>
								<td>
									<b></b>
								</td>
								<td>

								</td>
							</tr>
							</table>
			            </div>
			        </div>
			        <?php
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function delete_member(id){
	    $("#delete_member").val(id);
	}

	function deleteAMember() {
		$.ajax({
		    url: "<?=base_url()?>admin/member_delete/"+$("#delete_member").val(),
		    success: function(response) {
				window.location.href = "<?=base_url()?>admin/members/<?=$parameter?>";
		    },
			fail: function (error) {
			    alert(error);
			}
		});
	}
</script>

<div class="modal fade" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <!--Modal header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
                <h4 class="modal-title"><?php echo translate('confirm_delete')?></h4>
            </div>
           	<!--Modal body-->
            <div class="modal-body">
            	<p><?php echo translate('are_you_sure_you_want_to_delete_this_data?')?></p>
            	<div class="text-right">
            		<button data-dismiss="modal" class="btn btn-default btn-sm" type="button" id="modal_close"><?php echo translate('close')?></button>
                	<button class="btn btn-danger btn-sm" id="delete_member" onclick="deleteAMember()"value=""><?php echo translate('delete')?></button>
            	</div>
            </div>

        </div>
    </div>
</div>
