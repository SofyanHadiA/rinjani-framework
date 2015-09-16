	</div>
</div>

<!--<div > <?php echo $this->lang->line('common_you_are_using_ospos'); ?> <?php echo $this->config->item('application_version'); ?>.
<?php echo $this->lang->line('common_please_visit_my'); ?> <a href="http://sourceforge.net/projects/opensourcepos/" target="_blank"><?php echo $this->lang->line('common_website'); ?></a> <?php echo $this->lang->line('common_learn_about_project'); ?>.</div>
-->

<div class="modal fade" id="modal-container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="modal-title">Modal title</h4>

            </div>
            <div class="modal-body"><div class="te"></div></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Clear modal content on close -->
<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
    });
</script>		
		
</body>
</html>