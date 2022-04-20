<?php 

namespace Application\plugins;

class Message{

    //const FLASH = "FLASH_MESSAGES";

    const FLASH_ERROR = 'error';
    const FLASH_WARNING = 'warning';
    const FLASH_INFO = 'info';
    const FLASH_SUCCESS = 'success';
    
    
    
    function create_flash_message(string $name, string $message, string $type){
       
        // remove existing message with the name
        if (isset($_SESSION['FLASH_MESSAGES'][$name])) {
            unset($_SESSION['FLASH_MESSAGES'][$name]);
        }
    
        // add the message to the session
        $_SESSION['FLASH_MESSAGES'][$name] = ['message' => $message, 'type' => $type];
    }
    
    
    function format_flash_message(array $flash_message){
        return sprintf('<div class="alert alert-%s">%s</div>',
            $flash_message['type'],
            $flash_message['message']
        );
    }
    
    
    function display_flash_message(string $name){
        
        if (!isset($_SESSION['FLASH_MESSAGES'][$name])) {
            return;
        }
    
        // get message from the session
        $flash_message = $_SESSION['FLASH_MESSAGES'][$name];
    
        // delete the flash message
        unset($_SESSION['FLASH_MESSAGES'][$name]);
    
        // display the flash message
        echo $this->format_flash_message($flash_message);
    }
    
    
    function display_all_flash_messages(){
        
        if (!isset($_SESSION['FLASH_MESSAGES'])) {
            return;
        }
    
        // get flash messages
        $flash_messages = $_SESSION['FLASH_MESSAGES'];
    
        // remove all the flash messages
        unset($_SESSION['FLASH_MESSAGES']);
    
        // show all flash messages
        foreach ($flash_messages as $flash_message) {
            echo $this->format_flash_message($flash_message);
        }
    }
    
    
    function flash(string $name, string $message = '', string $type = ''){
       
        if ($name !== '' && $message !== '' && $type !== '') {
            $this->create_flash_message($name, $message, $type);
        } 
        elseif ($name !== '' && $message === '' && $type === '') {
            $this->display_flash_message($name);
        } 
        elseif ($name === '' && $message === '' && $type === '') {
            $this->display_all_flash_messages();
        }
    }
    
}


?>