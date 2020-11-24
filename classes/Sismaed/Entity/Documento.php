<?php
namespace Sismaed\Entity;

class Documento {
    
	const DOC_AUDIO = 'audio';
	const DOC_IMAG = 'imag';
    const DOC_NICK = 'nick';
	const DOC_VIDEO = 'video'; 
    const DOC_ESCRITO = 'escrito';
    const ENTIDAD_UNIDAD = 'unidad';
    const ENTIDAD_MANTTO = 'mantto';
    const ENTIDAD_PEOG = 'peog';
	public $id;
	public $nombre;
    public $desc;
	public $tipo;
    public $tipo_entidad;
    public $id_entidad;
    public $fecha;
    private $unidadTable;
    private $peogTable;
    private $manttoTable;

	public function __construct( ) {
        
	}

	public function getRuta( ) {
        return '/'.$this->tipo_entidad.'/doc/'.$this->tipo;
	}  
    
}