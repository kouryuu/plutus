<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
/**
 * @ORM\Entity
 * @ORM\Table(name="Account")
 */
class Account{

  /*
  * This class encapsulates the Account Object
  *
  */



// Defaults
/**
* @ORM\Column(type="string",unique=true,name="account_number")
*/
private $AccountNumber = '000000000000';
/**
* @ORM\Column(type="string",name="bank_name")
*/
private $BankName = 'No-Bank';
/**
* @ORM\Column(type="string",name="nick_name")
*/
private $NickName = '';
/**
* @ORM\Column(type="integer",name="current_balance")
*/
private $CurrentBalance = 0;

private $TransactionLog = [];

/**
 * Constructor.
 *
 *
 * @param string       $AccountNumber          This is the account number associated with such account
 * @param string       $BankName               The name of the bank that issues the account.
 * @param string       $NickName               A nickname for the account to be distinguishable without revealing the account NumberFormatter
 * @param integer      $CurrentBalance         An integer representing the value in cents of the account
 */
  public function __construct($AccountNumber,$BankName,$NickName,$CurrentBalance){

    $this->AccountNumber = $AccountNumber;
    $this->BankName = $BankName;
    $this->NickName = $NickName;
    $this->CurrentBalance = $CurrentBalance;

  }
  // Getters and Setters
  public function getAccountNumber(){
  return $this->AccountNumber;
  }
  public function getBankName(){
  return $this->BankName;
  }
  public function getNickName(){
  return $this->NickName;
  }
  // This function creates a new transactions and adds it to the $TransactionLog.
  public function createTransaction($RealTimestamp,$UnitValue,$Description,$Currency,$TaxValue,$TaxPercentage,$AssocAccount){
    $transaction = new Transaction($RealTimestamp,$UnitValue,$Description,$Currency,$TaxValue,$TaxPercentage,$AssocAccount);
    array_push($this->TransactionLog,$transaction);
  }
  public function getTransactionLog(){
    return $this->TransactionLog;
  }


}
?>
