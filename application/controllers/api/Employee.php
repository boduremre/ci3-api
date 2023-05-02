<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';
    require APPPATH . 'libraries/Format.php';

    use chriskacerguis\RestServer\RestController;

    class Employee extends RestController
    {
        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function indexEmployee_get($id = 0)
        {
            if (!empty($id)) {
                $data = $this->db->select('employees.*, offices.city as office')
                    ->join('offices', 'offices.officeCode = employees.officeCode')
                    ->get_where("employees", ['employeeNumber' => $id])
                    ->row_array();
            } else {
                $data = $this->db->select('employees.*, offices.city as office')
                    ->join('offices', 'offices.officeCode = employees.officeCode')
                    ->get("employees")
                    ->result();
            }

            $this->response($data, 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function storeEmployee_post()
        {
            $input = $this->input->post();

            $result = $this->db->insert('employees', $input);
            $this->response(['Employee created successfully.'], 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function updateEmployee_put($id)

        {
            $input = $this->put();
            $this->db->update('employees', $input, array('EmployeeCode' => $id));

            $this->response(['Employee updated successfully.'], 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function deleteEmployee_delete($id)

        {
            $this->db->delete('employees', array('employeeNumber' => $id));
            $this->response(['Employee deleted successfully.'], 200);
        }
    }