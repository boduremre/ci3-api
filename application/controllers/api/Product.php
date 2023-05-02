<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    require APPPATH . 'libraries/RestController.php';
    require APPPATH . 'libraries/Format.php';

    use chriskacerguis\RestServer\RestController;

class Product extends RestController
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
    public function indexProduct_get($id = 0)
    {
        if (!empty($id)) {
            $data = $this->db->get_where("products", ['productCode' => $id])->row_array();
        } else {
            $data = $this->db->get("products")->result();
        }

        $this->response($data, 200);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function storeProduct_post()
    {	
		$input = $this->input->post();
		
        $result = $this->db->insert('products', $input);
		$this->response(['Product created successfully.'], 200);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function updateProduct_put($id)

    {
        $input = $this->put();
        $this->db->update('products', $input, array('productCode' => $id));

        $this->response(['Product updated successfully.'], 200);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function deleteProduct_delete($id)

    {
        $this->db->delete('products', array('productCode' => $id));
        $this->response(['Product deleted successfully.'], 200);
    }
}