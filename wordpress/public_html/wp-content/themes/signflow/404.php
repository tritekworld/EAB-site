<?php
// =============================================================================
// TEMPLATE NAME: 404
// -----------------------------------------------------------------------------
// 404 Page Not Found template. This template is hidden.
// =============================================================================
$logo = SIGNFLOW_URL . "/inc/logo.png";
get_header();
if (defined("HC_PLUGIN_PATH")) {
    $tmp = hc_get_setting("logo");
    if ($tmp != "") $logo = $tmp;
}
?>
<div class="section-empty">
    <div class="container content box-middle-container full-screen-size" data-sub-height="100">
        <div class="row">
            <div class="col-md-12 text-center box-middle">
                <div>
                    <h1 class="text-xl">
                        <?php esc_html_e("404","signflow") ?>
                    </h1>
                    <h1>
                        <?php esc_html_e("PAGE NOT FOUND","signflow") ?>
                    </h1>
                    <p>
                        <?php esc_html_e("THE PAGE YOU WERE LOOKING FOR COULD NOT BE FOUND","signflow") ?>
                    </p>
                    <hr class="space m" />
                    <a class="anima-button btn-ms btn circle-button" href="<?php echo esc_url(get_site_url()) ?>">
                        <i class="fa fa-long-arrow-left"></i><?php esc_html_e("Go back to home","signflow") ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
