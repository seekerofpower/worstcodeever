<?php
class ProductData {
	public static $tablename = "product";
	public static $anioActual;

	public function ProductData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->category_id2 = "";
		$this->category_id3 = "";
		$this->category_id4 = "";
		$this->category_id5 = "";
		$this->category_id6 = "";
		$this->category_id7 = "";
		$this->category_id8 = "";
		$this->category_id9 = "";
		$this->is_public = "0";
		$this->order_at = "NOW()";
		self::$anioActual= date("Y");
		
	}

	public function getUnit(){ return UnitData::getById($this->unit_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (short_name,code,name,oficio,description,image,price,link,category_id, category_id2, category_id3, category_id4, category_id5, category_id6, category_id7, category_id8, category_id9, unit_id, unit_id2, unit_id3, is_public,in_existence,is_featured,created_at,fechaOficio, fechaElaborado, m, f, ninio, noAplica, delito, oTipo, usuario) ";
		$sql .= "value ('".$this->short_name."','".$this->code."','".utf8_decode($this->name)."', '".$this->oficio."','".utf8_decode($this->description)."','".$this->image."','".utf8_decode($this->price)."','".$this->link."',$this->category_id, $this->category_id2, $this->category_id3, $this->category_id4, $this->category_id5, $this->category_id6, $this->category_id7, $this->category_id8, $this->category_id9, $this->unit_id, $this->unit_id2, $this->unit_id3, $this->is_public,$this->in_existence,$this->is_featured,'".$this->created_at."', '".$this->fechaOficio."', '".$this->fechaElaborado."', $this->m, $this->f, $this->ninio, $this->noAplica, '".utf8_decode($this->delito)."','".utf8_decode($this->oTipo)."', $this->usuario)";
		//echo json_encode($sql);
		Executor::doit($sql);
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update2(){
		$sql = "update ".self::$tablename." set in_existence=\"$this->in_existence\", seguimiento='".utf8_decode($this->seguimiento)."', order_at=$this->order_at, atendido1=\"$this->atendido1\", atendido2=\"$this->atendido2\", atendido3=\"$this->atendido3\", atendido4=\"$this->atendido4\", atendido5=\"$this->atendido5\", atendido6=\"$this->atendido6\", atendido7=\"$this->atendido7\", atendido8=\"$this->atendido8\", atendido9=\"$this->atendido9\", solucion1='".utf8_decode($this->solucion1)."', solucion2='".utf8_decode($this->solucion2)."', solucion3='".utf8_decode($this->solucion3)."', solucion4='".utf8_decode($this->solucion4)."', solucion5='".utf8_decode($this->solucion5)."', solucion6='".utf8_decode($this->solucion6)."', solucion7='".utf8_decode($this->solucion7)."', solucion8='".utf8_decode($this->solucion8)."', solucion9='".utf8_decode($this->solucion9)."', image='".$this->image."', is_featured=\"$this->is_featured\"  where id=$this->id";
		Executor::doit($sql);
	}
	public function update(){
		$sql = "update ".self::$tablename." set code=\"$this->code\", created_at=\"$this->created_at\", fechaOficio=\"$this->fechaOficio\", fechaElaborado=\"$this->fechaElaborado\", name='".utf8_decode($this->name)."',oficio=\"$this->oficio\",description='".utf8_decode($this->description)."',link=\"$this->link\",price='".utf8_decode($this->price)."',is_public=\"$this->is_public\",in_existence=\"$this->in_existence\",is_featured=\"$this->is_featured\",unit_id=\"$this->unit_id\", unit_id2=\"$this->unit_id2\", unit_id3=\"$this->unit_id3\",category_id=\"$this->category_id\", category_id2=\"$this->category_id2\", category_id3=\"$this->category_id3\", category_id4=\"$this->category_id4\", category_id5=\"$this->category_id5\", category_id6=\"$this->category_id6\", category_id7=\"$this->category_id7\", category_id8=\"$this->category_id8\", category_id9=\"$this->category_id9\", m=\"$this->m\", f=\"$this->f\", ninio=\"$this->ninio\", noAplica=\"$this->noAplica\", delito='".utf8_decode($this->delito)."', oTipo='".utf8_decode($this->oTipo)."', reportef='".utf8_decode($this->reportef)."' where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by code desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getPublicsByCategoryId($id){
		$sql = "select * from ".self::$tablename." where category_id=$id or category_id2=$id or category_id3=$id or category_id4=$id or category_id5=$id or category_id6=$id or category_id7=$id or category_id8=$id or category_id9=$id and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	///////////////////////////////////////////////////////////////////Usuarios
	public static function getMagaly(){
		$sql = "select * from ".self::$tablename." where usuario =2 order by created_at desc limit 100 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorMagaly(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosMagaly(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =2";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	///////////////////////////////////////////////////////////////////
	public static function getTania(){
		$sql = "select * from ".self::$tablename." where usuario =3 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorTania(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosTania(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =3";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	////////////////////////////////////////////////////////////////////
	public static function getAlice(){
		$sql = "select * from ".self::$tablename." where usuario =4 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorAlice(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosAlice(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	/////////////////////////////////////////////////////////////////////
	public static function getFidel(){
		$sql = "select * from ".self::$tablename." where usuario =5 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorFidel(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosFidel(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	/////////////////////////////////////////////////////////////////////
	public static function getRoberto(){
		$sql = "select * from ".self::$tablename." where usuario =6 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorRoberto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosRoberto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	/////////////////////////////////////////////////////////////////
	public static function getEsmeralda(){
		$sql = "select * from ".self::$tablename." where usuario =7 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorEsmeralda(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =7";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosEsmeralda(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =7";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	/////////////////////////////////////////////////////////////////////////////////
	public static function getNadia(){
		$sql = "select * from ".self::$tablename." where usuario =8 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorNadia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =8";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosNadia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =8";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	/////////////////////////////////////////////////////////////////////////////////
	public static function getRuth(){
		$sql = "select * from ".self::$tablename." where usuario =10 order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorRuth(){
		$sql = "select * from ".self::$tablename." where is_public=1 and usuario =10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidosRuth(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and usuario =10";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	////////////////////////////////////////////////////////////////////////////////

	public static function getrh(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34)  order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	//  FUNCION NUEVA QUE SE DEBE ESCRIBIR PARA QUE TODAS LAS AREAS TRABAJEN IGUAL
	public static function getTurnosByArea($area)
	{
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".$this->anioActual."-01-01' AND '".$this->anioActual."-12-31') and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34)  order by created_at desc limit 100";

	}
	public static function getinformatica(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".$this->anioActual."-01-01' AND '".$this->anioActual."-12-31') and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34)  order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getfinancieros(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getmateriales(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getmetodos(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getfasp(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

		public static function getpsicologia(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=7 or category_id2=7 or category_id3=7 or category_id4=7 or category_id5=7 or category_id6=7 or category_id7=7 or category_id8=7 or category_id9=7 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

		public static function getcalidad(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getcoe(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getcontraloria(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10  or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getvehiculos(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getdespacho(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getcontrolProcesos(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getadmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getlitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getlitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getinvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getpericiales(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function gettempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function gettempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getrestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getrestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function gettradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function gettradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getfiscalia(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getifpp(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getprensa(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getelectorales(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getderechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getpenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getpenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getuecs(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getvisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getfamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getperiodistas(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function gettrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function gettecnico(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getagente(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getfcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getenlace(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and  (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getCarrera(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public =1 and (created_at BETWEEN '".self::$anioActual."-01-01' AND '".self::$anioActual."-12-31') and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50 or category_id=34 or category_id2=34 or category_id3=34 or category_id4=34 or category_id5=34) order by created_at desc limit 100";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4News(){
		$sql = "select * from ".self::$tablename." where  is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4Offers(){
		$sql = "select * from ".self::$tablename." where  is_offer=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getNews(){
		$sql = "select * from ".self::$tablename." where is_new=1 and is_public=1 order by created_at desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getFeatureds(){
		$sql = "select * from ".self::$tablename." where in_existence=0 and is_public=1 order by created_at desc limit 20";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getLikeInformatica($q){
		$sql = "select * from ".self::$tablename." where created_at >='2021-01-01' and created_at < '2022-01-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeRH($q){
		$sql = "select * from ".self::$tablename." where (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeFinancieros($q){
		$sql = "select * from ".self::$tablename." where (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeMateriales($q){
		$sql = "select * from ".self::$tablename." where (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeMetodos($q){
		$sql = "select * from ".self::$tablename." where (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeFasp($q){
		$sql = "select * from ".self::$tablename." where (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeCalidad($q){
		$sql = "select * from ".self::$tablename." where (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeCoe($q){
		$sql = "select * from ".self::$tablename." where (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeContraloria($q){
		$sql = "select * from ".self::$tablename." where (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeVehiculos($q){
		$sql = "select * from ".self::$tablename." where (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeDespacho($q){
		$sql = "select * from ".self::$tablename." where (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeControlProcesos($q){
		$sql = "select * from ".self::$tablename." where (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeadmonFinanzas($q){
		$sql = "select * from ".self::$tablename." where (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeLitigacionOriente($q){
		$sql = "select * from ".self::$tablename." where (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeLitigacionPoniente($q){
		$sql = "select * from ".self::$tablename." where (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeInvestigadora($q){
		$sql = "select * from ".self::$tablename." where (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikePericiales($q){
		$sql = "select * from ".self::$tablename." where (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeTempranaOriente($q){
		$sql = "select * from ".self::$tablename." where (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeTempranaPoniente($q){
		$sql = "select * from ".self::$tablename." where (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeRestaurativaOriente($q){
		$sql = "select * from ".self::$tablename." where (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeRestaurativaPoniente($q){
		$sql = "select * from ".self::$tablename." where (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLiketradicionalOriente($q){
		$sql = "select * from ".self::$tablename." where (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLiketradicionalPoniente($q){
		$sql = "select * from ".self::$tablename." where (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeFiscalia($q){
		$sql = "select * from ".self::$tablename." where (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeIfpp($q){
		$sql = "select * from ".self::$tablename." where (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikePrensa($q){
		$sql = "select * from ".self::$tablename." where (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeElectorales($q){
		$sql = "select * from ".self::$tablename." where (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeDerechosHumanos($q){
		$sql = "select * from ".self::$tablename." where (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikePenalesOriente($q){
		$sql = "select * from ".self::$tablename." where (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikePenalesPoniente($q){
		$sql = "select * from ".self::$tablename." where (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeUecs($q){
		$sql = "select * from ".self::$tablename." where (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeVisitaduria($q){
		$sql = "select * from ".self::$tablename." where (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeFamiliaVictima($q){
		$sql = "select * from ".self::$tablename." where (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikePeriodistas($q){
		$sql = "select * from ".self::$tablename." where (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeTrataPersonas($q){
		$sql = "select * from ".self::$tablename." where (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeTecnico($q){
		$sql = "select * from ".self::$tablename." where (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeAgente($q){
		$sql = "select * from ".self::$tablename." where (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeinternacionales($q){
		$sql = "select * from ".self::$tablename." where (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikefcorrupcion($q){
		$sql = "select * from ".self::$tablename." where (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeenlace($q){
		$sql = "select * from ".self::$tablename." where (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeUInteligencia($q){
		$sql = "select * from ".self::$tablename." where (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeAImpacto($q){
		$sql = "select * from ".self::$tablename." where (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeCarrera($q){
		$sql = "select * from ".self::$tablename." where (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getLikeMJudiciales($q){
		$sql = "select * from ".self::$tablename." where (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50) and (code like '%$q%' or DATE_FORMAT(created_at, '%d/%m/%Y') like '%$q%' or name like '%$q%' or price like '%$q%' or oficio like '%$q%' or description like '%$q%')";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public static function getAtendidos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getNoAtendidos(){
		$sql = "select * from ".self::$tablename." where in_existence=0 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getEnviados(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function getNoEnviados(){
		$sql = "select * from ".self::$tablename." where is_public=0 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
////////////////////////////////////////////////////////////////////////////////
	public static function TotalTurnos(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contador(){
		$sql = "select * from ".self::$tablename." where is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function contadorNoEnviados(){
		$sql = "select * from ".self::$tablename." where is_public=0";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function atendidos(){
		$sql = "select * from ".self::$tablename." where in_existence=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////////////////////////
	public static function CntEnero(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEnero(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebrero(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebrero(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzo(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzo(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbril(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbril(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayo(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayo(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunio(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunio(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulio(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulio(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgosto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgosto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembre(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembre(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubre(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubre(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembre(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembre(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembre(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembre(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalFinancieros(){
		$sql = "select * from ".self::$tablename." where (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFinancieros(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=1 and is_public=1 and atendido1=1) or (category_id2=1 and is_public=1 and atendido2=1) or (category_id3=1 and is_public=1 and atendido3=1) or (category_id4=1 and is_public=1 and atendido4=1) or (category_id5=1 and is_public=1 and atendido5=1) or (category_id6=1 and is_public=1 and atendido6=1) or (category_id7=1 and is_public=1 and atendido7=1) or (category_id8=1 and is_public=1 and atendido8=1) or (category_id9=1 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFinancierosTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=1 and in_existence=1) or (category_id2=1 and in_existence=1) or (category_id3=1 and in_existence=1) or (category_id4=1 and in_existence=1) or (category_id5=1 and in_existence=1) or (category_id6=1 and in_existence=1) or (category_id7=1 and in_existence=1) or (category_id8=1 and in_existence=1) or (category_id9=1 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function CntEneroFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1 )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1 )";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreFinancieros(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreFinancieros(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=1 or category_id2=1 or category_id3=1 or category_id4=1 or category_id5=1 or category_id6=1 or category_id7=1 or category_id8=1 or category_id9=1)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////////////////////////////////////////	
	public static function AtenRh(){
		$sql = "select in_existence from ".self::$tablename." where in_existence=1 and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreRh(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreRh(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=3 or category_id2=3 or category_id3=3 or category_id4=3 or category_id5=3 or category_id6=3 or category_id7=3 or category_id8=3 or category_id9=3)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////
public static function TotalInformatica(){
		$sql = "select * from ".self::$tablename." where (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}		
	public static function AtenInformatica(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=2 and is_public=1 and atendido1=1) or (category_id2=2 and is_public=1 and atendido2=1) or (category_id3=2 and is_public=1 and atendido3=1) or (category_id4=2 and is_public=1 and atendido4=1) or (category_id5=2 and is_public=1 and atendido5=1) or (category_id6=2 and is_public=1 and atendido6=1) or (category_id7=2 and is_public=1 and atendido7=1) or (category_id8=2 and is_public=1 and atendido8=1) or (category_id9=2 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenInformaticaTotal(){
		$sql = "select * from ".self::$tablename." WHERE created_at >='2021-01-01' and created_at < '2021-01-01' and (category_id=2 and in_existence=1) or (category_id2=2 and in_existence=1) or (category_id3=2 and in_existence=1) or (category_id4=2 and in_existence=1) or (category_id5=2 and in_existence=1) or (category_id6=2 and in_existence=1) or (category_id7=2 and in_existence=1) or (category_id8=2 and in_existence=1) or (category_id9=2 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreInformatica(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreInformatica(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=2 or category_id2=2 or category_id3=2 or category_id4=2 or category_id5=2 or category_id6=2 or category_id7=2 or category_id8=2 or category_id9=2)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////	
	public static function AtenMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreMateriales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreMateriales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=4 or category_id2=4 or category_id3=4 or category_id4=4 or category_id5=4 or category_id6=4 or category_id7=4 or category_id8=4 or category_id9=4)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
////////////////////////////////////////////////////////
	public static function AtenMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreMetodos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreMetodos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=5 or category_id2=5 or category_id3=5 or category_id4=5 or category_id5=5 or category_id6=5 or category_id7=5 or category_id8=5 or category_id9=5)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////
	public static function AtenFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)  ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreFasp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreFasp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=6 or category_id2=6 or category_id3=6 or category_id4=6 or category_id5=6 or category_id6=6 or category_id7=6 or category_id8=6 or category_id9=6)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////
	public static function AtenCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreCalidad(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreCalidad(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=8 or category_id2=8 or category_id3=8 or category_id4=8 or category_id5=8 or category_id6=8 or category_id7=8 or category_id8=8 or category_id9=8)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////
	public static function TotalCoe(){
		$sql = "select * from ".self::$tablename." where (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenCoe(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=9 and is_public=1 and atendido1=1) or (category_id2=9 and is_public=1 and atendido2=1) or (category_id3=9 and is_public=1 and atendido3=1) or (category_id4=9 and is_public=1 and atendido4=1) or (category_id5=9 and is_public=1 and atendido5=1) or (category_id6=9 and is_public=1 and atendido6=1) or (category_id7=9 and is_public=1 and atendido7=1) or (category_id8=9 and is_public=1 and atendido8=1) or (category_id9=9 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenCoeTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=9 and in_existence=1) or (category_id2=9 and in_existence=1) or (category_id3=9 and in_existence=1) or (category_id4=9 and in_existence=1) or (category_id5=9 and in_existence=1) or (category_id6=9 and in_existence=1) or (category_id7=9 and in_existence=1) or (category_id8=9 and in_existence=1) or (category_id9=9 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreCoe(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreCoe(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=9 or category_id2=9 or category_id3=9 or category_id4=9 or category_id5=9 or category_id6=9 or category_id7=9 or category_id8=9 or category_id9=9)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////
	public static function TotalContraloria(){
		$sql = "select * from ".self::$tablename." where (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenContraloria(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=10 and is_public=1 and atendido1=1) or (category_id2=10 and is_public=1 and atendido2=1) or (category_id3=10 and is_public=1 and atendido3=1) or (category_id4=10 and is_public=1 and atendido4=1) or (category_id5=10 and is_public=1 and atendido5=1) or (category_id6=10 and is_public=1 and atendido6=1) or (category_id7=10 and is_public=1 and atendido7=1) or (category_id8=10 and is_public=1 and atendido8=1) or (category_id9=10 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenContraloriaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=10 and in_existence=1) or (category_id2=10 and in_existence=1) or (category_id3=10 and in_existence=1) or (category_id4=10 and in_existence=1) or (category_id5=10 and in_existence=1) or (category_id6=10 and in_existence=1) or (category_id7=10 and in_existence=1) or (category_id8=10 and in_existence=1) or (category_id9=10 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreContraloria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreContraloria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=10 or category_id2=10 or category_id3=10 or category_id4=10 or category_id5=10 or category_id6=10 or category_id7=10 or category_id8=10 or category_id9=10)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////
	public static function TotalVehiculos(){
		$sql = "select * from ".self::$tablename." where (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenVehiculos(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=11 and is_public=1 and atendido1=1) or (category_id2=11 and is_public=1 and atendido2=1) or (category_id3=11 and is_public=1 and atendido3=1) or (category_id4=11 and is_public=1 and atendido4=1) or (category_id5=11 and is_public=1 and atendido5=1) or (category_id6=11 and is_public=1 and atendido6=1) or (category_id7=11 and is_public=1 and atendido7=1) or (category_id8=11 and is_public=1 and atendido8=1) or (category_id9=11 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenVehiculosTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=11 and in_existence=1) or (category_id2=11 and in_existence=1) or (category_id3=11 and in_existence=1) or (category_id4=11 and in_existence=1) or (category_id5=11 and in_existence=1) or (category_id6=11 and in_existence=1) or (category_id7=11 and in_existence=1) or (category_id8=11 and in_existence=1) or (category_id9=11 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreVehiculos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreVehiculos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=11 or category_id2=11 or category_id3=11 or category_id4=11 or category_id5=11 or category_id6=11 or category_id7=11 or category_id8=11 or category_id9=11)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////
	public static function TotalDespacho(){
		$sql = "select * from ".self::$tablename." where (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenDespacho(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=12 and is_public=1 and atendido1=1) or (category_id2=12 and is_public=1 and atendido2=1) or (category_id3=12 and is_public=1 and atendido3=1) or (category_id4=12 and is_public=1 and atendido4=1) or (category_id5=12 and is_public=1 and atendido5=1) or (category_id6=12 and is_public=1 and atendido6=1) or (category_id7=12 and is_public=1 and atendido7=1) or (category_id8=12 and is_public=1 and atendido8=1) or (category_id9=12 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDespachoTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=12 and in_existence=1) or (category_id2=12 and in_existence=1) or (category_id3=12 and in_existence=1) or (category_id4=12 and in_existence=1) or (category_id5=12 and in_existence=1) or (category_id6=12 and in_existence=1) or (category_id7=12 and in_existence=1) or (category_id8=12 and in_existence=1) or (category_id9=12 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreDespacho(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreDespacho(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=12 or category_id2=12 or category_id3=12 or category_id4=12 or category_id5=12 or category_id6=12 or category_id7=12 or category_id8=12 or category_id9=12)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
////////////////////////////////////////////////////////////////
	public static function TotalControlProcesos(){
		$sql = "select * from ".self::$tablename." where (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenControlProcesos(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=13 and is_public=1 and atendido1=1) or (category_id2=13 and is_public=1 and atendido2=1) or (category_id3=13 and is_public=1 and atendido3=1) or (category_id4=13 and is_public=1 and atendido4=1) or (category_id5=13 and is_public=1 and atendido5=1) or (category_id6=13 and is_public=1 and atendido6=1) or (category_id7=13 and is_public=1 and atendido7=1) or (category_id8=13 and is_public=1 and atendido8=1) or (category_id9=13 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenControlProcesosTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=13 and in_existence=1) or (category_id2=13 and in_existence=1) or (category_id3=13 and in_existence=1) or (category_id4=13 and in_existence=1) or (category_id5=13 and in_existence=1) or (category_id6=13 and in_existence=1) or (category_id7=13 and in_existence=1) or (category_id8=13 and in_existence=1) or (category_id9=13 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreControlProcesos(){ 
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreControlProcesos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreControlProcesos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=13 or category_id2=13 or category_id3=13 or category_id4=13 or category_id5=13 or category_id6=13 or category_id7=13 or category_id8=13 or category_id9=13)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////////////////
	public static function TotalAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=14 and is_public=1 and atendido1=1) or (category_id2=14 and is_public=1 and atendido2=1) or (category_id3=14 and is_public=1 and atendido3=1) or (category_id4=14 and is_public=1 and atendido4=1) or (category_id5=14 and is_public=1 and atendido5=1) or (category_id6=14 and is_public=1 and atendido6=1) or (category_id7=14 and is_public=1 and atendido7=1) or (category_id8=14 and is_public=1 and atendido8=1) or (category_id9=14 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAdmonFinanzasTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=14 and in_existence=1) or (category_id2=14 and in_existence=1) or (category_id3=14 and in_existence=1) or (category_id4=14 and in_existence=1) or (category_id5=14 and in_existence=1) or (category_id6=14 and in_existence=1) or (category_id7=14 and in_existence=1) or (category_id8=14 and in_existence=1) or (category_id9=14 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreAdmonFinanzas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=14 or category_id2=14 or category_id3=14 or category_id4=14 or category_id5=14 or category_id6=14 or category_id7=14 or category_id8=14 or category_id9=14)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////
	public static function TotalLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenLitigacionOriente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=15 and is_public=1 and atendido1=1) or (category_id2=15 and is_public=1 and atendido2=1) or (category_id3=15 and is_public=1 and atendido3=1) or (category_id4=15 and is_public=1 and atendido4=1) or (category_id5=15 and is_public=1 and atendido5=1) or (category_id6=15 and is_public=1 and atendido6=1) or (category_id7=15 and is_public=1 and atendido7=1) or (category_id8=15 and is_public=1 and atendido8=1) or (category_id9=15 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenLitigacionOrienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=15 and in_existence=1) or (category_id2=15 and in_existence=1) or (category_id3=15 and in_existence=1) or (category_id4=15 and in_existence=1) or (category_id5=15 and in_existence=1) or (category_id6=15 and in_existence=1) or (category_id7=15 and in_existence=1) or (category_id8=15 and in_existence=1) or (category_id9=15 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreLitigacionOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=15 or category_id2=15 or category_id3=15 or category_id4=15 or category_id5=15 or category_id6=15 or category_id7=15 or category_id8=15 or category_id9=15)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
////////////////////////////////////////////////////////////////////
	public static function TotalLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=16 and is_public=1 and atendido1=1) or (category_id2=16 and is_public=1 and atendido2=1) or (category_id3=16 and is_public=1 and atendido3=1) or (category_id4=16 and is_public=1 and atendido4=1) or (category_id5=16 and is_public=1 and atendido5=1) or (category_id6=16 and is_public=1 and atendido6=1) or (category_id7=16 and is_public=1 and atendido7=1) or (category_id8=16 and is_public=1 and atendido8=1) or (category_id9=16 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenLitigacionPonienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=16 and in_existence=1) or (category_id2=16 and in_existence=1) or (category_id3=16 and in_existence=1) or (category_id4=16 and in_existence=1) or (category_id5=16 and in_existence=1) or (category_id6=16 and in_existence=1) or (category_id7=16 and in_existence=1) or (category_id8=16 and in_existence=1) or (category_id9=16 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreLitigacionPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=16 or category_id2=16 or category_id3=16 or category_id4=16 or category_id5=16 or category_id6=16 or category_id7=16 or category_id8=16 or category_id9=16)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////
	public static function TotalInvestigadora(){
		$sql = "select * from ".self::$tablename." where (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenInvestigadora(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=17 and is_public=1 and atendido1=1) or (category_id2=17 and is_public=1 and atendido2=1) or (category_id3=17 and is_public=1 and atendido3=1) or (category_id4=17 and is_public=1 and atendido4=1) or (category_id5=17 and is_public=1 and atendido5=1) or (category_id6=17 and is_public=1 and atendido6=1) or (category_id7=17 and is_public=1 and atendido7=1) or (category_id8=17 and is_public=1 and atendido8=1) or (category_id9=17 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenInvestigadoraTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=17 and in_existence=1) or (category_id2=17 and in_existence=1) or (category_id3=17 and in_existence=1) or (category_id4=17 and in_existence=1) or (category_id5=17 and in_existence=1) or (category_id6=17 and in_existence=1) or (category_id7=17 and in_existence=1) or (category_id8=17 and in_existence=1) or (category_id9=17 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreInvestigadora(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=17 or category_id2=17 or category_id3=17 or category_id4=17 or category_id5=17 or category_id6=17 or category_id7=17 or category_id8=17 or category_id9=17)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////////////
	public static function TotalPericiales(){
		$sql = "select * from ".self::$tablename." where (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenPericiales(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=18 and is_public=1 and atendido1=1) or (category_id2=18 and is_public=1 and atendido2=1) or (category_id3=18 and is_public=1 and atendido3=1) or (category_id4=18 and is_public=1 and atendido4=1) or (category_id5=18 and is_public=1 and atendido5=1) or (category_id6=18 and is_public=1 and atendido6=1) or (category_id7=18 and is_public=1 and atendido7=1) or (category_id8=18 and is_public=1 and atendido8=1) or (category_id9=18 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPericialesTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=18 and in_existence=1) or (category_id2=18 and in_existence=1) or (category_id3=18 and in_existence=1) or (category_id4=18 and in_existence=1) or (category_id5=18 and in_existence=1) or (category_id6=18 and in_existence=1) or (category_id7=18 and in_existence=1) or (category_id8=18 and in_existence=1) or (category_id9=18 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function CntEneroPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoPericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoPericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrePericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrePericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrePericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrePericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrePericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrePericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrePericiales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrePericiales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=18 or category_id2=18 or category_id3=18 or category_id4=18 or category_id5=18 or category_id6=18 or category_id7=18 or category_id8=18 or category_id9=18)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////////////////////
	public static function TotalTempranaOriente(){
		$sql = "select * from ".self::$tablename." where (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTempranaOriente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=19 and is_public=1 and atendido1=1) or (category_id2=19 and is_public=1 and atendido2=1) or (category_id3=19 and is_public=1 and atendido3=1) or (category_id4=19 and is_public=1 and atendido4=1) or (category_id5=19 and is_public=1 and atendido5=1) or (category_id6=19 and is_public=1 and atendido6=1) or (category_id7=19 and is_public=1 and atendido7=1) or (category_id8=19 and is_public=1 and atendido8=1) or (category_id9=19 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTempranaOrienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=19 and in_existence=1) or (category_id2=19 and in_existence=1) or (category_id3=19 and in_existence=1) or (category_id4=19 and in_existence=1) or (category_id5=19 and in_existence=1) or (category_id6=19 and in_existence=1) or (category_id7=19 and in_existence=1) or (category_id8=19 and in_existence=1) or (category_id9=19 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTempranaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=19 or category_id2=19 or category_id3=19 or category_id4=19 or category_id5=19 or category_id6=19 or category_id7=19 or category_id8=19 or category_id9=19)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////
	public static function TotalTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenTempranaPoniente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=20 and is_public=1 and atendido1=1) or (category_id2=20 and is_public=1 and atendido2=1) or (category_id3=20 and is_public=1 and atendido3=1) or (category_id4=20 and is_public=1 and atendido4=1) or (category_id5=20 and is_public=1 and atendido5=1) or (category_id6=20 and is_public=1 and atendido6=1) or (category_id7=20 and is_public=1 and atendido7=1) or (category_id8=20 and is_public=1 and atendido8=1) or (category_id9=20 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTempranaPonienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=20 and in_existence=1) or (category_id2=20 and in_existence=1) or (category_id3=20 and in_existence=1) or (category_id4=20 and in_existence=1) or (category_id5=20 and in_existence=1) or (category_id6=20 and in_existence=1) or (category_id7=20 and in_existence=1) or (category_id8=20 and in_existence=1) or (category_id9=20 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTempranaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=20 or category_id2=20 or category_id3=20 or category_id4=20 or category_id5=20 or category_id6=20 or category_id7=20 or category_id8=20 or category_id9=20)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////
	public static function TotalRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=21 and is_public=1 and atendido1=1) or (category_id2=21 and is_public=1 and atendido2=1) or (category_id3=21 and is_public=1 and atendido3=1) or (category_id4=21 and is_public=1 and atendido4=1) or (category_id5=21 and is_public=1 and atendido5=1) or (category_id6=21 and is_public=1 and atendido6=1) or (category_id7=21 and is_public=1 and atendido7=1) or (category_id8=21 and is_public=1 and atendido8=1) or (category_id9=21 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenRestaurativaOrienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=21 and in_existence=1) or (category_id2=21 and in_existence=1) or (category_id3=21 and in_existence=1) or (category_id4=21 and in_existence=1) or (category_id5=21 and in_existence=1) or (category_id6=21 and in_existence=1) or (category_id7=21 and in_existence=1) or (category_id8=21 and in_existence=1) or (category_id9=21 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreRestaurativaOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=21 or category_id2=21 or category_id3=21 or category_id4=21 or category_id5=21 or category_id6=21 or category_id7=21 or category_id8=21 or category_id9=21)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////
	public static function TotalRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=22 and is_public=1 and atendido1=1) or (category_id2=22 and is_public=1 and atendido2=1) or (category_id3=22 and is_public=1 and atendido3=1) or (category_id4=22 and is_public=1 and atendido4=1) or (category_id5=22 and is_public=1 and atendido5=1) or (category_id6=22 and is_public=1 and atendido6=1) or (category_id7=22 and is_public=1 and atendido7=1) or (category_id8=22 and is_public=1 and atendido8=1) or (category_id9=22 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenRestaurativaPonienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=22 and in_existence=1) or (category_id2=22 and in_existence=1) or (category_id3=22 and in_existence=1) or (category_id4=22 and in_existence=1) or (category_id5=22 and in_existence=1) or (category_id6=22 and in_existence=1) or (category_id7=22 and in_existence=1) or (category_id8=22 and in_existence=1) or (category_id9=22 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreRestaurativaPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=22 or category_id2=22 or category_id3=22 or category_id4=22 or category_id5=22 or category_id6=22 or category_id7=22 or category_id8=22 or category_id9=22)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////////
	public static function TotalTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenTradicionalOriente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=23 and is_public=1 and atendido1=1) or (category_id2=23 and is_public=1 and atendido2=1) or (category_id3=23 and is_public=1 and atendido3=1) or (category_id4=23 and is_public=1 and atendido4=1) or (category_id5=23 and is_public=1 and atendido5=1) or (category_id6=23 and is_public=1 and atendido6=1) or (category_id7=23 and is_public=1 and atendido7=1) or (category_id8=23 and is_public=1 and atendido8=1) or (category_id9=23 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTradicionalOrienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=23 and in_existence=1) or (category_id2=23 and in_existence=1) or (category_id3=23 and in_existence=1) or (category_id4=23 and in_existence=1) or (category_id5=23 and in_existence=1) or (category_id6=23 and in_existence=1) or (category_id7=23 and in_existence=1) or (category_id8=23 and in_existence=1) or (category_id9=23 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTradicionalOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=23 or category_id2=23 or category_id3=23 or category_id4=23 or category_id5=23 or category_id6=23 or category_id7=23 or category_id8=23 or category_id9=23)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////////////
	public static function TotalTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=24 and is_public=1 and atendido1=1) or (category_id2=24 and is_public=1 and atendido2=1) or (category_id3=24 and is_public=1 and atendido3=1) or (category_id4=24 and is_public=1 and atendido4=1) or (category_id5=24 and is_public=1 and atendido5=1) or (category_id6=24 and is_public=1 and atendido6=1) or (category_id7=24 and is_public=1 and atendido7=1) or (category_id8=24 and is_public=1 and atendido8=1) or (category_id9=24 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTradicionalPonienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=24 and in_existence=1) or (category_id2=24 and in_existence=1) or (category_id3=24 and in_existence=1) or (category_id4=24 and in_existence=1) or (category_id5=24 and in_existence=1) or (category_id6=24 and in_existence=1) or (category_id7=24 and in_existence=1) or (category_id8=24 and in_existence=1) or (category_id9=24 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTradicionalPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=24 or category_id2=24 or category_id3=24 or category_id4=24 or category_id5=24 or category_id6=24 or category_id7=24 or category_id8=24 or category_id9=24)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////////////////////////////////
	public static function TotalFiscalia(){
		$sql = "select * from ".self::$tablename." where (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenFiscalia(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=25 and is_public=1 and atendido1=1) or (category_id2=25 and is_public=1 and atendido2=1) or (category_id3=25 and is_public=1 and atendido3=1) or (category_id4=25 and is_public=1 and atendido4=1) or (category_id5=25 and is_public=1 and atendido5=1) or (category_id6=25 and is_public=1 and atendido6=1) or (category_id7=25 and is_public=1 and atendido7=1) or (category_id8=25 and is_public=1 and atendido8=1) or (category_id9=25 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFiscaliaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=25 and in_existence=1) or (category_id2=25 and in_existence=1) or (category_id3=25 and in_existence=1) or (category_id4=25 and in_existence=1) or (category_id5=25 and in_existence=1) or (category_id6=25 and in_existence=1) or (category_id7=25 and in_existence=1) or (category_id8=25 and in_existence=1) or (category_id9=25 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreFiscalia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreFiscalia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=25 or category_id2=25 or category_id3=25 or category_id4=25 or category_id5=25 or category_id6=25 or category_id7=25 or category_id8=25 or category_id9=25)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalIfpp(){
		$sql = "select * from ".self::$tablename." where (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenIfpp(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=26 and is_public=1 and atendido1=1) or (category_id2=26 and is_public=1 and atendido2=1) or (category_id3=26 and is_public=1 and atendido3=1) or (category_id4=26 and is_public=1 and atendido4=1) or (category_id5=26 and is_public=1 and atendido5=1) or (category_id6=26 and is_public=1 and atendido6=1) or (category_id7=26 and is_public=1 and atendido7=1) or (category_id8=26 and is_public=1 and atendido8=1) or (category_id9=26 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenIfppTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=26 and in_existence=1) or (category_id2=26 and in_existence=1) or (category_id3=26 and in_existence=1) or (category_id4=26 and in_existence=1) or (category_id5=26 and in_existence=1) or (category_id6=26 and in_existence=1) or (category_id7=26 and in_existence=1) or (category_id8=26 and in_existence=1) or (category_id9=26 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreIfpp(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreIfpp(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=26 or category_id2=26 or category_id3=26 or category_id4=26 or category_id5=26 or category_id6=26 or category_id7=26 or category_id8=26 or category_id9=26)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalPrensa(){
		$sql = "select * from ".self::$tablename." where (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPrensa(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=27 and is_public=1 and atendido1=1) or (category_id2=27 and is_public=1 and atendido2=1) or (category_id3=27 and is_public=1 and atendido3=1) or (category_id4=27 and is_public=1 and atendido4=1) or (category_id5=27 and is_public=1 and atendido5=1) or (category_id6=27 and is_public=1 and atendido6=1) or (category_id7=27 and is_public=1 and atendido7=1) or (category_id8=27 and is_public=1 and atendido8=1) or (category_id9=27 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPrensaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=27 and in_existence=1) or (category_id2=27 and in_existence=1) or (category_id3=27 and in_existence=1) or (category_id4=27 and in_existence=1) or (category_id5=27 and in_existence=1) or (category_id6=27 and in_existence=1) or (category_id7=27 and in_existence=1) or (category_id8=27 and in_existence=1) or (category_id9=27 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoPrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoPrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrePrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrePrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrePrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrePrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrePrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrePrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrePrensa(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrePrensa(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=27 or category_id2=27 or category_id3=27 or category_id4=27 or category_id5=27 or category_id6=27 or category_id7=27 or category_id8=27 or category_id9=27)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalElectorales(){
		$sql = "select * from ".self::$tablename." where (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenElectorales(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=28 and is_public=1 and atendido1=1) or (category_id2=28 and is_public=1 and atendido2=1) or (category_id3=28 and is_public=1 and atendido3=1) or (category_id4=28 and is_public=1 and atendido4=1) or (category_id5=28 and is_public=1 and atendido5=1) or (category_id6=28 and is_public=1 and atendido6=1) or (category_id7=28 and is_public=1 and atendido7=1) or (category_id8=28 and is_public=1 and atendido8=1) or (category_id9=28 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenElectoralesTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=28 and in_existence=1) or (category_id2=28 and in_existence=1) or (category_id3=28 and in_existence=1) or (category_id4=28 and in_existence=1) or (category_id5=28 and in_existence=1) or (category_id6=28 and in_existence=1) or (category_id7=28 and in_existence=1) or (category_id8=28 and in_existence=1) or (category_id9=28 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreElectorales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreElectorales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=28 or category_id2=28 or category_id3=28 or category_id4=28 or category_id5=28 or category_id6=28 or category_id7=28 or category_id8=28 or category_id9=28)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenDerechosHumanos(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=29 and is_public=1 and atendido1=1) or (category_id2=29 and is_public=1 and atendido2=1) or (category_id3=29 and is_public=1 and atendido3=1) or (category_id4=29 and is_public=1 and atendido4=1) or (category_id5=29 and is_public=1 and atendido5=1) or (category_id6=29 and is_public=1 and atendido6=1) or (category_id7=29 and is_public=1 and atendido7=1) or (category_id8=29 and is_public=1 and atendido8=1) or (category_id9=29 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDerechosHumanosTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=29 and in_existence=1) or (category_id2=29 and in_existence=1) or (category_id3=29 and in_existence=1) or (category_id4=29 and in_existence=1) or (category_id5=29 and in_existence=1) or (category_id6=29 and in_existence=1) or (category_id7=29 and in_existence=1) or (category_id8=29 and in_existence=1) or (category_id9=29 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreDerechosHumanos(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=29 or category_id2=29 or category_id3=29 or category_id4=29 or category_id5=29 or category_id6=29 or category_id7=29 or category_id8=29 or category_id9=29)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
//////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalPenalesOriente(){
		$sql = "select * from ".self::$tablename." where (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenPenalesOriente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=30 and is_public=1 and atendido1=1) or (category_id2=30 and is_public=1 and atendido2=1) or (category_id3=30 and is_public=1 and atendido3=1) or (category_id4=30 and is_public=1 and atendido4=1) or (category_id5=30 and is_public=1 and atendido5=1) or (category_id6=30 and is_public=1 and atendido6=1) or (category_id7=30 and is_public=1 and atendido7=1) or (category_id8=30 and is_public=1 and atendido8=1) or (category_id9=30 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPenalesOrienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=30 and in_existence=1) or (category_id2=30 and in_existence=1) or (category_id3=30 and in_existence=1) or (category_id4=30 and in_existence=1) or (category_id5=30 and in_existence=1) or (category_id6=30 and in_existence=1) or (category_id7=30 and in_existence=1) or (category_id8=30 and in_existence=1) or (category_id9=30 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoPenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrePenalesOriente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=30 or category_id2=30 or category_id3=30 or category_id4=30 or category_id5=30 or category_id6=30 or category_id7=30 or category_id8=30 or category_id9=30)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////////////////////////////////////
	public static function TotalPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPenalesPoniente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=31 and is_public=1 and atendido1=1) or (category_id2=31 and is_public=1 and atendido2=1) or (category_id3=31 and is_public=1 and atendido3=1) or (category_id4=31 and is_public=1 and atendido4=1) or (category_id5=31 and is_public=1 and atendido5=1) or (category_id6=31 and is_public=1 and atendido6=1) or (category_id7=31 and is_public=1 and atendido7=1) or (category_id8=31 and is_public=1 and atendido8=1) or (category_id9=31 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPenalesPonienteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=31 and in_existence=1) or (category_id2=31 and in_existence=1) or (category_id3=31 and in_existence=1) or (category_id4=31 and in_existence=1) or (category_id5=31 and in_existence=1) or (category_id6=31 and in_existence=1) or (category_id7=31 and in_existence=1) or (category_id8=31 and in_existence=1) or (category_id9=31 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoPenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrePenalesPoniente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=31 or category_id2=31 or category_id3=31 or category_id4=31 or category_id5=31 or category_id6=31 or category_id7=31 or category_id8=31 or category_id9=31)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
///////////////////////////////////////////////////////////////////////////////////////
	public static function TotalUecs(){
		$sql = "select * from ".self::$tablename." where (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenUecs(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=32 and is_public=1 and atendido1=1) or (category_id2=32 and is_public=1 and atendido2=1) or (category_id3=32 and is_public=1 and atendido3=1) or (category_id4=32 and is_public=1 and atendido4=1) or (category_id5=32 and is_public=1 and atendido5=1) or (category_id6=32 and is_public=1 and atendido6=1) or (category_id7=32 and is_public=1 and atendido7=1) or (category_id8=32 and is_public=1 and atendido8=1) or (category_id9=32 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenUecsTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=32 and in_existence=1) or (category_id2=32 and in_existence=1) or (category_id3=32 and in_existence=1) or (category_id4=32 and in_existence=1) or (category_id5=32 and in_existence=1) or (category_id6=32 and in_existence=1) or (category_id7=32 and in_existence=1) or (category_id8=32 and in_existence=1) or (category_id9=32 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreUecs(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreUecs(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=32 or category_id2=32 or category_id3=32 or category_id4=32 or category_id5=32 or category_id6=32 or category_id7=32 or category_id8=32 or category_id9=32)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalVisitaduria(){
		$sql = "select * from ".self::$tablename." where (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenVisitaduria(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=33 and is_public=1 and atendido1=1) or (category_id2=33 and is_public=1 and atendido2=1) or (category_id3=33 and is_public=1 and atendido3=1) or (category_id4=33 and is_public=1 and atendido4=1) or (category_id5=33 and is_public=1 and atendido5=1) or (category_id6=33 and is_public=1 and atendido6=1) or (category_id7=33 and is_public=1 and atendido7=1) or (category_id8=33 and is_public=1 and atendido8=1) or (category_id9=33 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenVisitaduriaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=33 and in_existence=1) or (category_id2=33 and in_existence=1) or (category_id3=33 and in_existence=1) or (category_id4=33 and in_existence=1) or (category_id5=33 and in_existence=1) or (category_id6=33 and in_existence=1) or (category_id7=33 and in_existence=1) or (category_id8=33 and in_existence=1) or (category_id9=33 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreVisitaduria(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=33 or category_id2=33 or category_id3=33 or category_id4=33 or category_id5=33 or category_id6=33 or category_id7=33 or category_id8=33 or category_id9=33)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFamiliaVictima(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=35 and is_public=1 and atendido1=1) or (category_id2=35 and is_public=1 and atendido2=1) or (category_id3=35 and is_public=1 and atendido3=1) or (category_id4=35 and is_public=1 and atendido4=1) or (category_id5=35 and is_public=1 and atendido5=1) or (category_id6=35 and is_public=1 and atendido6=1) or (category_id7=35 and is_public=1 and atendido7=1) or (category_id8=35 and is_public=1 and atendido8=1) or (category_id9=35 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFamiliaVictimaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=35 and in_existence=1) or (category_id2=35 and in_existence=1) or (category_id3=35 and in_existence=1) or (category_id4=35 and in_existence=1) or (category_id5=35 and in_existence=1) or (category_id6=35 and in_existence=1) or (category_id7=35 and in_existence=1) or (category_id8=35 and in_existence=1) or (category_id9=35 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreFamiliaVictima(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=35 or category_id2=35 or category_id3=35 or category_id4=35 or category_id5=35 or category_id6=35 or category_id7=35 or category_id8=35 or category_id9=35)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalPeriodistas(){
		$sql = "select * from ".self::$tablename." where (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenPeriodistas(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=36 and is_public=1 and atendido1=1) or (category_id2=36 and is_public=1 and atendido2=1) or (category_id3=36 and is_public=1 and atendido3=1) or (category_id4=36 and is_public=1 and atendido4=1) or (category_id5=36 and is_public=1 and atendido5=1) or (category_id6=36 and is_public=1 and atendido6=1) or (category_id7=36 and is_public=1 and atendido7=1) or (category_id8=36 and is_public=1 and atendido8=1) or (category_id9=36 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenPeriodistasTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=36 and in_existence=1) or (category_id2=36 and in_existence=1) or (category_id3=36 and in_existence=1) or (category_id4=36 and in_existence=1) or (category_id5=36 and in_existence=1) or (category_id6=36 and in_existence=1) or (category_id7=36 and in_existence=1) or (category_id8=36 and in_existence=1) or (category_id9=36 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoPeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoPeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrePeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrePeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrePeriodistas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=36 or category_id2=36 or category_id3=36 or category_id4=36 or category_id5=36 or category_id6=36 or category_id7=36 or category_id8=36 or category_id9=36)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


		/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalTrataPersonas(){
		$sql = "select * from ".self::$tablename." where (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenTrataPersonas(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=37 and is_public=1 and atendido1=1) or (category_id2=37 and is_public=1 and atendido2=1) or (category_id3=37 and is_public=1 and atendido3=1) or (category_id4=37 and is_public=1 and atendido4=1) or (category_id5=37 and is_public=1 and atendido5=1) or (category_id6=37 and is_public=1 and atendido6=1) or (category_id7=37 and is_public=1 and atendido7=1) or (category_id8=37 and is_public=1 and atendido8=1) or (category_id9=37 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTrataPersonasTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=37 and in_existence=1) or (category_id2=37 and in_existence=1) or (category_id3=37 and in_existence=1) or (category_id4=37 and in_existence=1) or (category_id5=37 and in_existence=1) or (category_id6=37 and in_existence=1) or (category_id7=37 and in_existence=1) or (category_id8=37 and in_existence=1) or (category_id9=37 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTrataPersonas(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=37 or category_id2=37 or category_id3=37 or category_id4=37 or category_id5=37 or category_id6=37 or category_id7=37 or category_id8=37 or category_id9=37)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

		/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalTecnico(){
		$sql = "select * from ".self::$tablename." where (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTecnico(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=38 and is_public=1 and atendido1=1) or (category_id2=38 and is_public=1 and atendido2=1) or (category_id3=38 and is_public=1 and atendido3=1) or (category_id4=38 and is_public=1 and atendido4=1) or (category_id5=38 and is_public=1 and atendido5=1) or (category_id6=38 and is_public=1 and atendido6=1) or (category_id7=38 and is_public=1 and atendido7=1) or (category_id8=38 and is_public=1 and atendido8=1) or (category_id9=38 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenTecnicoTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=38 and in_existence=1) or (category_id2=38 and in_existence=1) or (category_id3=38 and in_existence=1) or (category_id4=38 and in_existence=1) or (category_id5=38 and in_existence=1) or (category_id6=38 and in_existence=1) or (category_id7=38 and in_existence=1) or (category_id8=38 and in_existence=1) or (category_id9=38 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreTecnico(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreTecnico(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=38 or category_id2=38 or category_id3=38 or category_id4=38 or category_id5=38 or category_id6=38 or category_id7=38 or category_id8=38 or category_id9=38)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

		/////////////////////////////////////////////////////////////////////////////////////
	public static function TotalAgente(){
		$sql = "select * from ".self::$tablename." where (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgente(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=39 and is_public=1 and atendido1=1) or (category_id2=39 and is_public=1 and atendido2=1) or (category_id3=39 and is_public=1 and atendido3=1) or (category_id4=39 and is_public=1 and atendido4=1) or (category_id5=39 and is_public=1 and atendido5=1) or (category_id6=39 and is_public=1 and atendido6=1) or (category_id7=39 and is_public=1 and atendido7=1) or (category_id8=39 and is_public=1 and atendido8=1) or (category_id9=39 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgenteTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=39 and in_existence=1) or (category_id2=39 and in_existence=1) or (category_id3=39 and in_existence=1) or (category_id4=39 and in_existence=1) or (category_id5=39 and in_existence=1) or (category_id6=39 and in_existence=1) or (category_id7=39 and in_existence=1) or (category_id8=39 and in_existence=1) or (category_id9=39 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreAgente(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreAgente(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=39 or category_id2=39 or category_id3=39 or category_id4=39 or category_id5=39 or category_id6=39 or category_id7=39 or category_id8=39 or category_id9=39)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	///////////////////////////////////////////////////////////////////////////////////////////
	

	public static function Totalinternacionales(){
		$sql = "select * from ".self::$tablename." where (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function Ateninternacionales(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=44 and is_public=1 and atendido1=1) or (category_id2=44 and is_public=1 and atendido2=1) or (category_id3=44 and is_public=1 and atendido3=1) or (category_id4=44 and is_public=1 and atendido4=1) or (category_id5=44 and is_public=1 and atendido5=1) or (category_id6=44 and is_public=1 and atendido6=1) or (category_id7=44 and is_public=1 and atendido7=1) or (category_id8=44 and is_public=1 and atendido8=1) or (category_id9=44 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AteninternacionalesTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=44 and in_existence=1) or (category_id2=44 and in_existence=1) or (category_id3=44 and in_existence=1) or (category_id4=44 and in_existence=1) or (category_id5=44 and in_existence=1) or (category_id6=44 and in_existence=1) or (category_id7=44 and in_existence=1) or (category_id8=44 and in_existence=1) or (category_id9=44 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEnerointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEnerointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebrerointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebrerointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilinternacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJuniointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJuniointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJuliointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJuliointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostointernacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostointernacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreinternacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreinternacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreinternacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreinternacionales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreinternacionales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=44 or category_id2=44 or category_id3=44 or category_id4=44 or category_id5=44 or category_id6=44 or category_id7=44 or category_id8=44 or category_id9=44)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

    ///////////////////////////////////////////////////////////////////////////////////////////


	public static function Totalfcorrupcion(){
		$sql = "select * from ".self::$tablename." where (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function Atenfcorrupcion(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=41 and is_public=1 and atendido1=1) or (category_id2=41 and is_public=1 and atendido2=1) or (category_id3=41 and is_public=1 and atendido3=1) or (category_id4=41 and is_public=1 and atendido4=1) or (category_id5=41 and is_public=1 and atendido5=1) or (category_id6=41 and is_public=1 and atendido6=1) or (category_id7=41 and is_public=1 and atendido7=1) or (category_id8=41 and is_public=1 and atendido8=1) or (category_id9=41 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenfcorrupcionTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=41 and in_existence=1) or (category_id2=41 and in_existence=1) or (category_id3=41 and in_existence=1) or (category_id4=41 and in_existence=1) or (category_id5=41 and in_existence=1) or (category_id6=41 and in_existence=1) or (category_id7=41 and in_existence=1) or (category_id8=41 and in_existence=1) or (category_id9=41 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEnerofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEnerofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebrerofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebrerofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilfcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilfcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJuniofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJuniofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJuliofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJuliofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostofcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostofcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembrefcorrupcion(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=41 or category_id2=41 or category_id3=41 or category_id4=41 or category_id5=41 or category_id6=41 or category_id7=41 or category_id8=41 or category_id9=41)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

///////////////////////////////////////////////////////////////////////////////////////////


	public static function Totalenlace(){
		$sql = "select * from ".self::$tablename." where (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function Atenenlace(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=46 and is_public=1 and atendido1=1) or (category_id2=46 and is_public=1 and atendido2=1) or (category_id3=46 and is_public=1 and atendido3=1) or (category_id4=46 and is_public=1 and atendido4=1) or (category_id5=46 and is_public=1 and atendido5=1) or (category_id6=46 and is_public=1 and atendido6=1) or (category_id7=46 and is_public=1 and atendido7=1) or (category_id8=46 and is_public=1 and atendido8=1) or (category_id9=46 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenenlaceTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=46 and in_existence=1) or (category_id2=46 and in_existence=1) or (category_id3=46 and in_existence=1) or (category_id4=46 and in_existence=1) or (category_id5=46 and in_existence=1) or (category_id6=46 and in_existence=1) or (category_id7=46 and in_existence=1) or (category_id8=46 and in_existence=1) or (category_id9=46 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreenlace(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreenlace(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=46 or category_id2=46 or category_id3=46 or category_id4=46 or category_id5=46 or category_id6=46 or category_id7=46 or category_id8=46 or category_id9=46)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

///////////////////////////////////////////////////////////////////////////////////////////


	public static function TotalUInteligencia(){
		$sql = "select * from ".self::$tablename." where (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenUInteligencia(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=47 and is_public=1 and atendido1=1) or (category_id2=47 and is_public=1 and atendido2=1) or (category_id3=47 and is_public=1 and atendido3=1) or (category_id4=47 and is_public=1 and atendido4=1) or (category_id5=47 and is_public=1 and atendido5=1) or (category_id6=47 and is_public=1 and atendido6=1) or (category_id7=47 and is_public=1 and atendido7=1) or (category_id8=47 and is_public=1 and atendido8=1) or (category_id9=47 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenUInteligenciaTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=47 and in_existence=1) or (category_id2=47 and in_existence=1) or (category_id3=47 and in_existence=1) or (category_id4=47 and in_existence=1) or (category_id5=47 and in_existence=1) or (category_id6=47 and in_existence=1) or (category_id7=47 and in_existence=1) or (category_id8=47 and in_existence=1) or (category_id9=47 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreUInteligencia(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=47 or category_id2=47 or category_id3=47 or category_id4=47 or category_id5=47 or category_id6=47 or category_id7=47 or category_id8=47 or category_id9=47)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	///////////////////////////////////////////////////////////////////////////////////////////


	public static function TotalAImpacto(){
		$sql = "select * from ".self::$tablename." where (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenAImpacto(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=48 and is_public=1 and atendido1=1) or (category_id2=48 and is_public=1 and atendido2=1) or (category_id3=48 and is_public=1 and atendido3=1) or (category_id4=48 and is_public=1 and atendido4=1) or (category_id5=48 and is_public=1 and atendido5=1) or (category_id6=48 and is_public=1 and atendido6=1) or (category_id7=48 and is_public=1 and atendido7=1) or (category_id8=48 and is_public=1 and atendido8=1) or (category_id9=48 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAImpactoTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=48 and in_existence=1) or (category_id2=48 and in_existence=1) or (category_id3=48 and in_existence=1) or (category_id4=48 and in_existence=1) or (category_id5=48 and in_existence=1) or (category_id6=48 and in_existence=1) or (category_id7=48 and in_existence=1) or (category_id8=48 and in_existence=1) or (category_id9=48 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreAImpacto(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreAImpacto(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=48 or category_id2=48 or category_id3=48 or category_id4=48 or category_id5=48 or category_id6=48 or category_id7=48 or category_id8=48 or category_id9=48)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	///////////////////////////////////////////////////////////////////////////////////////////


	public static function TotalCarrera(){
		$sql = "select * from ".self::$tablename." where (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenCarrera(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=49 and is_public=1 and atendido1=1) or (category_id2=49 and is_public=1 and atendido2=1) or (category_id3=49 and is_public=1 and atendido3=1) or (category_id4=49 and is_public=1 and atendido4=1) or (category_id5=49 and is_public=1 and atendido5=1) or (category_id6=49 and is_public=1 and atendido6=1) or (category_id7=49 and is_public=1 and atendido7=1) or (category_id8=49 and is_public=1 and atendido8=1) or (category_id9=49 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenCarreraTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=49 and in_existence=1) or (category_id2=49 and in_existence=1) or (category_id3=49 and in_existence=1) or (category_id4=49 and in_existence=1) or (category_id5=49 and in_existence=1) or (category_id6=49 and in_existence=1) or (category_id7=49 and in_existence=1) or (category_id8=49 and in_existence=1) or (category_id9=49 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreCarrera(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreCarrera(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=49 or category_id2=49 or category_id3=49 or category_id4=49 or category_id5=49 or category_id6=49 or category_id7=49 or category_id8=49 or category_id9=49)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	///////////////////////////////////////////////////////////////////////////////////////////


	public static function TotalMJudiciales(){
		$sql = "select * from ".self::$tablename." where (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50) and is_public=1 ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}	
	public static function AtenMJudiciales(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=50 and is_public=1 and atendido1=1) or (category_id2=50 and is_public=1 and atendido2=1) or (category_id3=50 and is_public=1 and atendido3=1) or (category_id4=50 and is_public=1 and atendido4=1) or (category_id5=50 and is_public=1 and atendido5=1) or (category_id6=50 and is_public=1 and atendido6=1) or (category_id7=50 and is_public=1 and atendido7=1) or (category_id8=50 and is_public=1 and atendido8=1) or (category_id9=50 and is_public=1 and atendido9=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMJudicialesTotal(){
		$sql = "select * from ".self::$tablename." WHERE (category_id=50 and in_existence=1) or (category_id2=50 and in_existence=1) or (category_id3=50 and in_existence=1) or (category_id4=50 and in_existence=1) or (category_id5=50 and in_existence=1) or (category_id6=50 and in_existence=1) or (category_id7=50 and in_existence=1) or (category_id8=50 and in_existence=1) or (category_id9=50 and in_existence=1) ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntEneroMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenEneroMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-01-01' and created_at < '2021-02-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntFebreroMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenFebreroMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-02-01' and created_at < '2021-03-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMarzoMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMarzoMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-03-01' and created_at < '2021-04-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAbrilMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAbrilMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-04-01' and created_at < '2021-05-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntMayoMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenMayoMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-05-01' and created_at < '2021-06-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJunioMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJunioMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-06-01' and created_at < '2021-07-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntJulioMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenJulioMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-07-01' and created_at < '2021-08-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntAgostoMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenAgostoMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-08-01' and created_at < '2021-09-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntSeptiembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenSeptiembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-09-01' and created_at < '2021-10-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntOctubreMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenOctubreMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-10-01' and created_at < '2021-11-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntNoviembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenNoviembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-11-01' and created_at < '2021-12-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function CntDiciembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where is_public=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}
	public static function AtenDiciembreMJudiciales(){
		$sql = "select * from ".self::$tablename." where in_existence=1 and created_at >='2021-12-01' and created_at < '2022-01-01' and (category_id=50 or category_id2=50 or category_id3=50 or category_id4=50 or category_id5=50 or category_id6=50 or category_id7=50 or category_id8=50 or category_id9=50)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

}

?>
