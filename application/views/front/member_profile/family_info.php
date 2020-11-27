<div id="info_family_info">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('family_information')?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('father')?></span>
                        </td>
                        <td>
                            <?=$family_info_data[0]['father']?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('mother')?></span>
                        </td>
                        <td>
                            <?=$family_info_data[0]['mother']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('brother_/_sister')?></span>
                        </td>
                        <td>
                            <?=$family_info_data[0]['brother_sister']?>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>