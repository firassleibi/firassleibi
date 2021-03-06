<?php
/**
 * File for PayLaneClient class
 *
 * Created on 2006-10-30
 *
 * @package		paylane-php5-client
 * @copyright	2006 PayLane Sp. z o.o.
 * @author		Marcin Synak <marcin.synak@paylane.com>
 * @version		SVN: $Id: PayLaneClient.php 9275 2007-11-13 10:35:58Z msynak $
 */

/**
 * PayLaneClient class
 *
 * Simple client for PayLane Direct Web Service
 *
 * @package		paylane-php5-client
 * @subpackage	core
 * @copyright	2006 PayLane Sp. z o.o.
 * @author		Marcin Synak <marcin.synak@paylane.com>
 * @version		SVN: $Id: PayLaneClient.php 9275 2007-11-13 10:35:58Z msynak $
 */
class PayLaneClient
{
    const PAYLANE_WSDL_URL = 'https://direct.paylane.com/wsdl/production/Direct.wsdl';
	/**
	 * Private variable holding SOAP Client object
	 *
	 * @var Object SOAP Client object
	 */
	private $soapclient = null;

	/**
	 * Private variable holding last error.
	 * Use getError() method to access this variable.
	 *
	 * @var boolean|string Error description or false if no error occured
	 */
	private $error = false;

    private $debug = false;

	/**
	 * Performs initialization of PayLane Client object.
	 * Connects to PayLane Direct Web Service.
	 *
	 * @return boolean True if initialization was successfull, false otherwise.
	 */
	public function init($login, $password, $debug = false)
	{
		$wsdl = self::PAYLANE_WSDL_URL;

        $this->debug = $debug;

		try
		{
			$this->soapclient = new SoapClient($wsdl, array("login" => $login, "password" => $password));
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return true;
	}

	/**
	 * Performs sale
	 *
	 * @param array Sale params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
    public function multiSale($params)
    {
        if (is_null($this->soapclient))
        {
            $this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
            return false;
        }

        try
        {
            $result = $this->soapclient->multiSale($params);
        }
        catch (SoapFault $SoapFault)
        {
            $this->handleFault($SoapFault);
            return false;
        }

        return $result;
    }


    public function paypalSale($params)
    {
        if (is_null($this->soapclient))
        {
            $this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
            return false;
        }

        try
        {
            $result = $this->soapclient->paypalSale($params);
        }
        catch (SoapFault $SoapFault)
        {
            $this->handleFault($SoapFault);
            return false;
        }

        return $result;
    }

    public function paypalGetSaleId($params)
    {
        if (is_null($this->soapclient))
        {
            $this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
            return false;
        }

        try
        {
            $result = $this->soapclient->paypalGetSaleId($params);
        }
        catch (SoapFault $SoapFault)
        {
            $this->handleFault($SoapFault);
            return false;
        }

        return $result;
    }

	/**
	 * Performs refund
	 *
	 * @param array Refund params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function refund($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->refund($params['id_sale'], $params['amount'], $params['reason']);
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Performs resale
	 *
	 * @param array Resale params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function resale($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->resale($params['id_sale'], $params['amount'], $params['currency'], $params['description']);
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Performs sale capture
	 *
	 * @param array Sale capture params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function captureSale($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->captureSale($params['id_sale_authorization'], $params['amount'], $params['description']);
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Performs sale authorization closing
	 *
	 * @param array Sale authorization closing params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function closeSaleAuthorization($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->closeSaleAuthorization($params['id_sale_authorization']);
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Checks if card participates in 3D Secure
	 *
	 * @param array 3D Secure check params. See "PayLane Direct System description" document for details.
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function checkCard3DSecureEnrollment($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->checkCard3DSecureEnrollment($params);
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Checks status of multiple sales
	 *
	 * @param array params Array containing Sale IDs
	 * @return Object|boolean Response object from PayLane Direct or false on error.
	 */
	public function checkSales($params)
	{
		if (is_null($this->soapclient))
		{
			$this->error = "PayLaneClient object not initialized. Invoke 'init()' before any other methods.";
			return false;
		}

		try
		{
			$result = $this->soapclient->checkSales(array("id_sale_list" => $params));
		}
		catch (SoapFault $SoapFault)
		{
			$this->handleFault($SoapFault);
			return false;
		}

		return $result;
	}

	/**
	 * Returns description of last error which occured
	 *
	 * @return string|boolean Error description or false of no error occured.
	 */
	public function getLastError()
	{
		return $this->error;
	}

	/**
	 * Private method for handling SOAP Faults
	 *
	 * @param Object fault SOAP Fault returned by PHP5 SOAP client
	 */
	private function handleFault($fault)
	{
		$error_string = "SOAPFault: " . $fault->faultcode . " - " . $fault->faultstring;

		if (true == $this->debug)
		{
			var_dump($fault);
		}

		$this->error = $error_string;
	}

}

?>
