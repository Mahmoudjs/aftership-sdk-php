<?php

namespace AfterShip;

use AfterShip\Core\Request;

/**
 * @property string _api_key
 */
class Trackings extends Request
{

    /**
     * The Trackings constructor.
     *
     * @param string $api_key The AfterShip API Key.
     *
     * @throws \AfterShip\Exception
     */
    public function __construct($api_key = '')
    {
        if (empty($api_key)) {
            throw new Exception('API Key is missing');
        }

        $this->_api_key = $api_key;

        parent::__construct();
    }

    /**
     * Create a tracking.
     * https://www.aftership.com/docs/api/4/trackings/post-trackings
     * @param string $tracking_number The tracking number which is provider by tracking provider
     * @param array $params The optional parameters
     * @return array Response Body
     * @throws \AfterShip\Exception
     */
    public function create($tracking_number, array $params = array())
    {
        if (empty($tracking_number)) {
            throw new Exception('Tracking number cannot be empty');
        }

        $params['tracking_number'] = $tracking_number;
        return $this->send('trackings', 'POST', array('tracking' => $params));
    }

    /**
     * Create multiple trackings.
     * (Will be available soon)
     * @return null
     * @throws Exception
     * @internal param array $tracking_numbers The set of tracking number which is provider by tracking provider
     */
    public function createMultiple()
    {
        throw new Exception('Sorry! It will be available soon.');
    }

    /**
     * Delete a tracking number by slug and tracking number.
     * https://www.aftership.com/docs/api/4/trackings/delete-trackings
     * @param string $slug The slug of the tracking provider
     * @param string $tracking_number The tracking number which is provider by tracking provider
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function delete($slug, $tracking_number)
    {
        if (empty($slug)) {
            throw new Exception('Slug cannot be empty');
        }

        if (empty($tracking_number)) {
            throw new Exception('Tracking number cannot be empty');
        }

        return $this->send('trackings/' . $slug . '/' . $tracking_number, 'DELETE');
    }

    /**
     * Delete a tracking number by tracking ID.
     * https://www.aftership.com/docs/api/4/trackings/delete-trackings
     * @param string $id The tracking ID which is provided by AfterShip
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function deleteById($id)
    {
        if (empty($id)) {
            throw new Exception('Tracking ID cannot be empty');
        }

        return $this->send('trackings/' . $id, 'DELETE');
    }

    /**
     * Get tracking results of multiple trackings.
     * https://www.aftership.com/docs/api/4/trackings/get-trackings
     * @param array $params The optional parameters
     * @return array Response body
     */
    public function all(array $params = array())
    {
        return $this->send('trackings', 'GET', $params);
    }

    /**
     * Get tracking results of a single tracking by slug and tracking number.
     * https://www.aftership.com/docs/api/4/trackings/get-trackings-slug-tracking_number
     * @param string $slug The slug of the tracking provider
     * @param string $tracking_number The tracking number which is provider by tracking provider
     * @param array $params The optional parameters
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function get($slug, $tracking_number, array $params = array())
    {
        if (empty($slug)) {
            throw new Exception('Slug cannot be empty');
        }

        if (empty($tracking_number)) {
            throw new Exception('Tracking number cannot be empty');
        }

        return $this->send('trackings/' . $slug . '/' . $tracking_number, 'GET', $params);
    }

    /**
     * Get tracking results of a single tracking by tracking ID.
     * https://www.aftership.com/docs/api/4/trackings/get-trackings-slug-tracking_number
     * @param string $id The tracking ID which is provided by AfterShip
     * @param array $params The optional parameters
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function getById($id, array $params = array())
    {
        if (empty($id)) {
            throw new Exception('Tracking ID cannot be empty');
        }

        return $this->send('trackings/' . $id, 'GET', $params);
    }

    /**
     * Update a tracking by slug and tracking number.
     * https://www.aftership.com/docs/api/4/trackings/put-trackings-slug-tracking_number
     * @param string $slug The slug of the tracking provider
     * @param string $tracking_number The tracking number which is provider by tracking provider
     * @param array $params The optional parameters
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function update($slug, $tracking_number, array $params = array())
    {
        if (empty($slug)) {
            throw new Exception("Slug cannot be empty");
        }

        if (empty($tracking_number)) {
            throw new Exception('Tracking number cannot be empty');
        }

        return $this->send('trackings/' . $slug . '/' . $tracking_number, 'PUT', array('tracking' => $params));
    }

    /**
     * Update a tracking by tracking ID.
     * https://www.aftership.com/docs/api/4/trackings/put-trackings-slug-tracking_number
     * @param string $id The tracking ID which is provided by AfterShip
     * @param array $params The optional parameters
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function updateById($id, array $params = array())
    {
        if (empty($id)) {
            throw new Exception('Tracking ID cannot be empty');
        }

        return $this->send('trackings/' . $id, 'PUT', array('tracking' => $params));
    }

    /**
     * Retrack an expired tracking once by slug and tracking number.
     * https://www.aftership.com/docs/api/4/trackings/post-trackings-slug-tracking_number-retrack
     * @param string $slug The slug of tracking provider
     * @param string $tracking_number The tracking number which is provider by tracking provider
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function retrack($slug, $tracking_number)
    {
        if (empty($slug)) {
            throw new Exception("Slug cannot be empty");
        }

        if (empty($tracking_number)) {
            throw new Exception('Tracking number cannot be empty');
        }

        return $this->send('trackings/' . $slug . '/' . $tracking_number . '/retrack', 'POST');
    }

    /**
     * Retrack an expired tracking once by tracking ID.
     * https://www.aftership.com/docs/api/4/trackings/post-trackings-slug-tracking_number-retrack
     * @param string $id The tracking ID which is provided by AfterShip
     * @return array Response body
     * @throws \AfterShip\Exception
     */
    public function retrackById($id)
    {
        if (empty($id)) {
            throw new Exception('Tracking ID cannot be empty');
        }

        return $this->send('trackings/' . $id . '/retrack', 'POST');
    }
}
