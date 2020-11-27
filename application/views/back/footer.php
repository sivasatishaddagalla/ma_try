<!-- FOOTER -->
<!--===================================================-->
<footer id="footer">
	<p class="text-center">
		&#0169; <?=date("Y")?> <a href="<?=base_url()?>" target="_blank"><?=$this->system_name?></a>
		<span style="float: right;padding-right: 5px">Version <?php echo $this->db->get_where('general_settings',array('type'=>'version'))->row()->value; ?></span>
	</p>
</footer>
<!--===================================================-->
<!-- END FOOTER -->
