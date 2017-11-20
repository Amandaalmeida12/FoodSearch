<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';
    public function welcome($user)
    {
    	$this->to($user->email)
    	->profile('foodsearch')
    	->emailFormat('html')
    	->template('Welcome_email_template')
    	->layout('default')
    	->viewVars(['nome'=>$user->username])
    	->subject(sprintf('Bem-vindo,%s',$user->username));
    }
    
}
