<!--content -->
<!--<section id="content">
    <div class="wrapper pad1">
        <?php /*$this->load->view('client/layout/sidebar_new'); */?>
        <?php
/*        if (!empty($template)) :*/?>

            <?php /*$this->load->view($template); */?>
            <?php /*else : */?>
            <div style="height: 600px">
                Content is not ready yet. Sorry about this.
            </div>
            <?php /*endif; */?>
    </div>

</section>-->

<!--content end-->
<div id="casing">
    <div class="wrapper">
<aside>

    <?php $this->load->view('client/layout/sidebar_new'); ?>
</aside>
<section>
    <div id="content">
        <?php
        if (!empty($template)) :?>

            <?php $this->load->view($template); ?>
            <?php else : ?>
            <div style="height: 600px">
                Content is not ready yet. Sorry about this.
            </div>
            <?php endif; ?>
    </div>
</section></div></div>
