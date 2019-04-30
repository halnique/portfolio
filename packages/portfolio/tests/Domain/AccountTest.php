<?php

namespace HalniqueTest\Portfolio\Domain;

use Halnique\Portfolio\Domain\Account as AbstractAccount;
use HalniqueTest\Portfolio\TestCase;

class Account extends AbstractAccount
{
    public function url(): string
    {
        return $this->value();
    }
}

class AccountTest extends TestCase
{
    public function testOf()
    {
        $this->assertInstanceOf(AbstractAccount::class, Account::of($this->faker()->word));
    }

    public function testValue()
    {
        $account = $this->faker()->word;
        $this->assertEquals($account, Account::of($account)->value());
    }

    public function testEquals()
    {
        $account = $this->faker()->word;
        $this->assertTrue(Account::of($account)->equals(Account::of($account)));
        $newAccount = $this->faker()->word;
        $this->assertFalse(Account::of($account)->equals(Account::of($newAccount)));
    }

    public function testJsonSerialize()
    {
        $account = Account::of($this->faker()->word);
        $this->assertEquals([
            'account' => $account->value(),
            'url' => $account->url(),
        ], $account->jsonSerialize());
    }

    public function test__toString()
    {
        $account = $this->faker()->word;
        $this->assertEquals($account, Account::of($account));
    }
}
