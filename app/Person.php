<?php

namespace brisgis;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    	public $first_name;
		public $last_name;
		public $middle_name;
		public $birthdate;
		public $street_address;
		public $city;
		public $province;
		public $country;
		public $zipcode;
		public $religion;
		public $gender;
		public $mobile;
		public $phone;


		public function setFirstName($first_name) 
		{
			$this->first_name = $first_name;
		}

		public function setLastName($last_name) 
		{
			$this->last_name = $last_name;
		}

		public function setMiddleName($middle_name) 
		{
			$this->middle_name = $middle_name;
		}

		public function setStreetAddress($street_address) 
		{
			$this->street_address = $street_address;
		}

		public function setCity($city) 
		{
			$this->city = $city;
		}

		public function setProvince($province) 
		{
			$this->province = $province;
		}

		public function setCountry($country) 
		{
			$this->country = $country;
		}

		public function setZipcode($zipcode) 
		{
			$this->zipcode = $zipcode;
		}

		public function setMobile($mobile) 
		{
			$this->mobile = $mobile;
		}

		public function setPhone($phone) 
		{
			$this->phone = $phone;
		}

		public function setBirthdate($birthdate) 
		{
			$this->birhtdate = $birhtdate;
		}

		public function setReligion($religion) 
		{
			$this->religion = $religion;
		}

		public function setGender($gender) 
		{
			$this->gender = $gender;
		}

		public function getFullname() 
		{
			return $this->first_name . " " . $this->middle_name." ". $this->last_name;
		}

		public function getFirstName() 
		{
			return $this->first_name = $first_name;
		}

		public function getLastName() 
		{
			return $this->last_name = $last_name;
		}

		public function getMiddleName() 
		{
			return $this->middle_name = $middle_name;
		}

		public function getFullAddress() 
		{
			return $this->street_address. " ". $this->city.", ". $this->province." ". $this->country ." ". $this->zipcode;
		}

		public function getStreetAddress() 
		{
			return $this->street_address;
		}

		public function getCity() 
		{
			return $this->city = $city;
		}
		
		public function getProvince() 
		{
			return $this->province = $province;
		}

		public function getCountry() 
		{
			return $this->country = $country;
		}

		public function getZipcode() 
		{
			return $this->zipcode = $zipcode;
		}

		public function getMobile() 
		{
			 return $this->mobile;
		}

		public function getPhone() 
		{
			 return $this->phone;
		}

		public function getBirthdate() 
		{
			 return $this->birthdate;
		}
		
		public function getReligion() 
		{
			 return $this->religion;
		}

		public function getGender()
		{
			 return $this->gender;
		}
	}
}
