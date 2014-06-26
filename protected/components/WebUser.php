<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class WebUser extends CWebUser
{

        private $_model = null;
        private $_isAdmin = null;
        private $_isModerator = null;
        private $_isUser = null;

        public function getRole()
        {
                if ($user = $this->getModel()) {
                        return $user->role;
                }
        }


        private function getModel()
        {
                if (!$this->isGuest && $this->_model === null) {
                        $this->_model = User::model()->findByPk($this->id); //, array('select' => 'role'));
                }
                return $this->_model;
        }

        public function isAdmin()
        {
                $this->getModel();
                return ($this->_model !== null && $this->_model->roleId == User::ADMIN);
        }

        public function isModerator()
        {
                $this->getModel();
                return ($this->_model !== null && $this->_model->roleId == User::MODERATOR);
        }

        public function isUser()
        {
                $this->getModel();
                return ($this->_model !== null && $this->_model->roleId == User::USER);
        }

        public function UserName() {
                
                $this->getModel();

                if ($this->_model !== null && $this->_model->username != "") {
                        return $this->_model->username;
                } 
                if ($this->_model !== null && $this->_model->username == "") {
                        return $this->_model->email;
                }
        }
        
        public function UserInfo() {
                $this->getModel();
                if ($this->_model !== null) 
                        return $this->_model;
        }

}

?>