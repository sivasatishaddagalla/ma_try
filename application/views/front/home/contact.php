<?php
    $home_contact_info_text = $this->db->get_where('frontend_settings', array('type' => 'home_contact_info_text'))->row()->value;
    $home_contact_phone = $this->db->get_where('general_settings', array('type' => 'phone'))->row()->value;
    $home_contact_address = $this->db->get_where('general_settings', array('type' => 'address'))->row()->value;

?>
<section class="slice bg-base-2 no-padding">
    <div class="container">
        <div class="container-inner sct-color-1">
            <div class="block-card-wrapper">
                <div class="block-card-section">
                    <div class="" id="same_height_1">
                        <div class="row">
                            <div class="col-lg-12 no-padding">
                                <div class="same-height bg-base-2" data-same-height="#same_height_1">
                                    <center>
                                        <div class="sct-inner px-4 py-4">
                                            <h3 class="heading heading-5 strong-400">
                                            <?php echo translate('contact_information ')?></h3>
                                            <p class="mt-3 mb-3">
                                                <?=$home_contact_info_text?>
                                            </p>
                                            <div class="icon-block--style-3 mb-1 mt-5">
                                                <i class="icon ion-ios-telephone bg-base-4"></i>
                                                <span class="heading heading-6 strong-400">
                                                <?=$home_contact_phone?> </span>
                                            </div>
                                            <div class="icon-block--style-3 mb-3">
                                                <i class="icon ion-ios-email bg-base-4"></i>
                                                <span class="heading heading-6 strong-400">
                                                <?=$this->system_email?> </span>
                                            </div>
                                            <div class="icon-block--style-3">
                                                <i class="icon ion-ios-location bg-base-4"></i>
                                                <span class="heading heading-6 strong-400">
                                                <?=$home_contact_address?> </span>
                                            </div>
                                            <span class="clearfix"></span>
                                            <a href="<?=base_url()?>home/contact_us" class="btn btn-styled btn-block btn-base-1 btn-outline btn-circle mt-5 z-depth-2-bottom" style="width: 40%;color: #FFF!important">
                                            <?php echo translate('contact_us')?></a>
                                            <span class="clearfix"></span>
                                            <div class="text-center">
                                                <ul class="social-media social-media--style-1-v4 mt-4">
                                                    <?php
                                                        $social_links = $this->db->get('social_links')->result();
                                                        foreach ($social_links as $social_link): ?>
                                                            <?php if ($social_link->value != ''): ?>
                                                                <li>
                                                                    <a href="<?=$social_link->value?>" class="<?=$social_link->type?>" target="_blank" title="<?=translate($social_link->type)?>">
                                                                        <i class="<?=$social_link->icon?>"></i>
                                                                    </a>
                                                                </li>
                                                            <?php endif ?>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>