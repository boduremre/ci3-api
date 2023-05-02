<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    //require_once APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/RestController.php';
    require APPPATH . 'libraries/Format.php';

    use chriskacerguis\RestServer\RestController;

    class Item extends RestController
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
        public function indexItem_get($id = 0)
        {
            if (!empty($id)) {
                $data = $this->db->get_where("items", ['id' => $id])->row_array();
            } else {
                $data = $this->db->get("items")->result();
            }

            $this->response($data, 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function storeItem_post()
        {
            $input = $this->input->post();

            $result = $this->db->insert('items', $input);
            $this->response(['Item created successfully.'], 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function updateItem_put($id)
        {
            $input = $this->put();
            $this->db->update('items', $input, array('id' => $id));

            $this->response(['Item updated successfully.'], 200);
        }

        /**
         * Get All Data from this method.
         *
         * @return Response
         */
        public function deleteItem_delete($id)
        {
            $this->db->delete('items', array('id' => $id));
            $this->response(['Item deleted successfully.'], 200);
        }
    }