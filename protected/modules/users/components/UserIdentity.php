<?php

class UserIdentity extends CUserIdentity {

    private $_id;
    private $_model;

    public function authenticate() {
        $user = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));
        $this->_model = $user;
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if (!$user->validatePassword($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->id;
            $this->username = $user->email;
            $this->errorCode = self::ERROR_NONE;
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->_id;
    }

    public function getModel() {
        return $this->_model;
    }

    public function getEmail() {
        return $this->_model->email;
    }

}