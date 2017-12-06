<?php
/**
 * @author Bernardo Albuquerque
 */

class Registry extends ArrayObject 
{

    private static $instance;

    public function get( $key )
    {
        if ( $this->offsetExists( $key ) ) {
            return $this->offsetGet( $key );
        } else {
            throw new RuntimeException( sprintf( 'Não existe um registro para a chave "%s".' , $key ) );
        }
    }

    public static function getInstance()
    {
        if ( !self::$instance )
            self::$instance = new Registry();

        return self::$instance;
    }

    public function set( $key , $value )
    {
        if ( !$this->offsetExists( $key ) ) {
            $this->offsetSet( $key , $value );
        } else {
            throw new LogicException( sprintf( 'Já existe um registro para a chave "%s".' , $key ) );
        }
    }

    public function unregister( $key )
    {
        if ( $this->offsetExists( $key ) ) {
            $this->offsetUnset( $key );
        } else {
            throw new RuntimeException( sprintf( 'Não existe um registro para a chave "%s".' , $key ) );
        }
    }

}