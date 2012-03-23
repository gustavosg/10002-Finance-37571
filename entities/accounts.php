<?php

/*------------------------------------------------------------------------------------------------------------------------
 * DADOS DO SISTEMA
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:		Finance-37571
 * �rea:		Finan�as
 * ------------------------------------------------------------------------------------------------------------------------
 * DADOS DA APLICA��O
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:        SQL
 * Descri��o:   Respons�vel pelo retorno e grava��o de dados no Banco de Dados, tabela Account
 * ------------------------------------------------------------------------------------------------------------------------
 * DADOS DO ARQUIVO
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:        accounts.php
 * Descri��o:   Entidade de mapeamento para Accounts
 * Autor:       37571 Gustavo Souza Gon�alves & 38441 Marco Aur�lio D. Acaroni
 * Data:        20/03/2012
 * ------------------------------------------------------------------------------------------------------------------------
 * CONTROLE DE VERS�O
 * ------------------------------------------------------------------------------------------------------------------------*/

/** @Entity */
class Accounts{
	/** @id @GeneratedValue @Column(type="integer") **/
	protected $id;
	/** @Column(type="text") **/
	protected $name;

	/** @Column(type="datetime") **/
	protected $created;

	/** @Column(type="datetime") **/
	protected $modified;

	// TODO Gustavo: D�vidas neste mapeamento, ser� assim mesmo?
	/**
	 * @OneToMany(targetEntity="Expenditure", inversedBy="accountId")
	 **/
	protected $expenditure;

	public function __construct(Post $post, $text){
		// TODO Gustavo: continuar o construtor de Accounts
		$this->post = $post;
		$this->comment = $text;
	}

	public function getPost(){
		return $this->post;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

}

?>