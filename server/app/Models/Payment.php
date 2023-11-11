<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Double;

class Payment extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const PAYMENT_ID = 'payment_id';
    public const PAYER_EMAIL = 'payer_email';
    public const AMOUNT = 'amount';
    public const CURRENCY = 'currency';
    public const PAYMENT_STATUS = 'payment_status';

    protected $fillable = [
        self::PAYMENT_ID,
        self::PAYER_EMAIL,
        self::AMOUNT,
        self::CURRENCY,
        self::PAYMENT_STATUS,
    ];

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Payment
     */
    public function setId(int $id): Payment
    {
        $this->setAttribute(self::ID, $id);
        return $this;
    }

    /**
     * Get payment id
     *
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->getAttribute(self::PAYMENT_ID);
    }

    /**
     * Set payment id
     *
     * @param string $paymentId
     * @return Payment
     */
    public function setPaymentId(string $paymentId): Payment
    {
        $this->setAttribute(self::PAYMENT_ID, $paymentId);
        return $this;
    }

    /**
     * Get payer email
     *
     * @return string
     */
    public function getPayerEmail(): string
    {
        return $this->getAttribute(self::PAYER_EMAIL);
    }

    /**
     * Set payer email
     *
     * @param string $payerEmail
     * @return Payment
     */
    public function setPayerEmail(string $payerEmail): Payment
    {
        $this->setAttribute(self::PAYER_EMAIL, $payerEmail);
        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount(): int
    {
        return $this->getAttribute(self::AMOUNT);
    }

    /**
     * Set amount
     *
     * @param int $amount
     * @return Payment
     */
    public function setAmount(int $amount): Payment
    {
        $this->setAttribute(self::AMOUNT, $amount);
        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->getAttribute(self::CURRENCY);
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Payment
     */
    public function setCurrency(string $currency): Payment
    {
        $this->setAttribute(self::CURRENCY, $currency);
        return $this;
    }

    /**
     * Get payment status
     *
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->getAttribute(self::PAYMENT_STATUS);
    }

    /**
     * Set payment status
     *
     * @param string $paymentStatus
     * @return Payment
     */
    public function setPaymentStatus(string $paymentStatus): Payment
    {
        $this->setAttribute(self::PAYMENT_STATUS, $paymentStatus);
        return $this;
    }
}
