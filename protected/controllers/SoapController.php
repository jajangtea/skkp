
<?php 
Yii::import('components.UserIdentity');
class SoapController extends Controller
{
    /** 
     * @param string the username
     * @param string the password
     * @return string a sessionkey
     * @soap
     */
    public function login($name, $password)
    {   
        $identity = new UserIdentity($name, $password);
        $identity->authenticate();
        if ($identity->errorCode == UserIdentity::ERROR_NONE)
			Yii::app()->user->login($identity, 3600);
		else
			throw new SoapFault("login", "Problem with login");
        $sessionKey = sha1(mt_rand());
        Yii::app()->cache->set('soap_sessionkey'.$sessionKey.Yii::app()->user->id, $name.':'.$password, 1800);
        return $sessionKey;
    }

	/**
	 * authenticates a user via the sessionid
	 * throws an exception on error
	 */
    protected function authenticateBySession($sessionKey)
    {  
        $data = Yii::app()->cache->get('soap_sessionkey'.$sessionKey.Yii::app()->user->id);
		list($name, $password) = explode(':', $data);
        if ($name)
        {  
            $identity = new UserIdentity($name, $password);
            $identity->authenticate();
            if ($identity->errorCode == UserIdentity::ERROR_NONE)
                Yii::app()->user->login($identity, 3600);
        }
        // happens when session is invalid or login not possible (deleted, deactivated)
        if (!Yii::app()->user->id)
            throw new SoapFault('authentication', 'Your session is invalid');
    }

    /** 
     * @param string the session key
     * @param int random stuff
     * @return int current user id
     * @soap
     */
    public function furtherMethod($session, $bla)
	{
		$this->authenticateBySession($session);
		return Yii::app()->user->id;
	}
}