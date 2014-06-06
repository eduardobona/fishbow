<?php
class Application_Model_Row_User extends Application_Model_Row_ObjectBase
{
	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getUsername()
	{
		return $this->username;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
	}
	
	public function getPassword() 
	{
		return $this->password;
	}
	
	public function setPassword($password)
	{
	    $this->password = sha1($password);
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
        $this->email = $email;
 	}
	
	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getRule() 
	{
		return $this->rule;
	}

	public function setRule($rule) 
	{
		$this->rule = $rule;
	}
	
	public function getRuleFormatted() 
	{
		switch($this->rule) {
			case 1: return 'Administrador'; break;
			case 2: return 'Usuário'; break;
			default: return 'Desconhecido';
		}
	}

	public function getStatus() 
	{
	    return $this->status;
	}

	public function setStatus($status) 
	{
		$this->status = $status;
	}

	public function getStatusFormatted() 
	{
		switch($this->status) {
			case 0: return 'Ativo'; break;
			case 1: return 'Inativo'; break;
			default: return 'Desconhecido';
		}
	}
	
	public function getCreated() 
	{
	    return $this->created;
	}

	public function setCreated() 
	{
	    $datetime = new \DateTime();
		$this->created = $datetime->format('Y-m-d H:i:s');
	}

	public function getCreatedFormatted() 
	{
	    $created = new \DateTime($this->created);
	    return $created->format('Y/m/d H:i:s');
	}

	public function getUpdated() 
	{
	    return $this->updated;
	}

	public function setUpdated() 
	{
	    $datetime = new \DateTime();
		$this->updated = $datetime->format('Y-m-d H:i:s');
	}

	public function getUpdatedFormatted() 
	{
	    $updated = new \DateTime($this->updated);
	    return $updated->format('Y/m/d H:i:s');
	}
	
	public function save()
	{
		return parent::save();
	}
	
	public function delete()
	{
	    return parent::delete();
	}
}