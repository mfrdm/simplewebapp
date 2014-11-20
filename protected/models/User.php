<?php

/**
 * User class file.
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table 'user':
 * @var integer $id
 * @var string $username
 * @var string $password
 * @var string $email
 * @var string $activkey
 * @var integer $superuser
 * @var integer $status
 * @var timestamp $create_at
 * @var timestamp $lastvisit_at 
 *
 * @author farid <farid.muh19@yahoo.com>
 * @since: 2014-11-19 
 */

class User extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANNED=-1;
	
	

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username', 'length', 'max'=>30, 'min' => 6,'message' => "Please use between 6 and 30 characters."),
			array('password', 'length', 'max'=>128, 'min' => 6,'message' => "Short passwords are easy to guess. Try one with at least 6 characters."),
			array('email', 'email'),
			array('username', 'unique', 'message' => "Someone already has that username. Try another?"),
			array('email', 'unique', 'message' => "This user's email address already exists."),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => "Incorrect characters (A-z0-9_)."),
			array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANNED)),
			array('superuser', 'in', 'range'=>array(0,1)),
            array('create_at', 'default', 'value' => date('Y-m-d H:i:s'), 'setOnEmpty' => true, 'on' => 'insert'),
            array('lastvisit_at', 'default', 'value' => '0000-00-00 00:00:00', 'setOnEmpty' => true, 'on' => 'insert'),
			array('username, email, superuser, status', 'required'),
			array('superuser, status', 'numerical', 'integerOnly'=>true),
			array('id, username, password, email, activkey, create_at, lastvisit_at, superuser, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => "Id",
			'username'=>'Username',
			'password'=>'Password',
			'verifyPassword'=>'Confirm a password',
			'email'=>'Email',
			'verifyCode'=>'Verification code',
			'activkey' => 'Activation key',
			'create_at' => 'Registration date',			
			'lastvisit_at' => 'Last visit',
			'superuser' => 'Admin',
			'status' => 'Status',
		);
	}
	
	/**
	 * @return array customized scope
	 */	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactive'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANNED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
            'notsafe'=>array(
            	'select' => 'id, username, password, email, activkey, create_at, lastvisit_at, superuser, status',
            ),
        );
    }
	
	/**
	 * @return array default scope
	 */		
	public function defaultScope()
    {
        return array(
            'alias'=>'user',
            'select' => 'user.id, user.username, user.email, user.create_at, user.lastvisit_at, user.superuser, user.status',
        );
    }
	
	/**
	 * @return array item alias code
	 */		
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => 'Not active',
				self::STATUS_ACTIVE => 'Active',
				self::STATUS_BANNED => 'Banned',
			),
			'AdminStatus' => array(
				'0' => 'No',
				'1' => 'Yes',
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */

    public function search()
    {
		// @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;
        
        $criteria->compare('id',$this->id);
        $criteria->compare('username',$this->username,true);
        $criteria->compare('password',$this->password);
        $criteria->compare('email',$this->email,true);
        $criteria->compare('activkey',$this->activkey);
        $criteria->compare('create_at',$this->create_at);
        $criteria->compare('lastvisit_at',$this->lastvisit_at);
        $criteria->compare('superuser',$this->superuser);
        $criteria->compare('status',$this->status);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
        ));
    }

    public function getCreatetime() {
        return strtotime($this->create_at);
    }

    public function setCreatetime($value) {
        $this->create_at=date('Y-m-d H:i:s',$value);
    }

    public function getLastvisit() {
        return strtotime($this->lastvisit_at);
    }

    public function setLastvisit($value) {
        $this->lastvisit_at=date('Y-m-d H:i:s',$value);
    }

	static private $_user;
	static private $_users=array();
	static private $_userByName=array();
	static private $_admin;
	static private $_admins;

	/**
	 * Return safe user data.
	 * @param user id not required
	 * @return user object or false
	 */
	public static function userData($id=0,$clearCache=false) {
        if (!$id&&!Yii::app()->user->isGuest)
            $id = Yii::app()->user->id;
		if ($id) {
            if (!isset(self::$_users[$id])||$clearCache)
                self::$_users[$id] = User::model()->findbyPk($id);
			return self::$_users[$id];
        } else return false;
	} 

	/**
	 * Return safe user data.
	 * @param user name
	 * @return user object or false
	 */
	public static function getUserByName($username) {
		if (!isset(self::$_userByName[$username])) {
			$_userByName[$username] = User::model()->findByAttributes(array('username'=>$username));
		}
		return $_userByName[$username];
	}

	/**
	 * Return admin status.
	 * @return boolean
	 */
	public static function isAdmin() {
		if(Yii::app()->user->isGuest)
			return false;
		else {
			if (!isset(self::$_admin)) {
				if(self::userData()->superuser)
					self::$_admin = true;
				else
					self::$_admin = false;	
			}
			return self::$_admin;
		}
	}

	/**
	 * Return admins.
	 * @return array syperusers names
	 */	
	public static function getAdmins() {
		if (!self::$_admins) {
			$admins = User::model()->active()->superuser()->findAll();
			$return_name = array();
			foreach ($admins as $admin)
				array_push($return_name,$admin->username);
			self::$_admins = ($return_name)?$return_name:array('');
		}
		return self::$_admins;
	}

	/**
	 * Send mail method
	 */
	public static function sendMail($email,$subject,$message) {
    	$adminEmail = Yii::app()->params['adminEmail'];
	    $headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
	    $message = wordwrap($message, 70);
	    $message = str_replace("\n.", "\n..", $message);
	    return mail($email,'=?UTF-8?B?'.base64_encode($subject).'?=',$message,$headers);
	}	    
}