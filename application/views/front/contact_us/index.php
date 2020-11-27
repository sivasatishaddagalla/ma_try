<section class="slice sct-color-1">
    <?php if (!empty($success_alert)): ?>
            <div class="col-6 ml-auto mr-auto" id="success_alert">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?=$success_alert?>
                </div>
            </div>
        <?php endif ?>
    <div class="container">
        <div class="section-title section-title--style-1 text-center mb-4">
            <h3 class="section-title-inner heading-1 strong-300 text-normal">
                <?php echo translate('contact_us')?>
            </h3>
            <span class="section-title-delimiter clearfix d-none"></span>
        </div>

        <span class="clearfix"></span>
        <?php
            $contact_us_text = $this->db->get_where('frontend_settings', array('type' => 'contact_us_text'))->row()->value;
        ?>
        <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
            <?php echo $contact_us_text?>
        </div>

        <span class="space-xs-xl"></span>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Contact form -->
                <form class="form-default" role="form" method="POST" action="<?=base_url()?>home/contact_us/send">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label for="" class="text-uppercase c-gray-light"><?php echo translate('your_name')?></label>
                                <input type="text" name="name" class="form-control form-control-md" required="" value="<?php if(!empty($form_contents)){echo $form_contents['name'];}?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <label for="" class="text-uppercase c-gray-light"><?php echo translate('email_address')?></label>
                                <input type="email" name="email" class="form-control form-control-md" required="" value="<?php if(!empty($form_contents)){echo $form_contents['email'];}?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="" class="text-uppercase c-gray-light"><?php echo translate('subject')?></label>
                                <input type="text" name="subject" class="form-control form-control-md" required="" value="<?php if(!empty($form_contents)){echo $form_contents['subject'];}?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-feedback">
                                <label for="" class="text-uppercase c-gray-light"><?php echo translate('message')?> <small class="text-danger sml_txt" style="text-transform: none;"><?='('.translate('max_300_characters').')'?></small></label>
                                <textarea name="message" class="form-control no-resize" rows="5" required="" maxlength="300"><?php if(!empty($form_contents)){echo $form_contents['message'];}?></textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <?php
                        if($this->Crud_model->get_settings_value('third_party_settings','captcha_status','value') == 'ok') {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?=$recaptcha_html?>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="mt-2 col-12">
                        <?php if (!empty($captcha_incorrect) && $captcha_incorrect == TRUE): ?>
                            <p class="text-danger"><?=translate('captcha_incorrect')?></p>
                        <?php endif; ?>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-styled btn-base-1 mt-4"><?php echo translate('send_message')?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        setTimeout(function() {
            $('.alert-success').fadeOut('fast');
        }, 5000); // <-- time in milliseconds
    });
</script>
