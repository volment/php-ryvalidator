<?php

namespace Vol2223\PyaValidator\Context;

use Vol2223\PyaValidator\ContractParser;

class ContractContext
{
	/**
	 * @var string
	 */
	private $baseRequestName;

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $methodType;

	/**
	 * @var string
	 */
	private $requestType;

	/**
	 * @var []
	 */
	private $responses;

	/**
	 * @param string $baseRequestName
	 * @param string $action
	 * @param string $methodType
	 * @param string $requestType
	 * @param [] $responses
	 */
	public function __construct($baseRequestName, $action, $methodType, $requestType, Array $requests)
	{
		$this->baseRequestName = $baseRequestName;
		$this->action = $action;
		$this->methodType = $methodType;
		$this->requestType = $requestType;
		$this->requests = $requests;
	}

	/**
	 * get file Path
	 *
	 * @return string
	 */
	public function filePath()
	{
		return ContractParser::VALIDATIONS_DIRECTORY
			. '/'
			. $this->baseRequestName
			. '/'
			. $this->action
			. '/'
			. $this->methodType
			. '/'
			. $this->requestType
			. '.php';
	}

	/**
	 * get file
	 *
	 * @return string
	 */
	public function body()
	{
		$body = <<<PHP
<?php

return 
PHP
;
		$body .= var_export($this->requests, true) . ';';
		return $body;
	}
}
