<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.futurextech.com
 * @since      1.0.0
 *
 * @package    Storiessearch
 * @subpackage Storiessearch/admin
 */

 
class Admin_Functionality {

	 

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( ) {  
	 
        $this->enqueue_scripts();
		$this->request_data_page_handler();       
        
	}
    
   
 
  public function enqueue_scripts() {
	  
	  wp_enqueue_script( "admin_file", '', array( 'jquery' ) );
	  
	   wp_enqueue_script( "admin_file", plugin_dir_url( FILE ) . 'nia_questionnaire/admin/js/admin_export.js', array( 'jquery' ) );
     
   wp_localize_script( 'admin_file', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) ); 
 }

public function request_data_page_handler()
	{
    	 global $wpdb;
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-admin-list-data.php';
    $table = new request_table_list();
    $table->prepare_items();

    $message = '';
    if ('delete' === $table->current_action()) {
        $message = '<div class="updated below-h2" id="message"><p>' . sprintf(__('Items deleted: %d', 'custom_table_example'), count($_REQUEST['id'])) . '</p></div>';
    }
    ?>
    <style>
    table.fixed {
    table-layout: auto;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<div class="wrap">

    <div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
  
  

    <form id="persons-table" method="GET">
        <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>"/>
        <?php $table->display() ?>
        <input class="button action" type="button" value="Export Leads Data" name="btnExport" id="btnExport"> 
    </form>

</div>
<?php
	}
 
	

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */

	 
}



