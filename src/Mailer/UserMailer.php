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
 /*   
'gmail'=>[
    'className'=>'Smtp',
    'host'=>'ssl://smtp.gmail.com',
    'port'=>465,
    'timeout'=>30,
    'username'=>'foodsearch.sistema@gmail.com',
    'password'=>'foodsearch2017',
    'client'=>null,
    'tls'=>null,
    'url'=>env('EMAIL_TRANSPORT_DEFAULT_URL',null),
    ],*/

/*'foodsearch'=>[
        'transport'=>'gmail',
        'from'=>['foodsearch.sistema@gmail.com'=>'Foodsearch'],
    ],*/
}
