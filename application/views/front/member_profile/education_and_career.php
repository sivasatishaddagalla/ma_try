<div id="info_education_and_career">
    <div class="card-inner-title-wrapper pt-0">
        <h3 class="card-inner-title pull-left">
            <?php echo translate('education_&_career')?>
        </h3>
    </div>
    <div class="table-full-width">
        <div class="table-full-width">
            <table class="table table-profile table-responsive table-striped table-bordered table-slick">
                <tbody>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('highest_education')?></span>
                        </td>
                        <td>
                            <?=$education_and_career_data[0]['highest_education']?>
                        </td>
                        <td class="td-label">
                            <span><?php echo translate('occupation')?></span>
                        </td>
                        <td>
                            <?=$education_and_career_data[0]['occupation']?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td-label">
                            <span><?php echo translate('annual_income')?></span>
                        </td>
                        <td>
                            <?=$education_and_career_data[0]['annual_income']?>
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