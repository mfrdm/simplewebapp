<?php

class WebUser extends CWebUser
{

    public function getRole()
    {
        return $this->getState('__role');
    }
    
    public function getId()
    {
        return $this->getState('__id') ? $this->getState('__id') : 0;
    }

    protected function afterLogin($fromCookie)
	{
        parent::afterLogin($fromCookie);
        $this->updateSession();
	}

    public function updateSession() {
        $user = User::userData($this->id);
        $userAttributes = array(
            'email'=>$user->email,
            'username'=>$user->username,
            'create_at'=>$user->create_at,
            'lastvisit_at'=>$user->lastvisit_at,
        );
        foreach ($userAttributes as $attrName=>$attrValue) {
            $this->setState($attrName,$attrValue);
        }
    }

    public function model($id=0) {
        return User::userData($id);
    }

    public function user($id=0) {
        return $this->model($id);
    }

    public function getUserByName($username) {
        return User::getUserByName($username);
    }

    public function getAdmins() {
        return User::getAdmins();
    }

    public function isAdmin() {
        return User::isAdmin();
    }

}