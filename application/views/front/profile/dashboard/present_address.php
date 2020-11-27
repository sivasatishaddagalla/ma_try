<?php 
    $present_address = $this->Crud_model->get_type_name_by_id('member', $this->session->userdata['member_id'], 'present_address');
    $present_address_data = json_decode($present_address, true);
?>
<div class="feature feature--boxed-border feature--bg-1 pt-3 pb-0 pl-3 pr-3 mb-3 border_top2x">
    <div id="info_present_address">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('present_address')?>
            </h3>
            <div class="pull-right">
                <button type="button" id="unhide_present_address" <?php if ($privacy_status_data[0]['present_address'] == 'yes') {?> style="display: none" <?php }?> class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="unhide_section('present_address')">
                <i class="fa fa-unlock"></i> <?=translate('show')?>
                </button>
                <button type="button" id="hide_present_address" <?php if ($privacy_status_data[0]['present_address'] == 'no') {?> style="display: none" <?php }?> class="btn btn-dark btn-sm btn-icon-only btn-shadow mb-1" onclick="hide_section('present_address')">
                <i class="fa fa-lock"></i> <?=translate('hide')?>
                </button>
                <button type="button" class="btn btn-base-1 btn-sm btn-icon-only btn-shadow mb-1" onclick="edit_section('present_address')">
                <i class="ion-edit"></i>
                </button>              
            </div>
        </div>
        <div class="table-full-width">
            <div class="table-full-width">
                <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                    <tbody>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('country')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('country', $present_address_data[0]['country']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('state')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('state', $present_address_data[0]['state']);?>
                            </td>
                        </tr>
                        <tr>
                            <td class="td-label">
                                <span><?php echo translate('city')?></span>
                            </td>
                            <td>
                                <?=$this->Crud_model->get_type_name_by_id('city', $present_address_data[0]['city']);?>
                            </td>
                            <td class="td-label">
                                <span><?php echo translate('postal-Code')?></span>
                            </td>
                            <td>
                                <?=$present_address_data[0]['postal_code']?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="edit_present_address" style="display: none">
        <div class="card-inner-title-wrapper pt-0">
            <h3 class="card-inner-title pull-left">
                <?php echo translate('present_address')?>
            </h3>
            <div class="pull-right">
                <button type="button" class="btn btn-success btn-sm btn-icon-only btn-shadow" onclick="save_section('present_address')"><i class="ion-checkmark"></i></button>
                <button type="button" class="btn btn-danger btn-sm btn-icon-only btn-shadow" onclick="load_section('present_address')"><i class="ion-close"></i></button>
            </div>
        </div>
        
        <div class='clearfix'></div>
        <form id="form_present_address" class="form-default" role="form">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="first_name" class="text-uppercase c-gray-light"><?php echo translate('country')?></label>
                        <?php 
                            echo $this->Crud_model->select_html('country', 'country', 'name', 'edit', 'form-control form-control-sm selectpicker present_country_edit', $present_address_data[0]['country'], '', '', '');
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="state" class="text-uppercase c-gray-light"><?php echo translate('state')?></label>
                        <?php
                            if (!empty($present_address_data[0]['country'])) {
                                echo $this->Crud_model->select_html('state', 'state', 'name', 'edit', 'form-control form-control-sm selectpicker present_state_edit', $present_address_data[0]['state'], 'country_id', $present_address_data[0]['country'], '');   
                            } else {
                            ?>
                                <select class="form-control form-control-sm selectpicker present_state_edit" name="state">
                                    <option value=""><?php echo translate('choose_a_country_first')?></option>
                                </select>
                            <?php
                            }
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="city" class="text-uppercase c-gray-light"><?php echo translate('city')?></label>
                        <?php
                            if (!empty($present_address_data[0]['state'])) {
                                echo $this->Crud_model->select_html('city', 'city', 'name', 'edit', 'form-control form-control-sm selectpicker present_city_edit', $present_address_data[0]['city'], 'state_id', $present_address_data[0]['state'], '');  
                            } else {
                            ?>
                                <select class="form-control form-control-sm selectpicker present_city_edit" name="city">
                                    <option value=""><?php echo translate('choose_a_state_first')?></option>
                                </select>
                            <?php
                            }
                        ?>
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-feedback">
                        <label for="postal_code" class="text-uppercase c-gray-light"><?php echo translate('postal-Code')?></label>
                        <input type="text" class="form-control no-resize" name="postal_code" value="<?=$present_address_data[0]['postal_code']?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(".present_country_edit").change(function(){
        var country_id = $(".present_country_edit").val();
        if (country_id == "") {
            $(".present_state_edit").html("<option value=''><?php echo translate('choose_a_country_first')?></option>");
            $(".present_city_edit").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/state/country_id/"+country_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".present_state_edit").html(data);
                    $(".present_city_edit").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
    $(".present_state_edit").change(function(){
        var state_id = $(".present_state_edit").val();
        if (state_id == "") {
            $(".present_city_edit").html("<option value=''><?php echo translate('choose_a_state_first')?></option>");
        } else {  
            $.ajax({
                url: "<?=base_url()?>home/get_dropdown_by_id/city/state_id/"+state_id, // form action url
                type: 'POST', // form submit method get/post
                dataType: 'html', // request type html/json/xml
                cache       : false,
                contentType : false,
                processData : false,
                success: function(data) {
                    $(".present_city_edit").html(data);
                },
                error: function(e) {
                    console.log(e)
                }
            });
        }
    });
</script>