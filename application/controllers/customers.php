<?php
require_once("person_controller.php");

class Customers extends Person_controller
{
    function __construct()
    {
        parent::__construct('customers');

        header('Content-Type: application/json');
    }

    function index()
    {
        $data['title'] = $this->lang->line('module_' . strtolower(get_class()));

        $data['scripts'] = [base_url("js/search.js")];

        $config['base_url'] = site_url('/customers/index');
        $config['total_rows'] = $this->Customer->count_all();
        $config['per_page'] = '20';
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);

        $data['form_width'] = $this->get_form_width();
        //$data['manage_table']=get_people_manage_table( $this->Customer->get_all( $config['per_page'], $this->uri->segment( $config['uri_segment'] ) ), $this );

        $orderby = $this->uri->segment(4);
        $order = $this->uri->segment(5);

        $customers = $this->Customer->get_all(
            $config['per_page'],
            $this->uri->segment($config['uri_segment']),
            $orderby,
            $order
        )->result();

        $data['customer_data'] = $customers;

        $this->render('people/people', $data);
    }

    function get_all()
    {
        $data['title'] = $this->lang->line('module_' . strtolower(get_class()));

        $column = [
            "sort",
            "last_name",
            "first_name",
            "email",
            "phone_number",
            "action"
        ];

        $searchValue = $this->input->post('search')['value'];

        $orderby = $this->input->post('order')[0]['column'];

        if ($this->input->post('columns')[$orderby]['orderable'] == 'true') {
            $orderby = $column[$orderby];
        } else {
            $orderby = 'last_name';
        }

        $customers = $this->Customer->get_all(
            $this->input->post('length'),
            $this->input->post('start'),
            $orderby,
            $this->input->post('order')[0]['dir'],
            $searchValue
        )->result();

        $result = array();

        foreach ($customers as $customer) {
            $row = array();

            $row[] = '<input type="checkbox" id="person_' . $customer->person_id . '" value="' . $customer->person_id . '"/>';
            $row[] = $customer->last_name;
            $row[] = $customer->first_name;
            $row[] = $customer->email;
            $row[] = $customer->phone_number;

            // WARNING: No HTML in controller
            $row[] = '<div class="btn-group"><a class="btn btn-xs btn-default" href="' . base_url('customers/view/' . $customer->person_id)
                . '" data-toggle="modal" data-target="#modal-container" ><i class="fa fa-edit"></i></a> '
                . '<a class="btn btn-xs btn-default btn-delete" href="' . base_url('customers/delete/' . $customer->person_id)
                . '"><i class="fa fa-trash"></i></a></div>';

            $result[] = $row;
        }

        $json_data = array(
            "draw" => intval($_REQUEST['draw']),
            "recordsTotal" => intval($this->Customer->count_all()),
            "recordsFiltered" => intval($searchValue ? count($result) : $this->Customer->count_all()),
            "data" => $result
        );

        header('Content-Type: application/json');
        echo json_encode($json_data);
    }

    /*
    Returns customer table data rows. This will be called with AJAX.
    */
    function search()
    {
        $search = $this->input->post('search');
        //$data_rows=get_people_manage_table_data_rows($this->Customer->search($search),$this);
        $data = $this->Customer->search($search)->result();

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /*
    Gives search suggestions based on what is being searched for
    */
    function suggest()
    {
        $suggestions = $this->Customer->get_search_suggestions($this->input->post('q'), $this->input->post('limit'));
        echo implode("\n", $suggestions);
    }

    /*
    Loads the customer edit form
    */
    function view($customer_id = -1)
    {
        $data['person_info'] = $this->Customer->get_info($customer_id);
        $this->load->view("customers/form", $data);
    }

    /*
    Inserts/updates a customer
    */
    function save($customer_id = -1)
    {
        header('Content-Type: application/json');

        $person_data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'email' => $this->input->post('email'),
            'phone_number' => $this->input->post('phone_number'),
            'address_1' => $this->input->post('address_1'),
            'address_2' => $this->input->post('address_2'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'zip' => $this->input->post('zip'),
            'country' => $this->input->post('country'),
            'comments' => $this->input->post('comments')
        );

        $customer_data = array(
            'account_number' => $this->input->post('account_number') == '' ? null : $this->input->post('account_number'),
            'taxable' => $this->input->post('taxable') == '' ? 0 : 1,
        );

        if ($this->Customer->save($person_data, $customer_id, $customer_data)) {

            // new customers
            if ($customer_id == -1) {
                echo json_encode(array('success' => true,
                    'message' => $this->lang->line('customers_successful_adding') . ' ' . $person_data['first_name'] . ' ' . $person_data['last_name'],
                    'person_id' => $customer_data['person_id']));
            } else //update customer
            {
                echo json_encode(array('success' => true,
                    'message' => $this->lang->line('customers_successful_updating') . ' ' . $person_data['first_name'] . ' ' . $person_data['last_name'],
                    'person_id' => $customer_id));
            }
        } else {
            echo json_encode(array('success' => false,
                'message' => $this->lang->line('customers_error_adding_updating') . ' ' .
                    $person_data['first_name'] . ' ' . $person_data['last_name'], 'person_id' => -1));
        }
    }

    /*
    This deletes customers from the customers table
    */
    function delete($id = null)
    {
        if (!$id) {
            $customers_to_delete = $this->input->post('ids');
            $result = $this->Customer->delete_list($customers_to_delete);

            if ($result) {
                echo json_encode(array('success' => true,
                    'message' => $this->lang->line('customers_successful_deleted') . ' ' .
                        count($customers_to_delete) . ' ' . $this->lang->line('customers_one_or_multiple')));
            } else {
                echo json_encode(array('success' => false,
                    'message' => $this->lang->line('customers_cannot_be_deleted')));
            }
        } else {
            $customers_to_delete = [$id];
            $result = $this->Customer->delete($id);

            if ($result) {
                echo json_encode(array('success' => true,
                    'message' => $this->lang->line('customers_successful_deleted') . ' ' .
                        count($customers_to_delete) . ' ' . $this->lang->line('customers_one_or_multiple')));
            } else {
                echo json_encode(array('success' => false,
                    'message' => 'Cannot delete customer ' . $id));
            }
        }


    }

    function excel()
    {
        $data = file_get_contents("import_customers.csv");
        $name = 'import_customers.csv';
        force_download($name, $data);
    }

    function excel_import()
    {
        $this->load->view("customers/excel_import", null);
    }

    function do_excel_import()
    {
        $msg = 'do_excel_import';
        $failCodes = array();

        if ($_FILES['file_path']['error'] != UPLOAD_ERR_OK) {
            $msg = $this->lang->line('items_excel_import_failed');

            echo json_encode(array('success' => false,
                'message' => $msg));

            return;

        } else {
            if (($handle = fopen($_FILES['file_path']['tmp_name'], "r")) !== FALSE) {
                //Skip first row
                fgetcsv($handle);

                $i = 1;
                while (($data = fgetcsv($handle)) !== FALSE) {
                    $person_data = array(
                        'first_name' => $data[0],
                        'last_name' => $data[1],
                        'email' => $data[2],
                        'phone_number' => $data[3],
                        'address_1' => $data[4],
                        'address_2' => $data[5],
                        'city' => $data[6],
                        'state' => $data[7],
                        'zip' => $data[8],
                        'country' => $data[9],
                        'comments' => $data[10]
                    );

                    $customer_data = array(
                        'account_number' => $data[11] == '' ? null : $data[11],
                        'taxable' => $data[12] == '' ? 0 : 1,
                    );

                    if (!$this->Customer->save($person_data, $customer_data)) {
                        $failCodes[] = $i;
                    }

                    $i++;
                }
            } else {
                echo json_encode(
                    array('success' => false,
                        'message' => 'Your upload file has no data or not in supported format.'));
                return;
            }
        }

        $success = true;

        if (count($failCodes) > 1) {
            $msg = "Most customers imported. But some were not, here is list of their CODE (" . count($failCodes) . "): " . implode(", ", $failCodes);
            $success = false;
        } else {
            $msg = "Import Customers successful";
        }

        header('Content-Type: application/json');
        echo json_encode(array('success' => $success, 'message' => $msg));
    }

    /*
    get the width for the add/edit form
    */
    function get_form_width()
    {
        return 350;
    }
}

?>