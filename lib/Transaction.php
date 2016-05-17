<?php
namespace Plutus;
/*
* This file is part of the Plutus project.
* @author Rodrigo R. <rodrigo@plethora.com.mx>
* @version 0.1
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
class Transaction{

  /*
  * This class encapsulates the Transaction Object
  *
  */



/**
 * Constructor.
 *
 *
 * @param integer      $Timestamp             The UNIX timestamp when the transaction was registered
 * @param integer      $RealTimestamp         The UNIX timestamp when the actual transaction happened.
 * @param integer      $UnitValue             The value in cents of the transaction.
 * @param integer      $Description           A simple description of the transaction.
 * @param string       $Currency              The currency used for the transaction.
 * @param integer      $TaxValue              The value of the tax deducted.
 * @param integer      $TaxPercentage         The percentage of the tax that was deducted.
 * @param string       $AssocAccount          The associated account number.
 */
  public function __construct($RealTimestamp,$UnitValue,$Description,$Currency,$TaxValue,$TaxPercentage,$AssocAccount){
    $this->Timestamp = time();
    $this->$RealTimestamp = $RealTimestamp;
    $this->$UnitValue = $UnitValue;
    $this->$Description = $Description;
    $this->$Currency = $Currency;
    $this->$TaxValue = $TaxValue;
    $this->$AssocAccount = $AssocAccount;
  }


}
?>
