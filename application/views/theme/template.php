<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * views/_template.php
 *
 * Template page.
 *
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="<?php echo base_url();?>" />
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>
        {pagetitle} <?php echo $this->config->item('company').' -- '.$this->lang->line('common_powered_by').' OS Point Of Sale' ?>
    </title>

    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/style.css" />
    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url();?>css/style_print.css"  media="print"/>
    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/bootstrap/dist/css/bootstrap.css');?>" />
    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/font-awesome/css/font-awesome.css');?>" />
    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/theme/css/AdminLTE.css');?>" />
    <link rel="stylesheet" rev="stylesheet" href="<?php echo base_url('public/theme/css/skins/_all-skins.min.css');?>" />

    <script>BASE_URL = '<?php echo site_url(); ?>';</script>
    <script src="<?php echo base_url('public/jquery/dist/jquery.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url('public/bootstrap/dist/js/bootstrap.js');?>" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.color.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.metadata.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.form.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.tablesorter.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.ajax_queue.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.bgiframe.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.autocomplete.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.validate.min.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/jquery.jkey-1.1.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/thickbox.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/common.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/manage_tables.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/swfobject.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/date.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url();?>js/datepicker.js" type="text/javascript" language="javascript" charset="UTF-8"></script>

    <script src="<?php echo base_url();?>/public/theme/js/app.js" type="text/javascript" language="javascript" charset="UTF-8"></script>
</head>

<body class="skin-blue">

{header}

{menubar}

{titleblock}

<!-- center of the page -->
<div id="content">
    <div class="container">
        {content}
    </div>
</div>

{footer}

<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>