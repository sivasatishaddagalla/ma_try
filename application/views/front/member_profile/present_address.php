<div id="info_present_address">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('present_address');?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('country');?></span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('country', $present_address_data[0]['country']);?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('state');?></span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('state', $present_address_data[0]['state']);?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('city');?></span>
                        </td>
                        <td>
                            <?=$this->Crud_model->get_type_name_by_id('city', $present_address_data[0]['city']);?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('postal-Code');?></span>
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