<?php 



use Illuminate\Database\Eloquent\Model as Eloquent;



class articles extends Eloquent {



	protected $nom = ['nom'];
	protected $type = ['type'];
	protected $couleur = ['couleur'];
	protected $marque = ['marque'];



	public $timestamps = false;



}