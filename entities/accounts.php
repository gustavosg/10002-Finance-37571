<?php

/*------------------------------------------------------------------------------------------------------------------------
 * DADOS DO SISTEMA
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:		Finance-37571
 * Área:		Finanças
 * ------------------------------------------------------------------------------------------------------------------------
 * DADOS DA APLICAÇÃO
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:        SQL
 * Descrição:   Responsável pelo retorno e gravação de dados no Banco de Dados, tabela Account
 * ------------------------------------------------------------------------------------------------------------------------
 * DADOS DO ARQUIVO
 * ------------------------------------------------------------------------------------------------------------------------
 * Nome:        accounts.php
 * Descrição:   Entidade de mapeamento para Accounts
 * Autor:       37571 Gustavo Souza Gonçalves & 38441 Marco Aurélio D. Acaroni
 * Data:        20/03/2012
 * ------------------------------------------------------------------------------------------------------------------------
 * CONTROLE DE VERSÃO
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

	// TODO Gustavo: Dúvidas neste mapeamento, será assim mesmo?
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