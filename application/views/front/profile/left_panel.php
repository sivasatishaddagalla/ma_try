<div class="sidebar sidebar-inverse sidebar--style-1 bg-base-1 z-depth-2-top">
    <?php if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->is_closed == 'yes'){?>
        <a class="badge-corner badge-corner-red" style="right: 15px;border-top: 90px solid  #DC0330;border-left: 90px solid transparent;">
            <span style="-ms-transform: rotate(45deg);/* IE 9 */-webkit-transform: rotate(45deg);/* Chrome, Safari, Opera */transform: rotate(45deg);font-size: 14px;margin-left: -24px;margin-top: -16px;"><?=translate('closed')?></span>
        </a>
    <?php }?>
    <div class="sidebar-object mb-0">
        <!-- Profile picture -->
        <div class="profile-picture profile-picture--style-2">
            <?php
                $profile_pic_approval = $this->db->get_where('general_settings', array('type' => 'member_profile_pic_approval_by_admin'))->row()->value;
                $profile_image_status = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'profile_image_status');
                $profile_image = $get_member[0]->profile_image;
                $images = json_decode($profile_image, true);
                if (file_exists('uploads/profile_image/'.$images[0]['thumb'])) { ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;" class="mx-auto">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/<?=$images[0]['thumb']?>)"></div>
                    </div>
                    <?php if($profile_pic_approval == 'on' && $profile_image_status == '0' || $profile_image_status == '2'){ ?>
                        <p class="text-center">
                            <?php
                            if($profile_image_status == '0'){
                                echo translate('pending');
                            } elseif ($profile_image_status == '2') {
                                echo translate('rejected');
                            }
                            ?>
                        </p>
                    <?php }?>
                <?php
                }
                else {
                ?>
                    <div style="border: 10px solid rgba(255, 255, 255, 0.1);width: 200px;border-radius: 50%;margin-top: 30px;" class="mx-auto">
                        <div class="profile_img" id="show_img" style="background-image: url(<?=base_url()?>uploads/profile_image/default.jpg)"></div>
                    </div>
                <?php
                }
            ?>
            <div class="profile-connect mt-1 mb-0" id="save_button_section" style="display: none">
                <button type="button" class="btn btn-styled btn-xs btn-base-2" id="save_image" ><?php echo translate('save_image')?></button>
            </div>
            <label class="btn-aux" for="profile_image" style="cursor: pointer;">
                <i class="ion ion-edit"></i>
            </label>
            <form action="<?=base_url()?>home/profile/update_image" method="POST" id="profile_image_form" enctype="multipart/form-data">
                <input type="file" style="display: none;" id="profile_image" name="profile_image"/>
            </form>
            <!-- <a href="#" class="btn-aux">
                <i class="ion ion-edit"></i>
            </a> -->
        </div>
        <!-- Profile details -->
        <div class="profile-details">
            <h2 class="heading heading-3 strong-500 profile-name"><?=$get_member[0]->first_name." ".$get_member[0]->last_name?></h2>
            <?php
                $education_and_career = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'education_and_career');
                $education_and_career_data = json_decode($education_and_career, true);
            ?>
            <h3 class="heading heading-6 strong-400 profile-occupation mt-3"><?=$education_and_career_data[0]['occupation']?></h3>
            <?php
                $package_info = json_decode($get_member[0]->package_info, true);
            ?>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry" style="width: 100%">
                    <span class="stats-count"><?=$get_member[0]->follower?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('followers')?></span>
                </div>
            </div>

            <!-- Profile connect -->
            <div class="profile-connect mt-5">
                <h2 class="heading heading-5 strong-400"><?php echo translate('package_informations')?></h2>
            </div>
            <div class="profile-stats clearfix mt-0">
                <div class="stats-entry">
                    <span class="stats-count"><?=$package_info[0]['current_package']?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('current_package')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=currency($package_info[0]['package_price'])?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('package_price')?></span>
                </div>
            </div>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry">
                    <span class="stats-count"><?=$package_info[0]['payment_type']?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('payment_gateway')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->express_interest?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('remaining_interest')?></span>
                </div>
            </div>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->direct_messages?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('remaining_message')?></span>
                </div>
                <div class="stats-entry">
                    <span class="stats-count"><?=$get_member[0]->photo_gallery?></span>
                    <span class="stats-label text-uppercase"><?php echo translate('photo_gallery')?></span>
                </div>
            </div>
            <div class="profile-stats clearfix mt-2">
                <div class="stats-entry">
                    <?php
                        if($get_member[0]->package_invalid_at == null){ ?>
                            <span class="stats-label text-uppercase"><?php echo translate('package_expired')?></span>
                        <?php }else{ ?>
                            <span class="stats-count"><?=$get_member[0]->package_invalid_at; ?></span>
                            <span class="stats-label text-uppercase"><?php echo translate('package_expires_at')?></span>
                        <?php }
                     ?>
                </div>
            </div>
        </div>

        <!-- Profile stats -->
        <div class="profile-useful-links clearfix">
            <div class="useful-links">
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 gallery l_nav" onclick="profile_load('gallery','alt-sm')">
                    <b style="font-size: 12px"><?php echo translate('gallery')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 happy_story l_nav" onclick="profile_load('happy_story','alt-sm')">
                    <b style="font-size: 12px"><?php echo translate('happy_story')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 my_packages l_nav" onclick="profile_load('my_packages','alt-sm')">
                    <b style="font-size: 12px"><?php echo translate('My_package')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 payments l_nav" onclick="profile_load('payments','alt-sm')">
                    <b style="font-size: 12px"><?php echo translate('payment_informations')?></b>
                </a>
                <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 picture_privacy l_nav" onclick="profile_load('picture_privacy','alt-sm')">
                    <b style="font-size: 12px"><?php echo translate('picture_privacy')?></b>
                </a>
                <?php if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->registration_type != 'social_login'){?>
                  <a class="btn btn-styled btn-sm btn-white z-depth-2-bottom mb-3 change_pass l_nav" onclick="profile_load('change_pass','alt-sm')">
                      <b style="font-size: 12px"><?php echo translate('change_password')?></b>
                  </a>
                <?php } ?>

                <div class="text-center pt-3 pb-0">
                    <?php if($this->db->get_where("member", array("member_id" => $this->session->userdata('member_id')))->row()->is_closed == 'yes'){?>
                        <a onclick="profile_load('reopen_account')">
                        <i class="fa fa-unlock"></i>
                        <?php echo translate('re-open_account?')?>
                    </a>
                    <?php }else{?>
                        <a onclick="profile_load('close_account')">
                            <i class="fa fa-lock"></i>
                            <?php echo translate('close_account')?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#profile_image").change(function () {
        readURL(this);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#show_img").css({
                    "background-image" : "url("+ e.target.result +")"
                });
            }
            reader.readAsDataURL(input.files[0]);
            $("#save_button_section").show();
        }
    }
    $("#save_image").click(function(e) {
        e.preventDefault();
        // alert('asdas');
        $("#profile_image_form").submit();
    })
</script>
