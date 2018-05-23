<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    //Test login form
    public function tryLogin(FunctionalTester $I)
    {
        $I->amOnPage('/login');
        $I->submitForm('form.form-horizontal', ['email' => 'johndoe@email.com', 'password' => 'secret']);

        $I->seeCurrentUrlEquals('/home');
        $I->see('Welcome, John Doe', 'h1');
        $I->see('You are logged in!', 'h2');
    }
}
