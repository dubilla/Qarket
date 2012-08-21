<?php
App::uses('HttpSocket', 'Network/Http');
App::uses('BCrypt', 'Model');

class Qarket extends DataSource {
/**
 * An optional description of your datasource
 */
    public $description = 'Qarket API';

/**
 * Our default config options. These options will be customized in our
 * ``app/Config/database.php`` and will be merged in the ``__construct()``.
 */
    public $config = array(
        'apiKey' => '',
		'url' => 'http://qarket.com:6590/v0/'
    );

/**
 * If we want to create() or update() we need to specify the fields
 * available. We use the same array keys as we do with CakeSchema, eg.
 * fixtures and schema migrations.
 */
    protected $_schema = array(
        'id' => array(
            'type' => 'integer',
            'null' => false,
            'key' => 'primary',
            'length' => 11,
        ),
        'name' => array(
            'type' => 'string',
            'null' => true,
            'length' => 255,
        ),
        'message' => array(
            'type' => 'text',
            'null' => true,
        ),
    );

/**
 * Create our HttpSocket and handle any config tweaks.
 */
    public function __construct($config) {
        parent::__construct($config);
        $this->Http = new HttpSocket();
    }

/**
 * Since datasources normally connect to a database there are a few things
 * we must change to get them to work without a database.
 */

/**
 * listSources() is for caching. You'll likely want to implement caching in
 * your own way with a custom datasource. So just ``return null``.
 */
    public function listSources() {
        return null;
    }

/**
 * describe() tells the model your schema for ``Model::save()``.
 *
 * You may want a different schema for each model but still use a single
 * datasource. If this is your case then set a ``schema`` property on your
 * models and simply return ``$Model->schema`` here instead.
 */
    public function describe(Model $Model) {
		return $Model->schema;
    }

/**
 * calculate() is for determining how we will count the records and is
 * required to get ``update()`` and ``delete()`` to work.
 *
 * We don't count the records here but return a string to be passed to
 * ``read()`` which will do the actual counting. The easiest way is to just
 * return the string 'COUNT' and check for it in ``read()`` where
 * ``$data['fields'] == 'COUNT'``.
 */
    public function calculate(Model $Model, $func, $params = array()) {
        return 'COUNT';
    }

/**
 * Implement the R in CRUD. Calls to ``Model::find()`` arrive here.
 */
    public function read(Model $Model, $data = array()) {
        /**
         * Here we do the actual count as instructed by our calculate()
         * method above. We could either check the remote source or some
         * other way to get the record count. Here we'll simply return 1 so
         * ``update()`` and ``delete()`` will assume the record exists.
         */
        if ($data['fields'] == 'COUNT') {
            return array(array(array('count' => 1)));
        }
        /**
         * Now we get, decode and return the remote data.
         */
        $data['conditions']['apiKey'] = $this->config['apiKey'];
		// Switch each model name
		switch($Model->name) {
			case "User":
				// Login
				// Password encryption
				$password = $data["password"];
			    $salt = sha1(md5($password));
				$hash = hash('sha256',$salt.$password);
				// The hash is what we want here
				$param = array('p' => $hash);
				$json = $this->Http->get($this->config["url"] . 'users/' . $data['username'], $data);
				break;
			case "Company":
				// Login
				break;
			case "CompanyOffer":
				$json = $this->Http->get($this->config["url"] . 'offers/' . $data['companyID'], $data);
				break;
		}

        $res = json_decode($json, true);

        if (is_null($res)) {
            $error = json_last_error();
            throw new CakeException($error);
        }
        return array($Model->alias => $res);
    }

/**
 * Implement the C in CRUD. Calls to ``Model::save()`` without $Model->id
 * set arrive here.
 */
    public function create(Model $Model, $fields = array(), $values = array()) {
        $data = array_combine($fields, $values);
        $data['apiKey'] = $this->config['apiKey'];
		// Switch each model name
		switch($Model->name) {
			case "User":
				// Register
				// Concatenate the name fields and remove the first and last name fields
				$name = $data['first_name'] . ' ' . $data['last_name'];
				$data["name"] = $name;
				unset($data["first_name"]);
				unset($data["last_name"]);
				// Password encryption
				$password = $data["password"];
			    $salt = sha1(md5($password));
				$hash = hash('sha256',$salt.$password);
				// The hash is what we want here
				$data["password"] = $hash;
				$json = $this->Http->post($this->config["url"] . 'users/' . $data['userName'] , $data);
				break;
			case "Company":
				// Register
				$json = $this->Http->post($this->config["url"] . 'companies/' . $data['username'] , $data);
				break;
		}

        $res = json_decode($json, true);
		$responseCode = $res["responseHeader"]["responseCode"];

        if (is_null($res)) {
            $error = json_last_error();
            throw new CakeException($error);
        }
		
		// Not sure if this should live in the datasource of the Controller [DBU 8/1/2012]

		// Assuming responseCode for users and companies are the same
		// Success
		if ($responseCode == 0) {
			return array($Model->alias => $res);
		// Error
		} else {
			return false;
		}
    }

/**
 * Implement the U in CRUD. Calls to ``Model::save()`` with $Model->id
 * set arrive here. Depending on the remote source you can just call
 * ``$this->create()``.
 */
    public function update(Model $Model, $fields = array(), $values = array()) {
        return $this->create($Model, $fields, $values);
    }

/**
 * Implement the D in CRUD. Calls to ``Model::delete()`` arrive here.
 */
    public function delete(Model $Model, $conditions = null) {
        $id = $conditions[$Model->alias . '.id'];
        $json = $this->Http->get('http://example.com/api/remove.json', array(
            'id' => $id,
            'apiKey' => $this->config['apiKey'],
        ));
        $res = json_decode($json, true);
        if (is_null($res)) {
            $error = json_last_error();
            throw new CakeException($error);
        }
        return true;
    }

}