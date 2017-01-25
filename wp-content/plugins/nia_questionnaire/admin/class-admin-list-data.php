<?php

class request_table_list extends WP_List_Table
{
    /**
     * [REQUIRED] You must declare constructor and give some basic params
     */
    function __construct()
    {
        global $status, $page;

        parent::__construct(array(
            'singular' => 'leads2',
            'plural' => 'leads2',
        ));
    }

    /**
     * [REQUIRED] this is a default column renderer
     *
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */
    function column_default($item, $column_name)
    {
        return $item[$column_name];
    }

    /**
     * [OPTIONAL] this is example, how to render specific column
     *
     * method name must be like this: "column_[column_name]"
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_age($item)
    {
        return '<em>' . $item['age'] . '</em>';
    }

    /**
     * [OPTIONAL] this is example, how to render column with actions,
     * when you hover row "Edit | Delete" links showed
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_name($item)
    {
        // links going to /admin.php?page=[your_plugin_page][&other_params]
        // notice how we used $_REQUEST['page'], so action will be done on curren page
        // also notice how we use $this->_args['singular'] so in this example it will
        // be something like &person=2
        $actions = array(
            'edit' => sprintf('<a href="?page=persons_form&id=%s">%s</a>', $item['id'], __('Edit', 'custom_table_example')),
            'delete' => sprintf('<a href="?page=%s&action=delete&id=%s">%s</a>', $_REQUEST['page'], $item['id'], __('Delete', 'custom_table_example')),
        );

        return sprintf('%s %s',
            $item['name'],
            $this->row_actions($actions)
        );
    }

    /**
     * [REQUIRED] this is how checkbox column renders
     *
     * @param $item - row (key, value array)
     * @return HTML
     */
    function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />',
            $item['id']
        );
    }

    /**
     * [REQUIRED] This method return columns to display in table
     * you can skip columns that you do not want to show
     * like content, or description
     *
     * @return array
     */
    function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />', //Render a checkbox instead of text
            'fname' => __('First Name', 'custom_table_example'),
            'lname' => __('Last Name', 'custom_table_example'),
            //'staddress' => __('Street Address', 'custom_table_example'),
			//'city' => __('City State Zip', 'custom_table_example'),
			//'maritalstatus' => __('Marital Status', 'custom_table_example'),
			'phone' => __('Phone Number', 'custom_table_example'),
			/*'MilitaryAffiliation' => __('Military Service?', 'custom_table_example'),
			'UsedTobacco' => __('Tobacco in last 12 months?', 'custom_table_example'),
			'isPilot' => __('Flown as a Pilot or Co-Pilot?', 'custom_table_example'),
			'doesScubaOrSkyDiving' => __('Have Scuba or Sky Dived?', 'custom_table_example'),
			'DuiOrRecklessDriving' => __('Reckless Driving or DUI offense?', 'custom_table_example'),
			'moving_voilation' => __('More than 3 Moving Violations?', 'custom_table_example'),
			'revoke_lie' => __('Suspended/Revoked License?', 'custom_table_example'),
			//'requested_list' => __('Currently Insured?', 'custom_table_example'), 
			'policy_for' => __('Policy For', 'custom_table_example'), 
			'age' => __('Age', 'custom_table_example'),
			'retirement' => __('Retirement', 'custom_table_example'),
			'gender' => __('Gender', 'custom_table_example'),
			'height' => __('Height', 'custom_table_example'),
			'weight' => __('Weight', 'custom_table_example'),
			'homeowner' => __('Are you a homeowner?', 'custom_table_example'),
			'medi_condition' => __('Major Medical Conditions?', 'custom_table_example'),
			'term_lenght' => __('Desired Term Length', 'custom_table_example'),
			'policy_amount' => __('Desired Policy Coverage Amount', 'custom_table_example'),*/
			'email' => __('Email Address', 'custom_table_example'), 
			'zip' => __('Your ZIP code', 'custom_table_example'),
			'dob' => __('Date of Birth', 'custom_table_example'),
			'user_ip' => __('User IP', 'custom_table_example'),
			'dt' => __('User Timestamp', 'custom_table_example'),
			'referral_url' => __('Referral Url', 'custom_table_example'),
			
        );
        return $columns;
    }

    /**
     * [OPTIONAL] This method return columns that may be used to sort table
     * all strings in array - is column names
     * notice that true on name column means that its default sort
     *
     * @return array
     */
    function get_sortable_columns()
    {
        $sortable_columns = array(
            'fname' => array('fname', false),
            'lname' => array('lname', false),
			'phone' => array('phone', false),
			'email' => array('email', false),
			'zip' => array('zip', false),
			'dob' => array('dob', false),
			'user_ip' => array('user_ip', false),
			'dt' =>array('user_timestamp', true),
			'referral_url' =>array('referral_url', false),
			
            /*'staddress' => array('staddress', false),
			'city' => array('city', false),
			'maritalstatus' => array('maritalstatus', false), 
			'MilitaryAffiliation' => array('MilitaryAffiliation', false),
			'UsedTobacco' => array('UsedTobacco', false),
			'isPilot' => array('isPilot', false),
			'doesScubaOrSkyDiving' => array('doesScubaOrSkyDiving', false),
			'DuiOrRecklessDriving' => array('DuiOrRecklessDriving', false),
			'moving_voilation' => array('moving_voilation', false),
			'revoke_lie' => array('revoke_lie', false),
			//'requested_list' => array('requested_list', false), 
			'policy_for' => array('policy_for', false),
			
			'age' => array('age', false),
			'retirement' => array('retirement', false),
			'gender' => array('gender', false),
			'height' => array('height', false),
			'weight' => array('weight', false),
			'homeowner' => array('homeowner', false),
			'medi_condition' => array('medi_condition', false),
			'term_lenght' => array('term_lenght', false),
			'policy_amount' => array('policy_amount', false),*/
			
        );
        return $sortable_columns;
    }

    /**
     * [OPTIONAL] Return array of bult actions if has any
     *
     * @return array
     */
    function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Delete'
        );
        return $actions;
    }

    /**
     * [OPTIONAL] This method processes bulk actions
     * it can be outside of class
     * it can not use wp_redirect coz there is output already
     * in this example we are processing delete action
     * message about successful deletion will be shown on page in next part
     */
    function process_bulk_action()
    {
        global $wpdb;
       	$table_name = 'leads2';

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
            }
        }
    }

    /**
     * [REQUIRED] This is the most important method
     *
     * It will get rows from database and prepare them to be showed in table
     */
    function prepare_items()
    {
        global $wpdb;
        	$table_name = 'leads2';

        $per_page = 20; // constant, how much records will be shown per page

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // here we configure table headers, defined in our methods
        $this->_column_headers = array($columns, $hidden, $sortable);

        // [OPTIONAL] process bulk action if any
        $this->process_bulk_action();

        // will be used in pagination settings
        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

		 
        // prepare query params, as usual current page, order by and order direction
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) * $per_page : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'dt';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

        // [REQUIRED] define $items array
        // notice that last argument is ARRAY_A, so we will retrieve array
		
		$this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);
		
		 

        // [REQUIRED] configure pagination
        $this->set_pagination_args(array(
            'total_items' => $total_items, // total items defined above
            'per_page' => $per_page, // per page constant defined at top of method
            'total_pages' => ceil($total_items / $per_page) // calculate pages count
        ));
    }
}